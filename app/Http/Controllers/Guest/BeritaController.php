<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::paginate(6);
        return view('berita.index', compact('articles'));
    }

    public function show()
    {
        return view('berita.view');
    }

    public function show_news($id)
    {
        $article = Article::where('id', $id)->get();
        $otherNews = Article::where('id', '!=', $id)->limit(3)->get();
        $data = [
            'article' => $article,
            'otherNews' => $otherNews
        ];
        return view('berita.view')->with($data);
    }

    public function show_tag($tag)
    {
        $tagId = Tag::where('name', $tag)->get()[0]->id;
        $articles = Article::join('has_tags', 'has_tags.article_id', '=', 'articles.id')->paginate(6);
        $data = [
            'articles' => $articles,
            'tag' => $tag,
            'tagId' => $tagId
        ];
        return view('berita.index')->with($data);
    }
}
