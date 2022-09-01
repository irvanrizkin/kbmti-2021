<?php

namespace App\Http\Controllers\Sth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComingSoonController extends Controller
{
    public function index () {
        return view('sthiraloka.coming-soon');
    }
}
