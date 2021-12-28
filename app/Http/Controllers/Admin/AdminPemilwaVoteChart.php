<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PemilwaCandidate;
use Illuminate\Http\Request;

class AdminPemilwaVoteChart extends Controller
{
    public function index()
    {
        $emti = PemilwaCandidate::withCount('pemilwa_votes')->where('type', 'EMTI')->get();
        $kandidat_emti = $emti->pluck('name');
        $count_emti = $emti->pluck('pemilwa_votes_count');
        $bpmti = PemilwaCandidate::withCount('pemilwa_votes')->where('type', 'BPMTI')->get();
        $kandidat_bpmti = $bpmti->pluck('name');
        $count_bpmti = $bpmti->pluck('pemilwa_votes_count');
        return view('admin.pemilwaChart.index', [
            'kandidat_emti' => json_encode($kandidat_emti),
            'count_emti' => json_encode($count_emti),
            'kandidat_bpmti' => json_encode($kandidat_bpmti),
            'count_bpmti' => json_encode($count_bpmti),
        ]);
    }
}
