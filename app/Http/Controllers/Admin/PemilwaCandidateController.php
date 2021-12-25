<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPemilwaCandidateRequest;
use App\Http\Requests\StorePemilwaCandidateRequest;
use App\Http\Requests\UpdatePemilwaCandidateRequest;
use App\Models\PemilwaCandidate;
use App\Models\PemilwaEvent;
use App\Models\Media_handlers as CustomMediaHandler;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Traits\MediaConversionTrait;
use App\StaticVars\MediaHandler as StaticVarMediaHandler;

class PemilwaCandidateController extends Controller
{
    use MediaUploadingTrait;
    use MediaConversionTrait;
    private $modelName = StaticVarMediaHandler::PemilwaCandidate;

    public function index()
    {
        abort_if(Gate::denies('pemilwa_candidate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwaCandidates = PemilwaCandidate::with(['pemilwa_event'])->get();

        return view('admin.pemilwaCandidates.index', compact('pemilwaCandidates'));
    }

    public function create()
    {
        abort_if(Gate::denies('pemilwa_candidate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwa_events = PemilwaEvent::pluck('tahun', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pemilwaCandidates.create', compact('pemilwa_events'));
    }

    public function store(StorePemilwaCandidateRequest $request)
    {
        $pemilwaCandidate = PemilwaCandidate::create($request->all());

        if ( $image = $request->input('image', false) ) {
            if (!Storage::exists("public/$this->modelName")) $this->createDirIfNotExist($this->modelName);
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

        return redirect()->route('admin.pemilwa-candidates.index');
    }

    public function edit(PemilwaCandidate $pemilwaCandidate)
    {
        abort_if(Gate::denies('pemilwa_candidate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwa_events = PemilwaEvent::pluck('tahun', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pemilwaCandidate->load('pemilwa_event');

        return view('admin.pemilwaCandidates.edit', compact('pemilwaCandidate', 'pemilwa_events'));
    }

    public function update(UpdatePemilwaCandidateRequest $request, $id)
    {
        $pemilwaCandidate = PemilwaCandidate::where('id', $id);
        $pemilwaCandidate->update($request->except('_method', '_token', 'image', '_route_'));

        if ( $image = $request->input('image', false) ) {
            File::move(storage_path("tmp/uploads/$image"), storage_path("app/public/$this->modelName/$image"));
            // If previously exist
            if ($pemilwaCandidate->first()->getMediaPath()) {
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

        return redirect()->route('admin.pemilwa-candidates.index');
    }

    public function show(PemilwaCandidate $pemilwaCandidate)
    {
        abort_if(Gate::denies('pemilwa_candidate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwaCandidate->load('pemilwa_event');

        return view('admin.pemilwaCandidates.show', compact('pemilwaCandidate'));
    }

    public function destroy(PemilwaCandidate $pemilwaCandidate)
    {
        abort_if(Gate::denies('pemilwa_candidate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwaCandidate->delete();

        return back();
    }

    public function massDestroy(MassDestroyPemilwaCandidateRequest $request)
    {
        PemilwaCandidate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
