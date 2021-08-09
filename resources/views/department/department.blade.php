@extends('layouts.app')

@section('title', 'Profile Department')

@php
    $specialVariableCase = ['Ketua Departemen', 'Wakil Ketua Departemen'];    
@endphp

@section('content')
<div class="container-fluid">
    <section class="department__top row">
        <div class="col-xl-6">
            <div class="department__top__divisi">
                <div class="container">
                    <div class="list-group department__top__list-group" id="list-tab" role="tablist">
                        <a class="list-group-item department__top__list-group__item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">EMTI</a>
                        <a class="list-group-item department__top__list-group__item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">BPMTI</a>
                    </div>
                    <div class="department__top__tab-content tab-content mb-5" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <div class="department__top__tab-content__item d-flex">
                                <img src="{{ asset('img/icon_1.svg') }}" alt="" width="48px">
                                <a href="#">Non-Dept</a>
                            </div>
                            <div class="department__top__tab-content__item d-flex {{ request()->is("department/HRD") ? "active" : "" }}">
                                <img src="{{ asset('img/icon_2.svg') }}" alt="" width="48px">
                                <a href="{{ route('guest.department.show', 'HRD') }}">Human Resource & Dev</a>
                            </div>
                            <div class="department__top__tab-content__item d-flex {{ request()->is("department/ADV") ? "active" : "" }}">
                                <img src="{{ asset('img/icon_3.svg') }}" alt="" width="48px">
                                <a href="{{ route('guest.department.show', 'ADV') }}">Advocacy</a>
                            </div>
                            <div class="department__top__tab-content__item d-flex {{ request()->is("department/SE") ? "active" : "" }}">
                                <img src="{{ asset('img/icon_4.svg') }}" alt="" width="48px">
                                <a href="{{ route('guest.department.show', 'SE') }}">Social Environment</a>
                            </div>
                            <div class="department__top__tab-content__item d-flex {{ request()->is("department/RND") ? "active" : "" }}">
                                <img src="{{ asset('img/icon_5.svg') }}" alt="" width="48px">
                                <a href="{{ route('guest.department.show', 'RND') }}">Research & Dev</a>
                            </div>
                            <div class="department__top__tab-content__item d-flex {{ request()->is("department/RNC") ? "active" : "" }}">
                                <img src="{{ asset('img/icon_6.svg') }}" alt="" width="48px">
                                <a href="{{ route('guest.department.show', 'RNC') }}">Relation & Creative</a>
                            </div>
                            <div class="department__top__tab-content__item d-flex {{ request()->is("department/ENT") ? "active" : "" }}">
                                <img src="{{ asset('img/icon_7.svg') }}" alt="" width="48px">
                                <a href="{{ route('guest.department.show', 'ENT') }}">Entrepreneurship</a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="department__top__detail">
                <div class="container text-center">
                    {{-- Asseting to make it smaller --}}
                    <img src="{{ $department->logo->getUrl() }}" alt="" class="department__top__detail__logo">
                    {{-- <img src="{{ asset('img/blank-image.svg') }}" alt=""> --}}
                    <div class="department__top__detail__title d-flex justify-content-center">
                        <div class="department__top__detail__title__border"></div>
                        <span>{{ $department->initial ?? "" }}</span>
                    </div>
                    <div class="department__top__detail__desc">
                        {{ strip_tags($department->description) }}
                    </div>
                    <div class="department__top__detail__scroll text-center">
                        <span>Scroll</span>
                        <div class="d-flex justify-content-center">
                            <div class="department__top__detail__scroll__border"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
</div>
<section class="department__member">
    <div class="container">
        <div class="department__member__title d-flex justify-content-center">
            <div class="department__member__title__border"></div>
            <span>Ketua & Wakil</span>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-wrap justify-content-center gap-5">
                @foreach ($department->anggotas as $anggota)
                    @if ($anggota->type == 'Ketua Departemen' || $anggota->type == "Wakil Ketua Departemen")
                        <div class="card-member text-center">
                            <img src="{{ $anggota->image->getUrl() }}" alt="" class="card-member__image">
                            <div class="card-member__nama">{{ $anggota->name }}</div>
                            <div class="card-member__position">{{ $anggota->jabatan }}</div>
                            <div class="card-member__sm d-flex justify-content-center gap-4">
                                <a href="#"><img src="{{ asset('/img/instagram.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('/img/linkedin.svg') }}" alt=""></a>
                            </div>
                        </div>    
                    @endif
                @endforeach
            </div>
        </div>
        <div class="department__member__title d-flex justify-content-center">
            <div class="department__member__title__border"></div>
            <span>Staff</span>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-wrap justify-content-center gap-5">
                @foreach ($department->anggotas as $anggota)
                    @if ($anggota->type == "Staff")    
                        <div class="card-member text-center d-flex flex-column">
                            <img src="{{ $anggota->image->getUrl() }}" alt="" class="card-member__image align-self-center">
                            <div class="card-member__nama">{{ $anggota->name }}</div>
                            <div class="card-member__position">{{ $anggota->jabatan }}</div>
                            <div class="card-member__sm mt-auto d-flex justify-content-center gap-4">
                                <a href="#"><img src="{{ asset('/img/instagram.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('/img/linkedin.svg') }}" alt=""></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-script')
    
@endsection