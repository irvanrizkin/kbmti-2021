<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengumumanFeelItController extends Controller
{
    public function index()
    {
        $scrt = env('JWT_KEY', 'secret');
        return view('feelit.index', compact('scrt'));
    }
}
