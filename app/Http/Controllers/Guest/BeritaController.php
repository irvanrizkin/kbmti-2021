<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use App\Models\HasTag;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $articles = [];
        if ($tag = $request->query('tag')) {
            $itemTag = Tag::where('name', $tag)->pluck('id')->first();
            $hasTags = new HasTag();
            $hasTags = $hasTags->joinArticleTag($itemTag)->withQueryString();
            $data = [
                'articles' => $hasTags->pluck('article'),
                'tag' => $tag ?? false,
                'hasTag' => $hasTags,
            ];
        } else if ($search = $request->query('search')) {
            $articles = Article::where('name', 'LIKE', '%' . $search . '%')
                ->orderBy('date_upload', 'desc')
                ->paginate(6);
            $data = [
                'articles' => $articles,
                'tag' => $tag ?? false,
            ];
        } else {
            $articles = Article::orderBy('date_upload', 'desc')
                ->paginate(6);
            $data = [
                'articles' => $articles,
                'tag' => $nameTag ?? false,
            ];
        }

        return view('berita.index')->with($data);
    }

    public function show($id)
    {
        $article = Article::where('id', $id)->get();
        $otherNews = Article::where('id', '!=', $id)->limit(3)->get();
        $data = [
            'article' => $article,
            'otherNews' => $otherNews
        ];
        return view('berita.view')->with($data);
    }
}
