@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.article.title') }}
    </div>

    {{-- Need more styling --}}
    <div class="row">
        <div class="container">
            <h2>List Images</h2>
            <div class="row">
                @if ($medias = $article->getMediaPath())
                    @foreach ($medias as $media)
                        <div class="col">
                            <img src="{{ $media->getUrlPath() }}" alt="" class="img-fluid">     
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.articles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.id') }}
                        </th>
                        <td>
                            {{ $article->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.name') }}
                        </th>
                        <td>
                            {{ $article->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.content') }}
                        </th>
                        <td>
                            {!! $article->content !!}
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.article.fields.image') }}
                        </th>
                        <td>
                            @foreach($article->image as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr> --}}
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.counter') }}
                        </th>
                        <td>
                            {{ $article->counter ?? 0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.bureau') }}
                        </th>
                        <td>
                            {{ $article->bureau ?? "" }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.date_upload') }}
                        </th>
                        <td>
                            {{ $article->date_upload }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.tags') }}
                        </th>
                        <td>
                            @foreach ($article->hasTag as $hasTag)
                                    <span class="badge rounded-pill bg-primary">
                                        {{ $hasTag->tag->name }}
                                    </span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.articles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection