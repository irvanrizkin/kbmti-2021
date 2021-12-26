@extends('layouts.app')

@section('title', 'PEMILWA TI 2021')

@section('content')
    <div class="container">
        <div class="div text-center" style="padding-top: 10rem;">
            @include('layouts.heading', ['text' => 'Pemilihan Wakil Mahasiswa'])
            <h4 class="mt-3" style="font-family: Regis;">Program Studi Teknologi Informasi Tahun 2021/2022</h4>
            <h4 class="mt-5 mb-5" style="font-family: ITC Cheltenham Std;">Silahkan pilih salah satu kandidat dengan menekan tombol pilih</h4>
            <div class="row mb-5">
                <div class="col md-6">
                    @include('pemilwa.two-card', [
                        'buttonId' => 'bayukiwulBtn',
                        'text' =>  'Bayu Wicaksana H. & M. Rizqullah Haditama',
                        'source1' => asset("img/pemilwa/bayu.jpg"),
                        'source2' => asset("img/pemilwa/kiwul.jpg")
                    ])
                </div>
                <div class="col md-6">
                    @include('pemilwa.one-card', [
                        'buttonId' => 'bumbungBtn',
                        'text' => 'Bumbung Kosong',
                    ])
                </div>
            </div>
        </div>
        <form action='{{ route("guest.pemilwa.submit") }}' method="post" id="formEmti">
            @csrf
            <input type="hidden" name="emti" value="" id="valueEmti">
            <input type="submit" value="" style="display: none;">
        </form>
    </div>
@endsection

@section('custom-script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#bayukiwulBtn').click(function () {
            $('#valueEmti').val(1);
            alertPemilih();
        })
        $('#bumbungBtn').click(function () {
            $('#valueEmti').val(2);
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
                        $('#formEmti').submit();
                    })
                }
            })
        }
    </script>
@endsection
