@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="top" style="background-image: url('{{ asset('img/img-cover.png') }}')">
    <div class="top__item">
        <div class="top__item__logo">
            <img src="{{ asset('img/logo-putih.svg') }}" alt="">
        </div>
        <div class="top__item__text">
            Dimensi Kreasi
        </div>
    </div>
</section>
<section class="top2" style="background-image: url('{{ asset('img/paper-cover.png') }}')">
    <div class="top2__item">
        <div class="top2__item__kbmti">
            KBMTI
        </div>
        <div class="top2__item__kbmti-long">
            Keluarga Besar Mahasiswa Teknologi Informasi
        </div>
        <div class="top2__item__desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie in lacus tempor praesent nunc. Pharetra phasellus ac tincidunt varius ac semper feugiat in cursus.
        </div>
    </div>
</section>
<section class="mid">
    <div class="container">
        <div class="mid__visi">
            <div class="mid__visi__title d-flex">
                <div class="mid__visi__title__border"></div>
                <span>Visi</span>
            </div>
            <div class="mid__visi__desc">
                Mewujudkan Eksekutif Mahasiswa Teknologi Informasi sebagai lembaga yang solid dan kolaboratif dalam menciptakan karya bermakna bagi Keluarga Besar Mahasiswa Teknologi Informasi.
            </div>
        </div>
        <div class="mid__visi">
            <div class="mid__visi__title d-flex justify-content-end">
                <div class="mid__visi__title__border"></div>
                <span>Misi</span>
            </div>
            <div class="mid__visi__desc ms-auto">
                Menciptakan iklim internal EMTI yang solid dan supportif dengan berlandaskan kekeluargaan.
                <div class="mb-2"></div>
                Menjadikan EMTI sebagai wadah untuk dapat mengembangkan diri guna mencapai prestasi dan aktualisasi diri mahasiswa Teknologi Informasi.
                <div class="mb-2"></div>
                Optimalisasi sarana advokasi yang responsif dan proaktif dalam meningkatkan kesejahteraan mahasiswa Teknologi Informasi.
                <div class="mb-2"></div>
                Kolaborasi secara aktif dan progresif agar tercipta harmonisasi jangka panjang dan berkelanjutan.
            </div>
        </div>
        <div class="mid__budaya text-center">
            <div class="mid__budaya__title d-flex justify-content-center">
                <div class="mid__budaya__title__border"></div>
                <span>Budaya Kerja</span>
            </div>
            <div class="d-flex justify-content-center">
                <div class="wrapper">
                    <div class="mid__budaya__list">
                        <div class="mid__budaya__list__title">
                            Positive Vibes
                        </div>
                        <div class="mid__budaya__list__desc">
                            EMTI periode ini akan selalu berupaya menciptakan <b>lingkungan kerja yang positif</b> sehingga dapat mengoptimalisasi proses upgrading diri
                        </div>
                    </div>
                    <div class="mid__budaya__list">
                        <div class="mid__budaya__list__title">
                            Inspiring Colaboration
                        </div>
                        <div class="mid__budaya__list__desc">
                            EMTI mengedepankan <b>kolaborasi</b> yang <b>menginspirasi</b> dalam menciptakan karya bermakna
                        </div>
                    </div>
                    <div class="mid__budaya__list">
                        <div class="mid__budaya__list__title">
                            Excellent Teamwork
                        </div>
                        <div class="mid__budaya__list__desc">
                            <b>Kerjasama tim</b> berperan penting menjadikan kualitas program kerja EMTI <b>maksimal dan bermanfaat</b>
                        </div>
                    </div>
                    <div class="mid__budaya__list">
                        <div class="mid__budaya__list__title">
                            Inspiring Colaboration
                        </div>
                        <div class="mid__budaya__list__desc">
                            Selayaknya keluarga, EMTI merupakan tempat pulang yang mengedepankan <b>empati, simpati, dan kepedulian terhadap sesama</b>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>
<section class="mid2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="mid2__clock">
                    <img src="{{ asset('img/icon-clock.svg') }}" alt="">
                </div>
                <div class="mid2__title d-flex">
                    <div class="mid__budaya__title__border"></div>
                    <span>Upcoming Proker</span>
                </div>
                <div class="mid2__desc">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie in lacus tempor praesent nunc. Pharetra phasellus ac tincidunt varius ac semper feugiat in cursus.
                </div>
            </div>
            <div class="col-md-6">
                <div class="mid2__carousel d-flex align-items-center">
                    <a href="#" class="mid2__carousel__prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <img src="{{ asset('img/arrowleft.svg') }}" class="w-100" alt="">
                    </a>
                    <div id="carouselExampleIndicators" class="carousel mid2__carousel__slide slide w-100" data-bs-ride="carousel">
                        <div class="carousel-inner mid2__carousel__slide__inner">
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
                    <a href="#" class="mid2__carousel__next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <img src="{{ asset('img/arrowright.svg') }}" class="w-100"  alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer__col__cr">
                <div class="footer__logo">
                    <img src="{{ asset('img/logo-footer.svg') }}" alt="">
                </div>
                <div class="footer__alamat">
                    Jalan Veteran Universitas Brawijaya Fakultas Ilmu Komputer Malang 65145
                </div>
                <div class="footer__cr d-flex">
                    <div class="footer__cr__icon">
                        <img src="{{ asset('img/cr-icon.svg') }}" alt="">
                    </div>
                    <div class="footer__cr__tahun">
                        2021 - 2022 KBTMI
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-flex footer__col__mid">
                <div class="">
                    <div class="footer__title">Produk</div>
                    <a href="#" class="footer__item d-block">Bank Materi</a>
                    <a href="#" class="footer__item d-block">Bank Soal</a>
                    <a href="#" class="footer__item d-block">Info Event TI</a>
                    <a href="#" class="footer__item d-block">Info Beasiswa</a>
                    <a href="#" class="footer__item d-block">Info Karir</a>
                    <a href="#" class="footer__item d-block">TI Talks</a>
                    <a href="#" class="footer__item d-block">Pengajuan Surat</a>
                </div>
            </div>
            <div class="col-md-3 d-flex footer__col__mid">
                <div class="">
                    <div class="footer__title">Department</div>
                    <a href="#" class="footer__item d-block">Ketua & Wakil</a>
                    <a href="#" class="footer__item d-block">Internal</a>
                    <a href="#" class="footer__item d-block">HRD</a>
                    <a href="#" class="footer__item d-block">Advocacy</a>
                    <a href="#" class="footer__item d-block">SE</a>
                    <a href="#" class="footer__item d-block">RnD</a>
                    <a href="#" class="footer__item d-block">RnC</a>
                    <a href="#" class="footer__item d-block">Entrepreneurship</a>
                    <a href="#" class="footer__item d-block">BPMTI</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer__title">Media Sosial</div>
                <div class="footer__icon__medsos">
                    <a href="#"><img src="{{ asset('img/line.svg') }}" alt=""></a>
                    <a href="#" class="footer__icon__medsos__mid"><img src="{{ asset('img/instagram.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('img/youtube.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection