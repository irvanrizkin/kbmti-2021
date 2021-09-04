<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUpcomingProkerRequest;
use App\Http\Requests\StoreUpcomingProkerRequest;
use App\Http\Requests\UpdateUpcomingProkerRequest;
use App\Models\UpcomingProker;
use App\Models\Media_handlers as CustomMediaHandler;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Traits\MediaConversionTrait;
use App\Models\Department;
use App\StaticVars\MediaHandler as StaticVarMediaHandler;

class UpcomingProkerController extends Controller
{

    use MediaUploadingTrait;
    use MediaConversionTrait;
    private $modelName = StaticVarMediaHandler::UpcomingProkerModelName;

    public function index()
    {
        abort_if(Gate::denies('upcoming_proker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $upcomingProkers = UpcomingProker::all();

        return view('admin.upcomingProkers.index', compact('upcomingProkers'));
    }

    public function create()
    {
        abort_if(Gate::denies('upcoming_proker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upcomingProkers.create');
    }

    public function store(StoreUpcomingProkerRequest $request)
    {
        $upcomingProker = UpcomingProker::create($request->all());

        if ( $image = $request->input('image', false) ) {
            if (!Storage::exists("public/$this->modelName")) $this->createDirIfNotExist($this->modelName) ;
            File::move( storage_path("tmp/uploads/$image"), storage_path("app/public/$this->modelName/$image") );
            // Create the preview version and thumbnail version
            $this->convertToThumbnail($this->modelName, $image);
            $this->convertToPreview($this->modelName, $image);

            $mediaHandler = CustomMediaHandler::create([
                'path' => $image,
                'model_id' => $upcomingProker->id,
                'model_name' => $this->modelName
            ]);
        }

        return redirect()->route('admin.upcoming-prokers.index');
    }

    public function edit(UpcomingProker $upcomingProker)
    {
        abort_if(Gate::denies('upcoming_proker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upcomingProkers.edit', compact('upcomingProker'));
    }

    public function update(UpdateUpcomingProkerRequest $request, $id)
    {
        $upcomingProker = Department::where('id', $id);
        $upcomingProker->update($request->except('_method', '_token', 'logo', '_route_'));

        if ($image = $request->input('image', false)) {
            File::move(storage_path("tmp/uploads/$image"), storage_path("app/public/$this->modelName/$image"));
            // If previously exist
            if ($upcomingProker->first()->getMediaPath()) {
                CustomMediaHandler::where('model_id', $id)
                    ->where('model_name', $this->modelName)
                    ->delete();
            }
            $mediaHandle = CustomMediaHandler::create([
                'path' => $image,
                'model_id' => $id,
                'model_name' => $this->modelName
            ]);
            // Create thumbnail and preview version
            $this->convertToThumbnail($this->modelName, $image);
            $this->convertToPreview($this->modelName, $image);
        }

        return redirect()->route('admin.upcoming-prokers.index');
    }

    public function show(UpcomingProker $upcomingProker)
    {
        abort_if(Gate::denies('upcoming_proker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upcomingProkers.show', compact('upcomingProker'));
    }

    public function destroy(UpcomingProker $upcomingProker)
    {
        abort_if(Gate::denies('upcoming_proker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $upcomingProker->delete();

        return back();
    }

    public function massDestroy(MassDestroyUpcomingProkerRequest $request)
    {
        UpcomingProker::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
