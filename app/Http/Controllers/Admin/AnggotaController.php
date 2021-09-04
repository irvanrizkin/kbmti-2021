<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAnggotumRequest;
use App\Http\Requests\StoreAnggotumRequest;
use App\Http\Requests\UpdateAnggotumRequest;
use App\Models\Anggotum;
use App\Models\Department;
use App\Models\Media_handlers as CustomMediaHandler;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Traits\MediaConversionTrait;
use App\StaticVars\MediaHandler as StaticVarMediaHandler;

class AnggotaController extends Controller
{
    use MediaUploadingTrait;
    use MediaConversionTrait;
    private $modelName = StaticVarMediaHandler::AnggotaModelName;

    public function index()
    {
        abort_if(Gate::denies('anggotum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anggota = Anggotum::with(['department'])->get();

        return view('admin.anggota.index', compact('anggota'));
    }

    public function create()
    {
        abort_if(Gate::denies('anggotum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::pluck('initial', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.anggota.create', compact('departments'));
    }

    public function store(StoreAnggotumRequest $request)
    {
        $anggotum = Anggotum::create($request->all());

        if ( $image = $request->input('image', false) ) {
            if (!Storage::exists("public/$this->modelName")) $this->createDirIfNotExist($this->modelName) ;
            File::move(storage_path("tmp/uploads/$image"), storage_path("app/public/$this->modelName/$image"));
            // Create the preview version and thumnail version
            $this->convertToThumbnail($this->modelName, $image);
            $this->convertToPreview($this->modelName, $image);
            $mediaHandle = CustomMediaHandler::create([
                'path' => $image,
                'model_id' => $anggotum->id,
                'model_name' => $this->modelName,
            ]);
        }

        // Disabled
        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' => $anggotum->id]);
        // }

        return redirect()->route('admin.anggota.index');
    }

    public function edit(Anggotum $anggotum)
    {
        abort_if(Gate::denies('anggotum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::pluck('initial', 'id')->prepend(trans('global.pleaseSelect'), '');

        $anggotum->load('department');

        return view('admin.anggota.edit', compact('departments', 'anggotum'));
    }

    public function update(UpdateAnggotumRequest $request, $id)
    {
        $anggotum = Anggotum::where('id', $id);
        $anggotum->update($request->except('_method', '_token', 'image', '_route_'));

        if ($image = $request->input('image', false)) {
            File::move(storage_path("tmp/uploads/$image"), storage_path("app/public/$this->modelName/$image"));
            // If previously exist
            if ($anggotum->first()->getMediaPath()) {
                CustomMediaHandler::where('model_id', $id)
                    ->where('model_name', $this->modelName)
                    ->delete();
            }
            $mediaHandle = CustomMediaHandler::create([
                'path' => $image,
                'model_id' => $id,
                'model_name' => $this->modelName,
            ]);
            // Create thumnail and preview version
            $this->convertToThumbnail($this->modelName, $image);
            $this->convertToPreview($this->modelName, $image);

        }

        return redirect()->route('admin.anggota.index');
    }

    public function show(Anggotum $anggotum)
    {
        abort_if(Gate::denies('anggotum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anggotum->load('department');

        return view('admin.anggota.show', compact('anggotum'));
    }

    public function destroy(Anggotum $anggotum)
    {
        abort_if(Gate::denies('anggotum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anggotum->delete();

        return back();
    }

    public function massDestroy(MassDestroyAnggotumRequest $request)
    {
        Anggotum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('anggotum_create') && Gate::denies('anggotum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Anggotum();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
