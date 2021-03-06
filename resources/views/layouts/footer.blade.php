<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer__col__cr">
                <div class="footer__logo">
                    <img src="{{ asset('img/logo-footer.svg') }}" alt="">
                </div>
                <div class="footer__alamat">
                    Jalan Veteran Universitas Brawijaya Fakultas Ilmu Komputer Malang 65145
                </div>
                <div class="footer__cr d-flex">
                    <div class="footer__cr__icon">
                        <img src="{{ asset('img/cr-icon.svg') }}" alt="">
                    </div>
                    <div class="footer__cr__tahun">
                        2021 - 2022 KBMTI
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-flex footer__col__mid">
                <div class="">
                    <div class="footer__title">Produk</div>
                    <a href="{{ route('guest.products') }}" class="footer__item d-block">Bank Materi</a>
                    <a href="{{ route('guest.products') }}" class="footer__item d-block">Bank Soal</a>
                    <a href="{{ route('guest.products') }}" class="footer__item d-block">Info Event TI</a>
                    <a href="{{ route('guest.products') }}" class="footer__item d-block">Info Beasiswa</a>
                    <a href="{{ route('guest.products') }}" class="footer__item d-block">Info Karir</a>
                    <a href="{{ route('guest.products') }}" class="footer__item d-block">TI Talks</a>
                    <a href="{{ route('guest.products') }}" class="footer__item d-block">Pengajuan Surat</a>
                </div>
            </div>
            <div class="col-md-3 d-flex footer__col__mid">
                <div class="">
                    <div class="footer__title">Department</div>
                    <a href="{{ route('guest.department.index') }}" class="footer__item d-block">Ketua & Wakil</a>
                    <a href="{{ route('guest.department.index', [ 'group' => 'emti', 'subGroup' => "sekben" ]) }}" class="footer__item d-block">Sekretaris dan Bendahara</a>
                    <a href="{{ route('guest.department.index', [ 'group' => 'emti', 'subGroup' => "internal" ]) }}" class="footer__item d-block">Internal</a>
                    <a href="{{ route('guest.department.index', [ 'group' => 'emti', 'subGroup' => "hrd" ]) }}" class="footer__item d-block">HRD</a>
                    <a href="{{ route('guest.department.index', [ 'group' => 'emti', 'subGroup' => "advo" ]) }}" class="footer__item d-block">Advocacy</a>
                    <a href="{{ route('guest.department.index', [ 'group' => 'emti', 'subGroup' => "se" ]) }}" class="footer__item d-block">SE</a>
                    <a href="{{ route('guest.department.index', [ 'group' => 'emti', 'subGroup' => "rnd" ]) }}" class="footer__item d-block">RnD</a>
                    <a href="{{ route('guest.department.index', [ 'group' => 'emti', 'subGroup' => "rnc" ]) }}" class="footer__item d-block">RnC</a>
                    <a href="{{ route('guest.department.index', [ 'group' => 'emti', 'subGroup' => "entre" ]) }}" class="footer__item d-block">Entrepreneurship</a>
                    <a href="{{ route('guest.department.index', [ 'group' => 'bpmti', 'subGroup' => "nonKomisi" ]) }}" class="footer__item d-block">BPMTI</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer__title">Media Sosial</div>
                <div class="footer__icon__medsos">
                    <a href="https://timeline.line.me/user/_dbYv-Fao1E5Hwup-fs3deGlHY-kBsfZcjoNLMG0"><img src="{{ asset('img/line.svg') }}" alt=""></a>
                    <a href="https://www.instagram.com/kbmti_ub/?hl=id" class="footer__icon__medsos__mid"><img src="{{ asset('img/instagram.svg') }}" alt=""></a>
                    <a href="https://www.youtube.com/channel/UC4xmxfEvrvAy_6IYI9H6MJw"><img src="{{ asset('img/youtube.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
