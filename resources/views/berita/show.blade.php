@extends('layouts.app')

@section('title', 'Berita')

@section('content')
    <div class="container">
        <section class="berita_detail__top">
            @include('layouts.heading', ['text' => 'Berita'])
            <div class="berita__break"></div>
            @include('layouts.search', ['name' => 'searchBerita', 'text' => 'Info Advokasi...'])
        </section>
        <section class="berita_detail__content">
            <div class="berita_detail__content__img">
              <div class="owl-carousel">
                <div class="berita_detail__content__img__item" ><img src="{{ asset('img/carou-berita.png') }}" alt="" srcset=""></div>
                <div class="berita_detail__content__img__item" ><img src="{{ asset('img/carou-berita.png') }}" alt="" srcset=""></div>
                <div class="berita_detail__content__img__item" ><img src="{{ asset('img/carou-berita.png') }}" alt="" srcset=""></div>
                <div class="berita_detail__content__img__item" ><img src="{{ asset('img/carou-berita.png') }}" alt="" srcset=""></div>
                <div class="berita_detail__content__img__item" ><img src="{{ asset('img/carou-berita.png') }}" alt="" srcset=""></div>
                <div class="berita_detail__content__img__item" ><img src="{{ asset('img/carou-berita.png') }}" alt="" srcset=""></div>
                <div class="berita_detail__content__img__item" ><img src="{{ asset('img/carou-berita.png') }}" alt="" srcset=""></div>
              </div>
            </div>
            <div class="berita_detail__content__judul">[ INFO ADVOKASI | MEKANISME UJIAN AKHIR SEMESTER GENAP 2020/2021 FILKOM SECARA DARING ]</div>
            <div class="berita_detail__content__body">
                Halo Tetizen !</br>
                </br>
                Berikut adalah informasi terkait Mekanisme UAS Daring FILKOM Semester Genap 2020/2021 yang dapat dilihat pada link berikut : </br>
                http://bit.ly/MekanismeUASsmtGenap.</br>
                </br>
                [ Narahubung Advo ]</br>
                • Galang (line : galfnj)</br>
                • Fira (line : bsrn_)</br>
                </br>
                </br>
                Advocacy Department</br>
                EMTI FILKOM UB 2021</br>
                </br>
                </br>
                #ADVOCACY_EMTI2021</br>
                #DIMENSIKREASI</br>
                #MajuBersamaTI</br>
            </div>
            <div class="berita_detail__tag">
                @include('layouts.tag', ['name' => 'Advocacy',])
                @include('layouts.tag', ['name' => 'Advocacy_EMTI2021'])
                @include('layouts.tag', ['name' => 'DIMENSIKREASI'])
                @include('layouts.tag', ['name' => 'MajuBersamaTI'])
            </div>
        </section>
        <section class="berita_detail__footer">
            @include('layouts.heading', ['text' => 'Berita Lainnya'])
            <div class="berita__break"></div>
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
    </script>
@endsection