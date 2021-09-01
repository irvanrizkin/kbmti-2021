@extends('layouts.app')

@section('title', 'Profil KBMTI')

@section('content')
    <section class="profile__heading" id="heading">
        <div class="profile__history" id="history">
            @include('layouts.heading', ['text' => 'Sejarah KBMTI', 'data_aos' => 'fade-right'])
            <div class="profile__history-content" data-aos="fade-right" data-aos-duration="1000">
                Keluarga Besar Mahasiswa Teknologi Informasi (KBMTI) merupakan lembaga mahasiswa program studi Teknologi Informasi yang terdiri dari EMTI dan BPMTI. Diresmikan pada sidang umum MKBM FILKOM pada tanggal 25 Maret 2019 lalu dilanjutkan dengan pelantikan yang dilakukan oleh Fakultas pada tanggal 4 April 2019. KBMTI berfungsi sebagai wadah pembelajaran organisasi dan kreativitas mahasiswa Teknologi Infomasi FILKOM UB untuk menyalurkan aspirasi dan berkarya dalam bidang akademik maupun non akademik.
            </div>
        </div>
        <div class="profile__image">
            <img src="{{ asset('img/logo-putih.svg') }}" alt="" class="profile__image-img"  data-aos="fade-left" data-aos-duration="1000">
            <div class="profile__image-title" data-aos="fade-left" data-aos-duration="1000">Profil</div>
            <div class="profile__image-scroll" data-aos="fade-left" data-aos-duration="1500">
                <div class="animate__animated animate__bounce animate__slow animate__infinite">
                    <div class="profile__image-scroll-text">Scroll</div>
                    <img src="{{ asset('img/scroll-line.svg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="profile__chart" id="chart">
        @include('layouts.heading', ['text' => 'Struktur Lembaga', 'data_aos' => 'fade-down'])
        {{-- Tekon Irvan ki masalah e yok po --}}
        <div class="row mx-2">
            <div class="profile__description col-4 d-none d-lg-block">
                <blockquote class="blockquote profile__description__blockquote p-5 shadow" id="profile__description__blockquote-emti">
                    <div class="profile__description__blockquote__icon shadow-sm">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                    <p class="mb-0 mt-2 font-italic">"Eksekutif Mahasiswa Teknologi Informasi merupakan lembaga
                        eksekutif di dalam Keluarga Besar Mahasiswa Teknologi Informasi. Di dalam EMTI terdiri dari
                        beragam posisi, departemen, dan biro. Dan dipimpin langsung oleh Ketua EMTI beserta dengan
                        Wakil Ketua EMTI. Bertujuan untuk membentuk mahasiswa tumbuh bersama menjadi mahasiswa yang
                        kreatif, inofatif, dan bisa menghilangkan batas-batas kesenjangan antar mahasiswa Teknologi
                        Informasi Fakultas Ilmu Komputer Universitas Brawijaya."</p>
                    <footer class="blockquote-footer pt-4 mt-4 border-top">
                        <cite title="Source Title">KBMTI 101</cite>
                    </footer>
                </blockquote>
            </div>
            {{-- Container profile chart in col-4 --}}
            <div class="col-12 col-lg-4 profile__chart-container-parent">
                <div class="profile__chart-container">
                    <div class="profile__chart-box" data-aos="fade-down">
                        <img class="profile__chart-box-img" src="{{ asset('img/logo/kbmti-big.svg') }}" alt="">
                    </div>
                    <img src="{{ asset('img/organization-line.svg') }}" data-aos="fade-down" alt="">
                    <ol class="profile__chart-inner" data-aos="fade-down">
                        <li class="profile__chart-box profile__chart-box-clickable" data-value="emti">
                            <img class="profile__chart-box-img" src="{{ asset('img/logo/emti-big.svg') }}" alt="" data-value="emti">
                        </li>
                        <li class="profile__chart-box profile__chart-box-clickable" data-value="bpmti">
                            <img class="profile__chart-box-img" src="{{ asset('img/logo/bpmti-big.svg') }}" alt="" data-value="bpmti">
                        </li>
                    </ol>
                </div>
            </div>
            {{-- End of profile chart container --}}
            <div class="profile__description col-4 d-none d-lg-block">
                <blockquote class="blockquote profile__description__blockquote p-5 shadow" id="profile__description__blockquote-bpmti">
                    <div class="profile__description__blockquote__icon shadow-sm">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                    <p class="mb-0 mt-2 font-italic">"BPMTI adalah Badan Perwakilan Legislatif Mahasiswa Teknologi
                        Informasi yang memiliki tugas untuk mengemban kedaulatan dan memberikan kebijakan yang
                        mencerminkan keinginan Mahasiswa Teknologi Informasi. Dengan kata lain BPMTI merupakan wakil
                        Mahasiswa yang mendengar seluruh keluhan Mahasiswa Teknologi Informasi serta aktif dalam
                        meluangkan pemikiran untuk menyusun suatu kebijakan yang akan diberlakukan dalam lingkungan
                        Mahasiswa Program Studi Teknologi Informasi"</p>
                    <footer class="blockquote-footer pt-4 mt-4 border-top">
                        <cite title="Source Title">KBMTI 101</cite>
                    </footer>
                </blockquote>
            </div>
        </div>
        {{-- Old Profile Chart Container --}}
        {{-- <div class="profile__chart-container">
            <div class="profile__chart-box" data-aos="fade-down">
                <img class="profile__chart-box-img" src="{{ asset('img/logo/kbmti-big.svg') }}" alt="">
            </div>
            <img src="{{ asset('img/organization-line.svg') }}" data-aos="fade-down" alt="">
            <ol class="profile__chart-inner" data-aos="fade-down">
                <li class="profile__chart-box profile__chart-box-clickable" data-value="emti">
                    <img class="profile__chart-box-img" src="{{ asset('img/logo/emti-big.svg') }}" alt="" data-value="emti">
                </li>
                <li class="profile__chart-box profile__chart-box-clickable" data-value="bpmti">
                    <img class="profile__chart-box-img" src="{{ asset('img/logo/bpmti-big.svg') }}" alt="" data-value="bpmti">
                </li>
            </ol>
        </div> --}}
    </section>
    <section class="profile__meaning" id="meaning">
        @include('layouts.heading', ['text' => 'Makna Logo', 'data_aos' => "fade-down"])
        <div class="profile__meaning-window" data-aos="fade-up">
            <img src="{{ asset('img/logo/infinity.svg') }}" alt="" class="profile__meaning-window-image" id="windowImage">
            <div class="profile__meaning-window-title" id="windowTitle">Infinity</div>
            <div class="profile__meaning-window-desc" id="windowDesc">Melambangkan kesatuan dan hubungan erat kekeluargaan tanpa batas</div>
        </div>
        <div class="profile__meaning-selection">
            <div class="profile__meaning-selection-flex-top" data-aos="fade-up" data-aos-duration="1000">
                <div class="profile__meaning-selection-item" data-value="infinity">
                    <img src="{{ asset('img/logo/infinity.svg') }}" alt="infinity" class="profile__meaning-selection-item-img">
                </div>
            </div>
            <div class="profile__meaning-selection-flex-top" data-aos="fade-up" data-aos-duration="1250">
                <div class="profile__meaning-selection-item" data-value="connectivity">
                    <img src="{{ asset('img/logo/connectivity.svg') }}" alt="connectivity" class="profile__meaning-selection-item-img">
                </div>
            </div>
            <div class="profile__meaning-selection-flex-top" data-aos="fade-up" data-aos-duration="1500">
                <div class="profile__meaning-selection-item" data-value="kait">
                    <img src="{{ asset('img/logo/kait.svg') }}" alt="kait" class="profile__meaning-selection-item-img">
                </div>
            </div>
            <div class="profile__meaning-selection-flex-bottom" data-aos="fade-up" data-aos-duration="1750">
                <div class="profile__meaning-selection-item" data-value="abu-abu-mini">
                    <img src="{{ asset('img/logo/abu-abu-mini.svg') }}" alt="abu-abu-mini" class="profile__meaning-selection-item-img">
                </div>
            </div>
            <div class="profile__meaning-selection-flex-bottom-2" data-aos="fade-up" data-aos-duration="2000">
                <div class="profile__meaning-selection-item" data-value="biru-jingga-mini">
                    <img src="{{ asset('img/logo/biru-jingga-mini.svg') }}" alt="biru-jingga-mini" class="profile__meaning-selection-item-img">
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-script')
<script>
    const text = new Map([
      ['infinity', {
        id: 0,
        title: 'Infinity',
        desc: 'Melambangkan kesatuan dan hubungan erat kekeluargaan tanpa batas',
      }],
      ['connectivity', {
        id: 1,
        title: 'Connectivity',
        desc: 'Melambangkan sinergi antar angkatan',
      }],
      ['kait', {
        id: 2,
        title: 'Kait',
        desc: 'Melambangkan huruf “T” dan “I” sebagai representasi program studi TI',
      }],
      ['abu-abu-mini', {
        id: 3,
        title: 'Warna Abu-abu',
        desc: 'Melambangkan logam yang memiliki sifat kuat tetapi fleksibel untuk menjadi bentuk apapun',
      }],
      ['biru-jingga-mini', {
        id: 4,
        title: 'Warna Biru dan Jingga',
        desc: 'Melambangkan ciri khas warna Fakultas Ilmu Komputer',
      }],
    ])

    const selection = document.querySelectorAll('.profile__meaning-selection-item');
    const selectionImgs = document.getElementsByClassName('profile__meaning-selection-item-img');
    const image = document.getElementById('windowImage');
    const title = document.getElementById('windowTitle');
    const desc = document.getElementById('windowDesc');
    selection.forEach((element) => {
        element.addEventListener('click', function() {
            if (!element.classList.contains('selected')) {
                element.classList.add('selected')
                removeExcept(element.getAttribute('data-value'))
                setWindow(element.getAttribute('data-value'))
                return;
            }
            element.classList.remove('selected')
        })
    })

    function removeExcept(dataValue) {
        selection.forEach(element => {
            if (element.getAttribute('data-value') == dataValue) {
                return;
            }
            element.classList.remove('selected')
        })
    }

    function setWindow(dataValue) {
      title.innerText = text.get(dataValue).title
      desc.innerText = text.get(dataValue).desc
      image.setAttribute('src', srcParser(dataValue))
    }

    function srcParser(dataValue) {
      return selectionImgs[text.get(dataValue).id]
        .getAttribute('src')
        .replace('-mini', '');
    }

    function emtiBpmtiListener(event){
        route = "{{ route('guest.department.index') }}"
        dataGroup = event.target.getAttribute("data-value")
        route += `?group=${dataGroup}`
        location.replace( route )
    }

    function inShowHover(event) {
        dataValue = event.target.getAttribute("data-value")
        $(`#profile__description__blockquote-${dataValue}`).show()
    }

    function inHideHover(event) {
        dataValue = event.target.getAttribute("data-value")
        $(`#profile__description__blockquote-${dataValue}`).hide()
    }

$(".profile__chart-box-clickable").click(emtiBpmtiListener)
$(".profile__chart-box-clickable").hover(inShowHover, inHideHover)
</script>
@endsection
