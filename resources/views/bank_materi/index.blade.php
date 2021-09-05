@extends('layouts.app')

@section('title', 'Bank Materi')

@section('content')
    <div class="container" style="padding-top: 9rem; padding-bottom: 30px">
        <div class="row">
            <div class="col-md-6">
                @include('layouts.heading', ['text' => 'Bank Materi'])
            </div>
            <div class="col-md-6">
                @include('layouts.search', ['name' => 'searchBerita', 'text' => 'Pemrograman Dasar...'])
            </div>
        </div>
        <div class="row mt-3">
            @include('layouts.folder', ['course' => 'Bahasa Inggris', 'count_file' => 1])
        </div>
        <div class="row mt-3">
            <div class="d-flex">
                @include('layouts.subfolder', ['text' => 'Kumpulan Soal'])
            </div>
        </div>
        <div class="row mt-5">
            <table class="table table-product">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Terakhir Diunggah</th>
                        <th scope="col">Ukuran</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="{{ asset('img/note-blue.svg') }}" class="table-product__svg-name" alt="">Contoh Soal.docx</td>
                        <td>3 Oktober 2021</td>
                        <td>31 KB</td>
                        <td><a href="#"><img src="{{ asset('img/download-icon.svg') }}" alt=""></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('custom-script')
@endsection
