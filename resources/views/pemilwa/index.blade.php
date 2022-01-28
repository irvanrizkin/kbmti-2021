@extends('layouts.app')

@section('title', 'Pemilwa TI')

@section('content')
<section class="feel-it container">
    @include('layouts.heading', ['text' => 'Pemilwa TI 2021'])
    <div class="feel-it__text-box">
        Pemilwa TI merupakan tempat bagi para mahasiswa untuk memilih calon ketua himpunan, wakil ketua himpunan, serta anggota BPMTI
    </div>
    <div class="d-flex justify-content-center">
        <form action="" method="POST" class="mt-4" id="announcement_form">
            @csrf
            <div class="form-group mb-3">
                <label class="required recruitment__label text-start" for="email">Email*</label>
                <div class="recruitment__break-small"></div>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} 
                    search__container" style="  border-radius: 5px;" type="email" name="email" id="email"
                    value="{{ old('email', '') }}" placeholder="Email Anda" required>
            </div>
            <div class="form-group mb-3">
                <label class="required recruitment__label text-start" for="token">Token*</label>
                <div class="recruitment__break-small"></div>
                <input class="form-control {{ $errors->has('token') ? 'is-invalid' : '' }} 
                    search__container" style="  border-radius: 5px;" type="text" name="token" id="token"
                    value="{{ old('token', '') }}" placeholder="Token Anda" required>
            </div>
            {{-- Hidden input --}}
            <input type="hidden" name="event_id" value="{{$event_id ?? 0}}">
            <button type="submit" style="font-size: 18px;"
                class="btn recruitment__button-red btn-lg">&emsp;Masuk&emsp;</button>
        </form>
    </div>
</section>
@endsection
