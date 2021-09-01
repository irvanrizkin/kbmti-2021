<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUpcomingProkerRequest;
use App\Http\Requests\StoreUpcomingProkerRequest;
use App\Http\Requests\UpdateUpcomingProkerRequest;
use App\Models\UpcomingProker;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use File;
use App\Http\Controllers\Traits\MediaConversionTrait;
use App\Static\MediaHandler as StaticVarMediaHandler;

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

        // if ($request->input('image', false)) {
        //     File::move( storage_path('tmp/uploads/') . $request->input );   
        // }

        return redirect()->route('admin.upcoming-prokers.index');
    }

    public function edit(UpcomingProker $upcomingProker)
    {
        abort_if(Gate::denies('upcoming_proker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upcomingProkers.edit', compact('upcomingProker'));
    }

    public function update(UpdateUpcomingProkerRequest $request, UpcomingProker $upcomingProker)
    {
        $upcomingProker->update($request->all());

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
