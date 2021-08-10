@extends('layouts.app')

@section('title', 'Profil KBMTI')

@section('content')
    <section class="profile__heading" id="heading">
        <div class="profile__history" id="history">
            @include('layouts.heading', ['text' => 'Sejarah KBMTI', 'data_aos' => 'fade-right'])
            <div class="profile__history-content" data-aos="fade-right" data-aos-duration="1000">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper in placerat at in nibh. Aenean et ultrices volutpat morbi. Sit enim, sit ipsum pellentesque amet, volutpat dui lacus auctor. Fusce at ullamcorper quis mauris ut.
            </div>
            <div class="profile__history-content" data-aos="fade-right" data-aos-duration="1500">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper in placerat at in nibh. Aenean et ultrices volutpat morbi. Sit enim, sit ipsum pellentesque amet, volutpat dui lacus auctor. Fusce at ullamcorper quis mauris ut.
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
        <div class="profile__chart-container">
            <div class="profile__chart-box" data-aos="fade-down">
                <img class="profile__chart-box-img" src="{{ asset('img/logo/kbmti-big.svg') }}" alt="">
            </div>
            <img src="{{ asset('img/organization-line.svg') }}" data-aos="fade-down" alt="">
            <ol class="profile__chart-inner" data-aos="fade-down">
                <li class="profile__chart-box">
                    <img class="profile__chart-box-img" src="{{ asset('img/logo/emti-big.svg') }}" alt="">
                </li>
                <li class="profile__chart-box">
                    <img class="profile__chart-box-img" src="{{ asset('img/logo/bpmti-big.svg') }}" alt="">
                </li>
            </ol>
        </div>
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
</script>
@endsection
