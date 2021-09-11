@extends('layouts.app')

@section('title', 'Berita')

@section('content')
<section class="berita__top">
    @if ($tag)
        @include('layouts.heading', ['text' => "Berita tagged #$tag"])
    @else
        @include('layouts.heading', ['text' => 'Berita'])
    @endif
    <div class="berita__break"></div>
    @include('layouts.search', ['name' => 'searchBerita', 'text' => 'Cari Berita...'])
</section>
<section class="berita__content">

@if ($articles)
    <section class="berita__content">
        <div class="container">
                <div class="row">
                    @foreach($articles as $article)
                        @if (!$article)
                            @continue
                        @endif
                        @include('layouts.news', [
                            'bureau' => $article->bureau,
                            'date' => DateTime::createFromFormat('Y-m-d', explode(" ", $article->updated_at)[0])->format('l, d F Y'),
                            'title' => $article->name,
                            'url' => url(env("ASSET_URL", "") . "/berita/show/$article->id"),
                            'url' => route('guest.berita.show', [ 'beritum' => $article->id ])
                        ])
                    @endforeach
            </div>
        </div>
    </section>

    </section>
    <section class="berita__paginator">
        <hr class="berita__hr">
            {{ ($hasTag ?? null) ? $hasTag->links('vendor.pagination.custom') : $articles->links('vendor.pagination.custom') }}
    </section>
@else
<h1 class="text-center mt-3 mb-3" style="font-family: Regis;">Berita tidak ditemukan</h1>
@endif
@endsection

@section('custom-script')
<script>
    $(function() {
        $('.berita__card').hover(function() {
            $('.berita__card-overlay').fadeIn(500);
        }, function() {
            $('.berita__card-overlay').fadeOut(0);
        });
    });

    const searchText = document.querySelector('#searchBerita');
    searchText.addEventListener('keypress', (event) => {
        if (event.key === 'Enter') {
            let address = window.location.href.split('/');
            let destination = `${address[0]}/${address[1]}/${address[2]}/berita?search=${searchText.value}`;
            event.preventDefault()
            window.location.href = destination
        }
    })
</script>
@endsection
