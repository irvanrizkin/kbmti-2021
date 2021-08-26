@extends('layouts.app')

@section('title', 'Berita')

@section('content')
<section class="berita__top">
    @include('layouts.heading', ['text' => 'Berita'])
    <div class="berita__break"></div>
    @include('layouts.search', ['name' => 'searchBerita', 'text' => 'Info Advokasi...'])
</section>
<section class="berita__content">

    <section class="berita__content">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="berita__card">
                        <div class="berita__image">
                            <img src="{{ asset('img/caroufoot4.png') }}">
                            <div class="berita__card-lembaga">RnD</div>
                            <div class="berita__card-overlay"></div>
                        </div>
                        <div class="berita__container">

                            <div class="berita__container-date">
                                Selasa, 03 Mei 2021
                            </div>
                            <div class="berita__container-title">
                                INFO ADVOKASI Pengambilan Jas Almamater Angkatan 2019 Semester GENAP 2019/2020
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="berita__card">
                        <div class="berita__image">
                            <img src="{{ asset('img/caroufoot4.png') }}">
                            <div class="berita__card-lembaga">ENTRE</div>
                            <div class="berita__card-overlay"></div>
                        </div>
                        <div class="berita__container">

                            <div class="berita__container-date">
                                Selasa, 03 Mei 2021
                            </div>
                            <div class="berita__container-title">
                                INFO ADVOKASI Pengambilan Jas Almamater Angkatan 2019 Semester GENAP 2019/2020
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="berita__card">
                        <div class="berita__image">
                            <img src="{{ asset('img/caroufoot4.png') }}">
                            <div class="berita__card-lembaga">Komisi 1</div>
                            <div class="berita__card-overlay"></div>
                        </div>
                        <div class="berita__container">
                            <div class="berita__container-date">
                                Selasa, 03 Mei 2021
                            </div>
                            <div class="berita__container-title">
                                INFO ADVOKASI Pengambilan Jas Almamater Angkatan 2019 Semester GENAP 2019/2020
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="berita__card">
                        <div class="berita__image">
                            <img src="{{ asset('img/caroufoot4.png') }}">
                            <div class="berita__card-lembaga">SE</div>
                            <div class="berita__card-overlay"></div>
                        </div>
                        <div class="berita__container">
                            <div class="berita__container-date">
                                Selasa, 03 Mei 2021
                            </div>
                            <div class="berita__container-title">
                                INFO ADVOKASI Pengambilan Jas Almamater Angkatan 2019 Semester GENAP 2019/2020
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="berita__card">
                        <div class="berita__image">
                            <img src="{{ asset('img/caroufoot4.png') }}">
                            <div class="berita__card-lembaga">HRD</div>
                            <div class="berita__card-overlay"></div>
                        </div>
                        <div class="berita__container">
                            <div class="berita__container-date">
                                Selasa, 03 Mei 2021
                            </div>
                            <div class="berita__container-title">
                                INFO ADVOKASI Pengambilan Jas Almamater Angkatan 2019 Semester GENAP 2019/2020
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="berita__card">
                        <div class="berita__image">
                            <img src="{{ asset('img/caroufoot4.png') }}">
                            <div class="berita__card-lembaga">Advocacy</div>
                            <div class="berita__card-overlay"></div>
                        </div>
                        <div class="berita__container">
                            <div class="berita__container-date">
                                Selasa, 03 Mei 2021
                            </div>
                            <div class="berita__container-title">
                                INFO ADVOKASI Pengambilan Jas Almamater Angkatan 2019 Semester GENAP 2019/2020
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>
<section class="berita__paginator">
    <hr class="berita__hr">
    {{-- $berita->links('vendor.pagination.custom') --}}
</section>
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
</script>
@endsection
