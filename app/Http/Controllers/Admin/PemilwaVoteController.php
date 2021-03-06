<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVoteRequest;
use App\Http\Requests\StoreVoteRequest;
use App\Http\Requests\UpdateVoteRequest;
use App\Models\PemilwaCandidate;
use App\Models\PemilwaEvent;
use App\Models\PemilwaVote;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PemilwaVoteController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('vote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwaEventId = $request->query('event_id', null);

        $votes = $pemilwaEventId ? 
            PemilwaVote::with(['pemilwa_event'])
                ->where('pemilwa_event_id', $pemilwaEventId)
                ->get()   
            : PemilwaVote::with(['pemilwa_event'])->get()
        ;

        $pemilwa_events = PemilwaEvent::get();

        $pemilwa_candidates = PemilwaCandidate::get();

        return view('admin.pemilwaVotes.index', compact('pemilwa_candidates', 'pemilwa_events', 'votes'));
    }

    public function create()
    {
        abort_if(Gate::denies('vote_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwa_events = PemilwaEvent::pluck('tahun', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pemilwa_candidates = PemilwaCandidate::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pemilwaVotes.create', compact('pemilwa_candidates', 'pemilwa_events'));
    }

    public function store(StoreVoteRequest $request)
    {
        $vote = PemilwaVote::create($request->all());

        return redirect()->route('admin.pemilwaVotes.index');
    }

    public function edit(PemilwaVote $vote)
    {
        abort_if(Gate::denies('vote_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwa_events = PemilwaEvent::pluck('tahun', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pemilwa_candidates = PemilwaCandidate::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vote->load('pemilwa_event', 'pemilwa_candidate');

        return view('admin.pemilwaVotes.edit', compact('pemilwa_candidates', 'pemilwa_events', 'vote'));
    }

    public function update(UpdateVoteRequest $request, PemilwaVote $vote)
    {
        $vote->update($request->all());

        return redirect()->route('admin.pemilwaVotes.index');
    }

    public function show(PemilwaVote $vote)
    {
        abort_if(Gate::denies('vote_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vote->load('pemilwa_event', 'pemilwa_candidate');

        return view('admin.pemilwaVotes.show', compact('vote'));
    }

    public function destroy(PemilwaVote $vote)
    {
        abort_if(Gate::denies('vote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vote->delete();

        return back();
    }

    public function massDestroy(MassDestroyVoteRequest $request)
    {
        PemilwaVote::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
