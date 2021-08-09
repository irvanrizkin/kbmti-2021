<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAnggotumRequest;
use App\Http\Requests\StoreAnggotumRequest;
use App\Http\Requests\UpdateAnggotumRequest;
use App\Models\Anggotum;
use App\Models\Department;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AnggotaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('anggotum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anggota = Anggotum::with(['department', 'media'])->get();

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

        if ($request->input('image', false)) {
            $anggotum->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $anggotum->id]);
        }

        return redirect()->route('admin.anggota.index');
    }

    public function edit(Anggotum $anggotum)
    {
        abort_if(Gate::denies('anggotum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::pluck('initial', 'id')->prepend(trans('global.pleaseSelect'), '');

        $anggotum->load('department');

        return view('admin.anggota.edit', compact('departments', 'anggotum'));
    }

    public function update(UpdateAnggotumRequest $request, Anggotum $anggotum)
    {
        $anggotum->update($request->all());

        if ($request->input('image', false)) {
            if (!$anggotum->image || $request->input('image') !== $anggotum->image->file_name) {
                if ($anggotum->image) {
                    $anggotum->image->delete();
                }
                $anggotum->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($anggotum->image) {
            $anggotum->image->delete();
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
