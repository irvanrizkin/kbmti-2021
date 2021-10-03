<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Oprec;
use Illuminate\Http\Request; 

  
class OprecController extends Controller
{ 
    public function index()
    {
        return view('oprec.open-recruitment');
    } 
 
    public function store(Request $request)
    {
        $newOprecItem = Oprec::create($request->all());
        
        // Return view that is successfull
        return view('oprec.open-recruitment-success');
    } 
}
