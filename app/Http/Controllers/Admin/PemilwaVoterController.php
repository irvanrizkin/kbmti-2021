<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPemilwaVoterRequest;
use App\Http\Requests\StorePemilwaVoterRequest;
use App\Http\Requests\UpdatePemilwaVoterRequest;
use App\Models\PemilwaEvent;
use App\Models\PemilwaVoter;
use Gate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PemilwaVoterController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pemilwa_voter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwaEventId = $request->query('event_id', null);

        $pemilwaVoters = $pemilwaEventId ?
            PemilwaVoter::with(['pemilwa_event'])
            ->where('pemilwa_event_id', $pemilwaEventId)
            ->get()
            : PemilwaVoter::with(['pemilwa_event'])->get();

        $pemilwa_events = PemilwaEvent::get();

        return view('admin.pemilwaVoters.index', compact('pemilwaVoters', 'pemilwa_events'));
    }

    public function create()
    {
        abort_if(Gate::denies('pemilwa_voter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwa_events = PemilwaEvent::pluck('tahun', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pemilwaVoters.create', compact('pemilwa_events'));
    }

    public function store(StorePemilwaVoterRequest $request)
    {
        $email = $request->input('email');
        $pemilwaEventId = $request->input('pemilwa_event_id');
        // Small Fix habis ini
        if (!$email || !$pemilwaEventId) {
            $pemilwa_events = PemilwaEvent::pluck('tahun', 'id')->prepend(trans('global.pleaseSelect'), '');
            return redirect()->route('admin.pemilwa-voters.create', compact('pemilwa_events'));
        }
        $token = Str::random(16);
        $pemilwaVoter = PemilwaVoter::create([
            'nim' => $request->input('nim'),
            'email' => $request->input('email'),
            'token' => $token,
            'pemilwa_event_id' => $request->input('pemilwa_event_id'),
        ]);

        $returnEndpoint = env('APP_URL', 'http://kbmti.ub.ac.id') . "/admin/pemilwa-voters?event_id=$pemilwaEventId";
        return redirect("http://svc-kbmti.mides.id/assignEmail?email=$email&token=$token&rendpoint=$returnEndpoint");

        // return redirect()->route('admin.pemilwa-voters.index');
    }

    public function edit(PemilwaVoter $pemilwaVoter)
    {
        abort_if(Gate::denies('pemilwa_voter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwa_events = PemilwaEvent::pluck('tahun', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pemilwaVoter->load('pemilwa_event');

        return view('admin.pemilwaVoters.edit', compact('pemilwaVoter', 'pemilwa_events'));
    }

    public function update(UpdatePemilwaVoterRequest $request, PemilwaVoter $pemilwaVoter)
    {
        $pemilwaVoter->update($request->all());

        return redirect()->route('admin.pemilwa-voters.index');
    }

    public function show(PemilwaVoter $pemilwaVoter)
    {
        abort_if(Gate::denies('pemilwa_voter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwaVoter->load('pemilwa_event');

        return view('admin.pemilwaVoters.show', compact('pemilwaVoter'));
    }

    public function destroy(PemilwaVoter $pemilwaVoter)
    {
        abort_if(Gate::denies('pemilwa_voter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwaVoter->delete();

        return back();
    }

    public function massDestroy(MassDestroyPemilwaVoterRequest $request)
    {
        PemilwaVoter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
