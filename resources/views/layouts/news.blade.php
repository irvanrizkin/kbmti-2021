<div class="col-sm-4">
    <a href="{{ $url }}" style="text-decoration: none;">
        <div class="berita__card">
            <div class="berita__image">
                <img src="{{ $article->getSingleMediaPath()->imageUrl }}">
                <div class="berita__card-lembaga">{{ $bureau }}</div>
                <div class="berita__card-overlay"></div>
            </div>
            <div class="berita__container">
                <div class="berita__container-date">
                    {{ $date }}
                </div>
                <div class="berita__container-title">
                    {{ $title }}
                </div>
            </div>
        </div>
    </a>
</div>
