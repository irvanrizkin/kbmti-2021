@extends('layouts.app')

@section('title', 'Under Construction')

@section('content')
    <div class="container">
        <section class="under_const__mid" data-aos="zoom-out" data-aos-duration="1500">
            <div class="under_const__mid__item under_const__star_ornament animate__animated animate__bounce animate__slow animate__infinite">
                <img src="{{ asset('img/star_ornament.svg') }}" alt="">
            </div>
            <div class="under_const__mid__item">
                @include('layouts.heading', ['text' => 'Under Construction'])
            </div>
            <div class="under_const__mid__item">
                <h1 class="under_const__content text-center">
                    Kami sedang membuat banyak perbaikan dan akan <br>segera kembali secepatnya
                </h1>
            </div>
            <div class="under_const__mid__item">
                <a class="rounded-pill under_const__button" href="{{ route("guest.landing.home") }}">
                    Kembali
                </a>
            </div>
        </section>
    </div>
    <div class="under_const__mid__strip_ornament">
        <img src="{{ asset('img/under_const_loading.svg') }}" alt="" class="under_const__image">
    </div>
@endsection