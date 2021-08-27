<section class="department__member department__item-toggle__{{ ($isVisible ?? false) ? "active" : "inactive"  }} toggle-group-{{ $group }} toggle-subgroup-{{ $deptName ?? '' }}" data-group="{{ $group }}">
    <div class="container">

        {{-- Bagian Internal --}}
        <div class="department__member__title d-flex justify-content-center animate__fadeIn">
            <div class="department__member__title__border"></div>
            <span>Internal</span>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-wrap justify-content-center gap-5 animate__fadeIn">
                @foreach ($anggotas as $anggota)
                        <div class="card-member text-center">
                            @php
                                if ($anggota->getMediaPath()) {
                                    $imgSource = $anggota->getMediaPath()->imageUrl ?? "";
                                } else {
                                    $imgSource = url("/img/kiwul.png");
                                }
                            @endphp
                            <img src="{{ $imgSource }}" alt="" class="card-member__image">
                            <div class="card-member__nama">{{ $anggota->name }}</div>
                            <div class="card-member__position">{{ $anggota->caption }}</div>
                            <div class="card-member__sm d-flex justify-content-center gap-4">
                                @if ($anggota->instagram_acc)
                                    <a href="{{ $anggota->instagram_acc }}">
                                        @include('department.instagram')
                                    </a>
                                @endif
                                @if ($anggota->linkedin_acc)    
                                    <a href="{{ $anggota->linkedin_acc }}">
                                        @include('department.linkedin')
                                    </a>
                                @endif
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
        
    </div>
</section>
