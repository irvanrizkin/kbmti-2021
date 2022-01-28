@extends('layouts.app')

@section('title', 'PEMILWA TI 2021')

@section('content')
    <div class="container">
        <div class="div text-center" style="padding-top: 10rem;">
            @include('layouts.heading', ['text' => 'Pemilihan Wakil Mahasiswa'])
            <h4 class="mt-3" style="font-family: Regis;">Program Studi Teknologi Informasi Tahun 2021/2022</h4>
            <h4 class="mt-5 mb-5" style="font-family: ITC Cheltenham Std;">Silahkan pilih salah satu kandidat dengan menekan tombol pilih</h4>
            <div class="row">
                <div class="col md-4">
                    @include('pemilwa.one-card', [
                        'text' => 'Hammam Alfi Fawwaz',
                        'buttonId' => 'hammamBtn',
                        'source' => asset("img/pemilwa/hammam.jpg"),
                    ])
                </div>
                <div class="col md-4">
                    @include('pemilwa.one-card', [
                        'text' => 'M. Alfi Syahri Ramadhan',
                        'buttonId' => 'alfiBtn',
                        'source' => asset("img/pemilwa/alfi.jpg"),
                    ])
                </div>
                <div class="col md-4">
                    @include('pemilwa.one-card', [
                        'text' => 'Habil Edgar Avangsa',
                        'buttonId' => 'habilBtn',
                        'source' => asset("img/pemilwa/Habil Edgar Avangsa.jpg"),
                    ])
                </div>
            </div>
            <div class="row my-5">
                <div class="col md-6">
                    @include('pemilwa.one-card', [
                        'text' => 'Khairiyan Hidayat Ramadhan',
                        'buttonId' => 'riyanBtn',
                        'source' => asset("img/pemilwa/Khairiyan Hidayat Ramadhan.png"),
                    ])
                </div>
                <div class="col md-6">
                    @include('pemilwa.one-card', [
                        'text' => "Farhan Hisbullah A'isyi Basuki",
                        'buttonId' => 'aisBtn',
                        'source' => asset("img/pemilwa/Farhan Hisbullah A'isyi Basuki.png"),
                    ])
                </div>
            </div>
            <form action='{{ route("guest.pemilwa.submitBpmti", compact('year', 'token', 'event_id')) }}' method="post" id="formBpmti">
                @csrf
                <input type="hidden" name="bpmti" value="" id="valueBpmti">
                <input type="submit" value="" style="display: none;">
            </form>
        </div>
    </div>
@endsection

@section('custom-script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#hammamBtn').click(function () {
            $('#valueBpmti').val(5);
            alertPemilih();
        })
        $('#alfiBtn').click(function () {
            $('#valueBpmti').val(6);
            alertPemilih();
        })
        $('#habilBtn').click(function () {
            $('#valueBpmti').val(7);
            alertPemilih();
        })
        $('#riyanBtn').click(function () {
            $('#valueBpmti').val(8);
            alertPemilih();
        })
        $('#aisBtn').click(function () {
            $('#valueBpmti').val(9);
            alertPemilih();
        })
        function alertPemilih() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Setelah mengirimkan pilihan, Anda tidak akan bisa mengeditnya",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#951C21',
                confirmButtonText: 'Submit',
                cancelButtonText: 'Batalkan',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Pilihan Anda telah berhasil dikirimkan. Terima kasih atas partisipasinya',
                        icon: 'success',
                        confirmButtonColor: '#951C21',
                        confirmButtonText: 'Kembali',
                    }).then((result) => {
                        $('#formBpmti').submit();
                    })
                }
            })
        }
    </script>
@endsection