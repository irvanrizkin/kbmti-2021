<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use App\Models\HasTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('article_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articles = Article::all();

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        abort_if(Gate::denies('article_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tag::all();

        return view('admin.articles.create', compact('tags'));
    }

    public function store(StoreArticleRequest $request)
    {
        $article = Article::create($request->all());
        $arrayedTags = [];

        foreach ($request->tags as $tag) {
            $tag = Tag::where('name', $tag);
            if ($tag->exists()) {
                $itemTag = [
                    "article_id" => $article->id,
                    "tag_id" => $tag->first()->id,
                ];
            } else {
                $newTag = Tag::create([
                    'name' => $tag
                ]);
                $itemTag = [
                    "article_id" => $article->id,
                    "tag_id" => $newTag->id
                ];
            }
            array_push($arrayedTags, $itemTag);
        }

        // Resolving arrayedTags
        $this->resolverArrayedTags($arrayedTags);

        return redirect()->route('admin.articles.index');
    }

    public function edit(Article $article)
    {
        abort_if(Gate::denies('article_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        return redirect()->route('admin.articles.index');
    }

    public function show(Article $article)
    {
        abort_if(Gate::denies('article_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.articles.show', compact('article'));
    }

    public function destroy(Article $article)
    {
        abort_if(Gate::denies('article_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $article->delete();

        return back();
    }

    public function massDestroy(MassDestroyArticleRequest $request)
    {
        Article::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    // Helpers
    private function resolverArrayedTags($arrayedTags){
        foreach ($arrayedTags as $itemTag) {
            HasTag::create($itemTag);
        }
    }
}
