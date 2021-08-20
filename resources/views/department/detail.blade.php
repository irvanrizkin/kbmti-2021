<div class="department__item-toggle__{{ ($isVisible ?? false) ? "active" : "inactive"  }} toggle-group-{{ $group ?? '' }} toggle-subgroup-{{ $deptName ?? '' }} fade show" data-group="emti">
    <div class="department__top__detail">
        <div class="container text-center">
            @if ($imageUrl ?? false)    
                <img src="{{ $imageUrl ?? '' }}" alt=""  class="department__top__detail__logo">
            @else
                <img src="{{ asset('img/blank-image.svg') }}" alt="">
            @endif
            <div class="department__top__detail__title d-flex ms-4">
                <div class="department__top__detail__title__border"></div>
                <span class="ms-1">{{ $deptName ?? '' }}</span>
            </div>
            <div class="department__top__detail__desc ms-4">
                {{ strip_tags($detailCaption ?? '') }}
            </div>
            <div class="department__top__detail__scroll text-center animate__animated animate__bounce animate__slow animate__infinite">
                <span>Scroll</span>
                <div class="d-flex justify-content-center">
                    <div class="department__top__detail__scroll__border"></div>
                </div>
            </div>
        </div>
    </div>
</div>