<section class="department__member department__item-toggle__{{ ($isVisible ?? false) ? "active" : "inactive"  }} toggle-group-{{ $group }} toggle-subgroup-{{ $deptName ?? '' }}" data-group="{{ $group }}">
    <div class="container">
        <div class="department__member__title d-flex justify-content-center">
            <div class="department__member__title__border"></div>
            <span>Ketua & Wakil {{ $deptName ?? "" }}</span>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-wrap justify-content-center gap-5">
                @foreach ($anggotas as $anggota)
                    @if ($anggota->type == 'Ketua Departemen' || $anggota->type == "Wakil Ketua Departemen")
                        <div class="card-member text-center">
                            <img src="{{ $anggota->image?->getUrl() }}" alt="" class="card-member__image">
                            <div class="card-member__nama">{{ $anggota->name }}</div>
                            <div class="card-member__position">{{ $anggota->caption }}</div>
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
                @foreach ($anggotas as $anggota)
                    @if ($anggota->type == "Staff")    
                        <div class="card-member text-center d-flex flex-column">
                            <img src="{{ $anggota->image?->getUrl() }}" alt="" class="card-member__image align-self-center">
                            <div class="card-member__nama">{{ $anggota->name }}</div>
                            <div class="card-member__position">{{ $anggota->type }}</div>
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