<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use App\Models\HasTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $articles = [];
        if ($tag = $request->query('tag')) {
            $itemTag = Tag::where('name', $tag)->pluck('id')->first();
            $hasTags = HasTag::where('tag_id', $itemTag)->paginate(6);
            $data = [
                'articles' => $hasTags->pluck('article'),
                'tag' => $tag ?? false,
                'tagId' => $itemTag ?? false,
                'links' => $hasTags->links('vendor.pagination.custom'),
            ];
        } else {
            $articles = Article::paginate(6);
            $data = [
                'articles' => $articles,
                'tag' => $nameTag ?? false,
                'tagId' => $tag ?? false,
                'links' => $articles->links('vendor.pagination.custom')
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
