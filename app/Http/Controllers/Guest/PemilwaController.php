<?php

namespace App\Http\Controllers\Guest;

use App\Models\PemilwaEvent;
use App\Models\PemilwaVoter;
use App\Models\PemilwaCandidate;
use App\Models\PemilwaVote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemilwaController extends Controller
{
    public function emti_view()
    {
        return view('pemilwa.emti');
    }

    public function bpmti_view()
    {
        return view('pemilwa.bpmti');
    }

    public function store(Request $request)
    {
        return json_encode($request->all());
    }

    // CORE
    public function login(Request $request, $year = 0)
    {
        $pemilwaEvent = PemilwaEvent::where('tahun', $year)
            ->where('is_active', 'Active')
            ->first();

        if (!$pemilwaEvent) {
            abort(404);
        }

        // Return a view to login, and pass hidden attribute
        return view('pemilwa.index', ['event_id' => $pemilwaEvent->id]);
    }

    public function auth(Request $request, $year)
    {
        $email = $request->input('email');
        $token = $request->input('token');
        $event_id = $request->input('event_id');

        if (!$email || !$token) {
            return redirect()->route('guest.pemilwa.login', compact('year'));
        }

        $voter = PemilwaVoter::where('email', $email)
            ->where('token', $token)
            ->where('is_done', 0)
            ->where('pemilwa_event_id', $event_id)
            ->first();

        if (!$voter) {
            return redirect()->route('guest.pemilwa.login', compact('year'));
        }

        return redirect()->route('guest.pemilwa.choseEmti', compact('year', 'token', 'event_id'));
    }

    public function choseEmti(Request $request, $year = 0, $token = "")
    {
        $event_id = $request->query('event_id');
        $emtiCandidates = PemilwaCandidate::where('type', 'EMTI')
            ->where('pemilwa_event_id', $event_id)
            ->get();

        return view('pemilwa.emti', compact('emtiCandidates', 'event_id', 'year', 'token'));
    }

    public function submitEmti(Request $request, $year = 0, $token = "")
    {
        $candidateId = $request->input('emti');
        $event_id = $request->query('event_id');
        PemilwaVote::create([
            'pemilwa_event_id' => $event_id,
            'pemilwa_candidate_id' => $candidateId
        ]);

        return redirect()->route('guest.pemilwa.choseBpmti', compact('year', 'token', 'event_id'));
    }

    public function choseBpmti(Request $request, $year = 0, $token = "")
    {
        $event_id = $request->query('event_id');
        $bpmtiCandidates = PemilwaCandidate::where('type', 'BPMTI')
            ->where('pemilwa_event_id', $event_id)
            ->get();
        return view('pemilwa.bpmti', compact('bpmtiCandidates', 'event_id', 'year', 'token'));
    }

    public function submitBpmti(Request $request, $year = 0, $token = "")
    {
        $candidateId = $request->input('bpmti');
        $event_id = $request->query('event_id');
        // return response()->json(compact('candidateId', 'event_id'));
        PemilwaVote::create([
            'pemilwa_event_id' => $event_id,
            'pemilwa_candidate_id' => $candidateId,
        ]);
        // Deactivate the token
        PemilwaVoter::where('token', $token)
            ->where('pemilwa_event_id', $event_id)
            ->update([
                'is_done' => 1,
            ]);
        return view('pemilwa.index', ['event_id' => $event_id]);
    }
}
