<div class="department__item-toggle__{{ ($isVisible ?? false) ? "active" : "inactive"  }} toggle-group-{{ $group ?? '' }} toggle-subgroup-{{ $deptName ?? '' }} fade show" data-group="emti">
    <div class="department__top__detail">
        <div class="container text-center">
            <img src="{{ asset('img/blank-image.svg') }}" alt="">
            <div class="department__top__detail__title d-flex justify-content-center">
                <div class="department__top__detail__title__border"></div>
                <span>{{ $deptName ?? '' }}</span>
            </div>
            <div class="department__top__detail__desc">
                {{ $detailCaption ?? '' }}
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