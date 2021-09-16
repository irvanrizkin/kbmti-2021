@extends('layouts.app')

@section('title', 'Error 404')

@section('content')
    <div class="container">
        <section class="under_const__mid" data-aos="zoom-out" data-aos-duration="1500">
            <div class="under_const__mid__item under_const__star_ornament animate__animated animate__bounce animate__slow animate__infinite">
                <img src="{{ asset('img/star_ornament.svg') }}" alt="">
            </div>
            <div class="under_const__mid__item">
                @include('layouts.heading', ['text' => 'Whoops...404'])
            </div>
            <div class="under_const__mid__item">
                <h1 class="under_const__content text-center">
                    Kelihatannya halaman tidak ditemukan
                </h1>
            </div>
            <div class="under_const__mid__item">
                <a class="rounded-pill under_const__button" href="{{ route("guest.landing.home") }}">
                    Kembali
                </a>
            </div>
        </section>
    </div>
@endsection