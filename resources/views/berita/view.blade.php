@extends('layouts.app')

@section('title', 'Berita')

@section('content')
    <div class="container">
        <section class="berita_detail__top">
            @include('layouts.heading', ['text' => 'Berita'])
            <div class="berita__break"></div>
            @include('layouts.search', ['name' => 'searchBerita', 'text' => 'Cari Berita...'])
        </section>
        <section class="berita_detail__content">
            <div class="berita_detail__content__img">
              <div class="owl-carousel">
                @foreach ($article[0]->getMediaPath() as $images)
                    <div class="berita_detail__content__img__item" ><img src="{{ $images->imageUrl }}" alt="" srcset=""></div>
                @endforeach
              </div>
            </div>
            <div class="berita_detail__content__judul">{{ $article[0]->name }}</div>
            <div class="berita_detail__content__body">
                @foreach (explode("<br>", $article[0]->content) as $line)
                  <p>{{ strip_tags($line) }}</p>
                @endforeach
            </div>
            <div class="berita_detail__tag">
                @foreach ($article[0]->isTagExist() as $tag)
                    @include('layouts.tag', [
                        'name' => $tag->name,
                        'url' => route('guest.berita.index', [ 'tag' => $tag->name ]),
                    ])
                @endforeach
            </div>
        </section>
        <section class="berita_detail__footer">
            @include('layouts.heading', ['text' => 'Berita Lainnya'])
            <div class="berita__break"></div>
            <div class="row">
                @foreach($otherNews as $article)
                    @include('layouts.news', [
                        'bureau' => $article->bureau,
                        'date' => DateTime::createFromFormat('Y-m-d', explode(" ", $article->updated_at)[0])->format('l, d F Y'),
                        'title' => $article->name,
                        'url' => url(env("ASSET_URL", "") . "/berita/show/$article->id")
                    ])
                @endforeach
            </div>
        </section>
    </div>
@endsection

@section('custom-script')
    <script>
      $('.owl-carousel').owlCarousel({
        stagePadding: 50,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
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
