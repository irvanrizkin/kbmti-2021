@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="home__top" style="background-image: url('{{ asset('img/img-cover.png') }}')">
    <div class="home__top__item animate__animated animate__bounce animate__slow">
        <div class="home__top__item__logo">
            <img src="{{ asset('img/logo-putih.svg') }}" alt="">
        </div>
        <div class="home__top__item__text">
            Dimensi Kreasi
        </div>
    </div>
</section>
<section class="home__top2" style="background-image: url('{{ asset('img/paper-cover.png') }}')">
    <div class="home__top2__item" data-aos="fade-up">
        <div class="home__top2__item__kbmti">
            KBMTI
        </div>
        <div class="home__top2__item__kbmti-long">
            Keluarga Besar Mahasiswa <span style="color: #951C21;">Teknologi Informasi</span>
        </div>
        <div class="home__top2__item__desc ms-auto me-auto">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie in lacus tempor praesent nunc. Pharetra phasellus ac tincidunt varius ac semper feugiat in cursus.
        </div>
    </div>
</section>
<section class="home__mid">
    <div class="container">
        <div class="home__mid__visi" data-aos="fade-right">
            <div class="home__mid__visi__title d-flex">
                <div class="home__mid__visi__title__border"></div>
                <span>Visi</span>
            </div>
            <div class="home__mid__visi__desc" data-aos="fade-right">
                Mewujudkan Eksekutif Mahasiswa Teknologi Informasi sebagai lembaga yang solid dan kolaboratif dalam menciptakan karya bermakna bagi Keluarga Besar Mahasiswa Teknologi Informasi.
            </div>
        </div>
        <div class="home__mid__visi">
            <div class="home__mid__visi__title d-flex justify-content-end" data-aos="fade-left">
                <div class="home__mid__visi__title__border"></div>
                <span>Misi</span>
            </div>
            <div class="home__mid__visi__desc ms-auto" data-aos="fade-left">
                Menciptakan iklim internal EMTI yang solid dan supportif dengan berlandaskan kekeluargaan.
                <div class="mb-2"></div>
                Menjadikan EMTI sebagai wadah untuk dapat mengembangkan diri guna mencapai prestasi dan aktualisasi diri mahasiswa Teknologi Informasi.
                <div class="mb-2"></div>
                Optimalisasi sarana advokasi yang responsif dan proaktif dalam meningkatkan kesejahteraan mahasiswa Teknologi Informasi.
                <div class="mb-2"></div>
                Kolaborasi secara aktif dan progresif agar tercipta harmonisasi jangka panjang dan berkelanjutan.
            </div>
        </div>
        <div class="home__mid__budaya text-center">
            <div class="home__mid__budaya__title d-flex justify-content-center" data-aos="fade-up">
                <div class="home__mid__budaya__title__border"></div>
                <span>Budaya Kerja</span>
            </div>
            <div class="d-flex justify-content-center">
                <div class="wrapper">
                    <div class="home__mid__budaya__list" data-aos="fade-up">
                        <div class="home__mid__budaya__list__title">
                            Positive Vibes
                        </div>
                        <div class="home__mid__budaya__list__desc">
                            EMTI periode ini akan selalu berupaya menciptakan <b>lingkungan kerja yang positif</b> sehingga dapat mengoptimalisasi proses upgrading diri
                        </div>
                    </div>
                    <div class="home__mid__budaya__list" data-aos="fade-up">
                        <div class="home__mid__budaya__list__title">
                            Inspiring Colaboration
                        </div>
                        <div class="home__mid__budaya__list__desc">
                            EMTI mengedepankan <b>kolaborasi</b> yang <b>menginspirasi</b> dalam menciptakan karya bermakna
                        </div>
                    </div>
                    <div class="home__mid__budaya__list" data-aos="fade-up">
                        <div class="home__mid__budaya__list__title">
                            Excellent Teamwork
                        </div>
                        <div class="home__mid__budaya__list__desc">
                            <b>Kerjasama tim</b> berperan penting menjadikan kualitas program kerja EMTI <b>maksimal dan bermanfaat</b>
                        </div>
                    </div>
                    <div class="home__mid__budaya__list" data-aos="fade-up">
                        <div class="home__mid__budaya__list__title">
                            Inspiring Colaboration
                        </div>
                        <div class="home__mid__budaya__list__desc">
                            Selayaknya keluarga, EMTI merupakan tempat pulang yang mengedepankan <b>empati, simpati, dan kepedulian terhadap sesama</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home__mid2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5" data-aos="fade-right">
                <div class="home__mid2__clock">
                    <img src="{{ asset('img/icon-clock.svg') }}" alt="">
                </div>
                <div class="home__mid2__title d-flex">
                    <div class="home__mid__budaya__title__border"></div>
                    <span>Upcoming Proker</span>
                </div>
                <div class="home__mid2__desc">
                    KBMTI hadir dengan  program kerja yang mewadahi kemampuan mahasiswa TI untuk mewujudkan visi dan misinya. Berikut adalah beberapa program kerja yang akan datang
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <div class="home__mid2__carousel d-flex align-items-center">
                    <a href="#" class="home__mid2__carousel__prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <img src="{{ asset('img/arrowleft.svg') }}" class="w-100" alt="">
                    </a>
                    <div id="carouselExampleIndicators" class="carousel mid2__carousel__slide slide w-100" data-bs-ride="carousel">
                        <div class="carousel-inner home__mid2__carousel__slide__inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/proker-carousel.png') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/proker-carousel.png') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/proker-carousel.png') }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                    <a href="#" class="home__mid2__carousel__next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <img src="{{ asset('img/arrowright.svg') }}" class="w-100"  alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="home__down">

    <div class="d-flex justify-content-center" data-aos="fade-down">
        <div class="home__down__berita">
            <div class="home__down__text">
                    Berita
            </div>
        </div>
    </div>

    <div class="text-center my-3">
        <div class="row mx-auto my-auto">
            <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="row">
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="col-sm-4" data-aos="fade-up" data-aos-duration="1000">
                                        <a href="https://google.com" class="home__down__link">
                                            <img src="{{ $articles[$i]->getSingleMediaPath()->imageUrl }}" class="img-fluid">
                                            <div class="d-flex justify-content-center">
                                                <div class="home__down__date">
                                                    {{ DateTime::createFromFormat('Y-m-d', explode(" ", $articles[$i]->updated_at)[0])->format('l, d F Y') }}
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="home__down__title">
                                                    {{ $articles[$i]->name }}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        {{-- End of Carousel item --}}
                        <div class="carousel-item">
                            <div class="row">
                            @for ($i = 3; $i < 6; $i++)
                                    <div class="col-sm-4" data-aos="fade-up" data-aos-duration="1000">
                                        <a href="https://google.com" class="home__down__link">
                                            <img src="{{ $articles[$i]->getSingleMediaPath()->imageUrl }}" class="img-fluid">
                                            <div class="d-flex justify-content-center">
                                                <div class="home__down__date">
                                                    {{ DateTime::createFromFormat('Y-m-d', explode(" ", $articles[$i]->updated_at)[0])->format('l, d F Y') }}
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="home__down__title">
                                                    {{ $articles[$i]->name }}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        {{-- End of Carousel Item --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="home__down__arrows">
    <div class="col-md-12 d-flex justify-content-center ">
        <div class="ms-auto me-auto">
            <a href="#" class="home__mid2__carousel__prev" type="button" data-bs-target="#myCarousel2" data-bs-slide="prev">
                <img src="{{ asset('img/arrowleft.svg') }}"   alt="">
            </a>
            <a href="#" class="home__mid2__carousel__next" type="button" data-bs-target="#myCarousel2" data-bs-slide="next">
                <img src="{{ asset('img/arrowright.svg') }}"  alt="">
            </a>
        </div>
    </div>
</section>
@endsection
