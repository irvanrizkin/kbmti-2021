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
    </div>
@endsection

@section('custom-script')
@endsection
