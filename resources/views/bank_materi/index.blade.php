@extends('layouts.app')

@section('title', 'Bank Materi')

@section('content')
    <div class="container" style="padding-top: 9rem; padding-bottom: 30px">
        <div class="row align-items-center">
            <div class="col-md-6">
                @include('layouts.heading', ['text' => 'Bank Materi'])
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                        @include('layouts.search', ['name' => 'searchBerita', 'text' => 'Pemrograman Dasar...'])
                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('guest.bank.redirect') }}" method="get">
                            <select name="semester" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="dropSemester" onchange="this.form.submit()">
                                <option value="1" selected>Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                                <option value="7">Semester 7</option>
                                <option value="8">Semester 8</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel">
            @if ($matkuls)
                @foreach ($matkuls as $matkul)
                    @include('layouts.folder',
                        ['course' => $matkul->name,
                        'count_file' => count($matkul->matkuliahBankSoalMateris),
                        'link' => url(env("ASSET_URL", "") . "/bank-materi/$matkul->semester/matkul/$matkul->id"),
                    ])
                @endforeach
            @endif
        </div>
        @if ($materis->count() != 0)
        <div class="row mt-3 px-4">
            <div class="d-flex">
                @include('layouts.subfolder', ['text' => 'Kumpulan Soal', 'id' => 'subfolderSoal', 'click' => 'setVisible("listSoal")'])
                @include('layouts.subfolder', ['text' => 'Materi', 'id' => 'subfolderMateri', 'click' => 'setVisible("listMateri")'])
            </div>
        </div>
        @endif
        @if ($materis->count() != 0)
        <div class="row mt-5">
                <table class="table table-product d-none" id="tableMateris">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Terakhir Diunggah</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materis['Materi'] as $materi)
                        <tr id="listMateri">
                            @include('layouts.tabledata', ['subtype' => $materi->sub_type, 'name' => $materi->name])
                            <td>{{ $materi->updated_at}}</td>
                            <td>{{ rand(100, 500).' KB' }}</td>
                            <td><a href="{{ $materi->link }}"><img src="{{ asset('img/download-icon.svg') }}" alt=""></a></td>
                        </tr>
                        @endforeach
                        @foreach ($materis['Soal'] as $materi)
                        <tr class="d-none" id="listSoal">
                            @include('layouts.tabledata', ['subtype' => $materi->sub_type, 'name' => $materi->name])
                            <td>{{ $materi->updated_at}}</td>
                            <td>{{ rand(100, 500).' KB' }}</td>
                            <td><a href="{{ $materi->link }}"><img src="{{ asset('img/download-icon.svg') }}" alt=""></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
    </div>
@endsection

@section('custom-script')
    <script>
      $('.owl-carousel').owlCarousel({
        stagePadding: 20,
        margin: 10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            },
            1200:{
                items:4
            }
        }
    });

    const subfolderSoal = document.querySelector('#subfolderSoal');
    const subfolderMateri = document.querySelector('#subfolderMateri');
    const tableMateris = document.querySelector('#tableMateris');
    const dropSemester = document.querySelector('#dropSemester');
    const divs = ["listMateri", "listSoal"];
    let visibleDiv = null;

    const setVisible = (id) => {
        showTable();
        if (id !== visibleDiv) {
            visibleDiv = id;
        }
        hideDiv();
        borderize();
    }

    const hideDiv = () => {
        divs.forEach((div) => {
            let divElem = document.getElementById(div);
            if (div === visibleDiv) {
                divElem.className = '';
            } else {
                divElem.className = 'd-none';
            }
        })
    }

    const borderize = () => {
        if (visibleDiv === "listMateri") {
            document.getElementById("subfolderMateri").className = "subfolder me-3 subfolder__border-red"
            document.getElementById("subfolderSoal").className = "subfolder me-3 subfolder__border-white"
        } else if (visibleDiv === "listSoal") {
            document.getElementById("subfolderMateri").className = "subfolder me-3 subfolder__border-white"
            document.getElementById("subfolderSoal").className = "subfolder me-3 subfolder__border-red"
        }
    }

    const showTable = () => {
        tableMateris.className = "table table-product";
    }

    const setOption = () => {
        const urlSplit = window.location.href.split('/');
        const urlId = urlSplit.length <= 5 ? urlSplit[4] : 1;

        dropSemester.selectedIndex = urlId - 1;
    }

    setOption()
    </script>
@endsection
