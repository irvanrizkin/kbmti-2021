<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDepartmentRequest;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use App\Models\Media_handlers as CustomMediaHandler;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Traits\MediaConversionTrait;
use App\StaticVars\MediaHandler as StaticVarMediaHandler;

class DepartmentController extends Controller
{
    use MediaUploadingTrait;
    use MediaConversionTrait;
    private $modelName = StaticVarMediaHandler::DepartmentModelName;

    public function index()
    {
        abort_if(Gate::denies('department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::all();

        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        abort_if(Gate::denies('department_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.departments.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::create($request->all());

        if ($logo = $request->input('logo', false)) {
            // Keluarnya nanti public_path("storage/departments/nama filenya")
            if (!Storage::exists("public/$this->modelName")) $this->createDirIfNotExist($this->modelName) ;
            File::move(storage_path("tmp/uploads/$logo"), storage_path("app/public/$this->modelName/$logo"));
            // Create the preview version and thumnail version
            $this->convertToThumbnail($this->modelName , $logo);
            $this->convertToPreview($this->modelName , $logo);
            // Create new item of media handlers
            $mediaHandle = CustomMediaHandler::create([
                'path' => $logo,
                'model_id' => $department->id,
                'model_name' => $this->modelName,
            ]);
        }
        // Disabled
        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' => $department->id]);
        // }

        return redirect()->route('admin.departments.index');
    }

    public function edit(Department $department)
    {
        abort_if(Gate::denies('department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.departments.edit', compact('department'));
    }

    public function update(UpdateDepartmentRequest $request, $id)
    {
        $department = Department::where('id', $id);
        $department->update($request->except('_method', '_token', 'logo', '_route_'));

        if ($logo = $request->input('logo', false)) {
            File::move(storage_path("tmp/uploads/$logo"), storage_path("app/public/$this->modelName/$logo"));
            // If previously exist
            if ($department->first()->getMediaPath()) {
                CustomMediaHandler::where('model_id', $id)
                    ->where('model_name', $this->modelName)
                    ->delete();
            }
            $mediaHandle = CustomMediaHandler::create([
                'path' => $logo,
                'model_id' => $id,
                'model_name' => $this->modelName,
            ]);
            // Create thumbnail and preview version
            $this->convertToThumbnail($this->modelName, $logo);
            $this->convertToPreview($this->modelName, $logo);
        }
        return redirect()->route('admin.departments.index');
    }

    public function show(Department $department)
    {
        abort_if(Gate::denies('department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.departments.show', compact('department'));
    }

    public function destroy(Department $department)
    {
        abort_if(Gate::denies('department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department->delete();

        return back();
    }

    public function massDestroy(MassDestroyDepartmentRequest $request)
    {
        Department::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('department_create') && Gate::denies('department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Department();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
