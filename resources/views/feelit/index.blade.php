@extends('layouts.app')

@section('title', 'Berita')

@section('content')
<section class="feel-it container">
    <div class="feel-it__text-header">Open Recruitment</div>
    @include('layouts.heading', ['text' => 'Staff Muda'])
    <div class="feel-it__text-box">
        Program kerja yang melakukan pembelajaran, pembinaan, dan pengembangan sumber daya mahasiswa baru di Program Studi Teknologi Informasi yang dinaungi oleh EMTI.  Program kerja ini dikhususkan untuk Mahasiswa Baru dari Program Studi Teknologi Informasi untuk mendapat pembekalan tentang himpunan mahasiswa Program Studi Teknologi Informasi
    </div>
    <div class="d-flex justify-content-center">
        <form action="" method="POST" class="mt-4">
            <div class="form-group mb-3">
                <label class="required recruitment__label text-start" for="nim">NIM*</label>
                <div class="recruitment__break-small"></div>
                <input class="form-control {{ $errors->has('nim') ? 'is-invalid' : '' }} 
                    search__container" style="  border-radius: 5px;" type="text" name="nim" id="nim"
                    value="{{ old('nim', '') }}" placeholder="Jawaban Anda" required>
            </div>
            <div class="form-group mb-3">
                <label class="required recruitment__label text-start" for="nim">Password*</label>
                <div class="recruitment__break-small"></div>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} 
                    search__container" style="  border-radius: 5px;" type="text" name="password" id="password"
                    value="{{ old('password', '') }}" placeholder="Jawaban Anda" required>
            </div>
            <button type="submit" style="font-size: 18px;" class="btn recruitment__button-red btn-lg">&emsp;Submit&emsp;</button>
        </form>
    </div>
</section>
@endsection
