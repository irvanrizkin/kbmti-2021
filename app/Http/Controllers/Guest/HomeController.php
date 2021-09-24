<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     *@return \Illuminate\Contracts\Support\Renderable
     */
    public function index (){
        $articles = Article::orderBy('id', 'DESC')->limit(6)->get();
        return view('home', compact('articles'));
    }
}
