<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use App\Models\HasTag;
use App\Models\Media_handlers as CustomMediaHandler;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\MediaConversionTrait;
use File;
use App\Static\MediaHandler as StaticVarMediaHandler;

class ArticleController extends Controller
{

    use MediaUploadingTrait;
    use MediaConversionTrait;
    private $modelName = StaticVarMediaHandler::ArticleModelName;

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

        // Tag Add
        foreach (($request->tags ?? []) as $tag_id) {
            $itemTag = [
                "article_id" => $article->id,
                "tag_id" => $tag_id,
            ];
            array_push($arrayedTags, $itemTag);
        }

        // Add New Tag
        $arrayedTags = $this->addNewTag($request->add_tags, $article->id, $arrayedTags);

        // Resolving arrayedTags
        $this->resolverArrayedTags($arrayedTags);

        // Image
        foreach ($request->input('image', []) as $file) {
            // $article->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('image');
            File::move(storage_path('tmp/uploads/') . $file, storage_path("app/public/$this->modelName/") . $file);
            $mediaHandle = CustomMediaHandler::create([
                'path' => $file,
                'model_id' => $article->id,
                'model_name' => $this->modelName
            ]);
            // Crreate preview and thumnail
            $this->convertToThumbnail($this->modelName, $file);
            $this->convertToPreview($this->modelName, $file);
        }

        // CKEditor is Disabled
        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' => $article->id]);
        // }

        return redirect()->route('admin.articles.index');
    }

    public function edit(Article $article)
    {
        abort_if(Gate::denies('article_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tag::all();

        $arrayedTagId = $article->hasTag
            ->pluck('tag_id')
            ->toArray();

        return view('admin.articles.edit', compact('article', 'tags', 'arrayedTagId'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        // return response()->json([
        //     'image' => $request->input('image')
        // ]);
        $article->update($request->all());
        $arrayedTags = [];

        // Delete the images that doesn't exist
        if (count($article->getArrayOnlyPath()) > 0) {
            foreach ($article->getArrayOnlyPath() as $media) {
                if (!in_array($media, $request->input('image', []))) {
                    // Ngedelete barang Media Handler
                    CustomMediaHandler::where('path', $media)
                        ->where('model_name', $this->modelName)
                        ->where('model_id', $article->id)
                        ->delete();
                    // $media->delete();
                }
            }
        }
        
        $media = $article->getArrayOnlyPath();
        foreach ($request->input('image', []) as $file) {

            if (count($media) === 0 || !in_array($file, $media)) {
                // $article->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('image');
                File::move(storage_path('tmp/uploads/') . $file, storage_path("app/public/$this->modelName/") . $file);
                $mediaHandle = CustomMediaHandler::create([
                    'path' => $file,
                    'model_id' => $article->id,
                    'model_name' => $this->modelName
                ]);
                // Crreate preview and thumnail
                $this->convertToThumbnail($this->modelName, $file);
                $this->convertToPreview($this->modelName, $file);
            }
        }

        // Tag Add
        foreach (($request->tags ?? []) as $tag_id) {
            $condition = HasTag::where('article_id', $article->id)
                ->where('tag_id', $tag_id)
                ->exists();
            if ($condition) {
                continue;
            }
            $itemTag = [
                "article_id" => $article->id,
                "tag_id" => $tag_id,
            ];
            array_push($arrayedTags, $itemTag);
        }

        // New Tag
        $arrayedTags = $this->addNewTag($request->add_tags, $article->id, $arrayedTags);

        // Resolve Arrayed Tags
        $this->resolverArrayedTags($arrayedTags);

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

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('article_create') && Gate::denies('article_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Article();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }


    // Helpers to resolve arrayed tags
    private function resolverArrayedTags($arrayedTags)
    {
        foreach ($arrayedTags as $itemTag) {
            HasTag::create($itemTag)->save();
        }
    }

    // Helpers to resolve newTag
    private function addNewTag($newTags, $articleid, $arrayContainter)
    {
        if ($newTags) {
            foreach ($newTags as $tagName) {
                $newTag = Tag::create([
                    'name' => $tagName
                ]);
                $itemTag = [
                    'article_id' => $articleid,
                    'tag_id' => $newTag->id
                ];
                array_push($arrayContainter, $itemTag);
            }
        }
        return $arrayContainter;
    }
}
