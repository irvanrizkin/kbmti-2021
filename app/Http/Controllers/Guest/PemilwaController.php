<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemilwaController extends Controller
{
    //
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
}
