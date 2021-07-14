@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="department__top">
    <div class="department__top__divisi">
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
                <div class="department__top__tab-content__item d-flex">
                    <img src="{{ asset('img/icon_2.svg') }}" alt="" width="48px">
                    <a href="#">Human Resource & Dev</a>
                </div>
                <div class="department__top__tab-content__item d-flex">
                    <img src="{{ asset('img/icon_3.svg') }}" alt="" width="48px">
                    <a href="#">Advocacy</a>
                </div>
                <div class="department__top__tab-content__item active d-flex">
                    <img src="{{ asset('img/icon_4.svg') }}" alt="" width="48px">
                    <a href="#">Social Environment</a>
                </div>
                <div class="department__top__tab-content__item d-flex">
                    <img src="{{ asset('img/icon_5.svg') }}" alt="" width="48px">
                    <a href="#">Research & Dev</a>
                </div>
                <div class="department__top__tab-content__item d-flex">
                    <img src="{{ asset('img/icon_6.svg') }}" alt="" width="48px">
                    <a href="#">Relation & Creative</a>
                </div>
                <div class="department__top__tab-content__item d-flex">
                    <img src="{{ asset('img/icon_7.svg') }}" alt="" width="48px">
                    <a href="#">Entrepreneurship</a>
                </div>
            </div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                
            </div>
        </div>
    </div>
    <div class="department__top__detail">
        <img src="{{ asset('img/blank-image.svg') }}" alt="">
        <div class="department__top__detail__title d-flex">
            <div class="department__top__detail__title__border"></div>
            <span>SE</span>
        </div>
        <div class="department__top__detail__desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper in placerat at in nibh. Aenean et ultrices volutpat morbi. Sit enim, sit ipsum pellentesque amet, volutpat dui lacus auctor. Fusce at ullamcorper quis mauris ut.
        </div>
        <div class="department__top__detail__scroll text-center">
            <span>Scroll</span>
            <div class="d-flex justify-content-center">
                <div class="department__top__detail__scroll__border"></div>
            </div>
        </div>
    </div>
</section>
<section class="department__member">
    <div class="container">
        <div class="department__member__title d-flex justify-content-center">
            <div class="department__member__title__border"></div>
            <span>Ketua & Wakil</span>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-wrap justify-content-center gap-5">
                <div class="card-member text-center">
                    <img src="{{ asset('img/kiwul.png') }}" alt="">
                    <div class="card-member__nama">M. Rizqullah Haditama</div>
                    <div class="card-member__position">Ketua Departmen</div>
                    <div class="card-member__sm d-flex justify-content-center gap-4">
                        <a href="#"><img src="{{ asset('/img/instagram.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('/img/linkedin.svg') }}" alt=""></a>
                    </div>
                </div>
                <div class="card-member text-center">
                    <img src="{{ asset('img/audima.png') }}" alt="">
                    <div class="card-member__nama">Audima Oktasena</div>
                    <div class="card-member__position">Wakil Ketua Departemen</div>
                    <div class="card-member__sm d-flex justify-content-center gap-4">
                        <a href="#"><img src="{{ asset('/img/instagram.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('/img/linkedin.svg') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="department__member__title d-flex justify-content-center">
            <div class="department__member__title__border"></div>
            <span>Staff</span>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-wrap justify-content-center gap-5">
                <div class="card-member text-center d-flex flex-column">
                    <img src="{{ asset('img/anon.png') }}" class="align-self-center" alt="" width="160px">
                    <div class="card-member__nama">Muhammad Rakhmad Giffari Nurfadhilah</div>
                    <div class="card-member__position">Staff</div>
                    <div class="card-member__sm mt-auto d-flex justify-content-center gap-4">
                        <a href="#"><img src="{{ asset('/img/instagram.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('/img/linkedin.svg') }}" alt=""></a>
                    </div>
                </div>
                <div class="card-member text-center d-flex flex-column">
                    <img src="{{ asset('img/anon.png') }}" class="align-self-center" alt="" width="160px">
                    <div class="card-member__nama">Sukiman</div>
                    <div class="card-member__position">Staff</div>
                    <div class="card-member__sm mt-auto d-flex justify-content-center gap-4">
                        <a href="#"><img src="{{ asset('/img/instagram.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('/img/linkedin.svg') }}" alt=""></a>
                    </div>
                </div>
                <div class="card-member text-center d-flex flex-column">
                    <img src="{{ asset('img/anon.png') }}" class="align-self-center" alt="" width="160px">
                    <div class="card-member__nama">Sukiman</div>
                    <div class="card-member__position">Staff</div>
                    <div class="card-member__sm mt-auto d-flex justify-content-center gap-4">
                        <a href="#"><img src="{{ asset('/img/instagram.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('/img/linkedin.svg') }}" alt=""></a>
                    </div>
                </div>
                <div class="card-member text-center d-flex flex-column">
                    <img src="{{ asset('img/anon.png') }}" class="align-self-center" alt="" width="160px">
                    <div class="card-member__nama">Sukiman</div>
                    <div class="card-member__position">Staff</div>
                    <div class="card-member__sm mt-auto d-flex justify-content-center gap-4">
                        <a href="#"><img src="{{ asset('/img/instagram.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('/img/linkedin.svg') }}" alt=""></a>
                    </div>
                </div>
                <div class="card-member text-center d-flex flex-column">
                    <img src="{{ asset('img/anon.png') }}" class="align-self-center" alt="" width="160px">
                    <div class="card-member__nama">Sukiman</div>
                    <div class="card-member__position">Staff</div>
                    <div class="card-member__sm mt-auto d-flex justify-content-center gap-4">
                        <a href="#"><img src="{{ asset('/img/instagram.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('/img/linkedin.svg') }}" alt=""></a>
                    </div>
                </div>
                <div class="card-member text-center d-flex flex-column">
                    <img src="{{ asset('img/anon.png') }}" class="align-self-center" alt="" width="160px">
                    <div class="card-member__nama">Sukiman</div>
                    <div class="card-member__position">Staff</div>
                    <div class="card-member__sm mt-auto d-flex justify-content-center gap-4">
                        <a href="#"><img src="{{ asset('/img/instagram.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('/img/linkedin.svg') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-script')
    
@endsection