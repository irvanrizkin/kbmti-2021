<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     *@return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('profile');
    }
}
