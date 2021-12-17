@extends('layouts.app')

@section('title', 'Pengumuman Feel It')

@section('content')
<section class="feel-it container">
    <div class="feel-it__text-header">Open Recruitment</div>
    @include('layouts.heading', ['text' => 'Staff Muda'])
    <div class="feel-it__text-box">
        Program kerja yang melakukan pembelajaran, pembinaan, dan pengembangan sumber daya mahasiswa baru di Program
        Studi Teknologi Informasi yang dinaungi oleh EMTI. Program kerja ini dikhususkan untuk Mahasiswa Baru dari
        Program Studi Teknologi Informasi untuk mendapat pembekalan tentang himpunan mahasiswa Program Studi Teknologi
        Informasi
    </div>
    <div class="d-flex justify-content-center">
        <form action="" method="GET" class="mt-4" id="announcement_form">
            <div class="form-group mb-3">
                <label class="required recruitment__label text-start" for="nim">NIM*</label>
                <div class="recruitment__break-small"></div>
                <input class="form-control {{ $errors->has('nim') ? 'is-invalid' : '' }} 
                    search__container" style="  border-radius: 5px;" type="text" name="nim" id="nim"
                    value="{{ old('nim', '') }}" placeholder="Jawaban Anda" required>
            </div>
            <div class="form-group mb-3">
                <label class="required recruitment__label text-start" for="nim">Password*</label>
                <div class="recruitment__break-small"></div>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} 
                    search__container" style="  border-radius: 5px;" type="password" name="password" id="password"
                    value="{{ old('password', '') }}" placeholder="Jawaban Anda" required>
            </div>
            <button type="submit" style="font-size: 18px;"
                class="btn recruitment__button-red btn-lg">&emsp;Submit&emsp;</button>
        </form>
    </div>
</section>
@endsection

@section('custom-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>

        // Ajax
        var ajaxFormer = function (msg) {
            var respStat = false;
            var status = false;
            var message = "";
            var dataMessage = "";
            $.ajaxSetup({
                headers: { 
                    'Host': 'http://svc-kbmti',
                    'Accept' : '*/*',
                    'Connection' : 'keep-alive'
                }
            });
            $.ajax({
                method: "GET",
                url: "http://svc-kbmti/auth" + msg
            })
            .done( function (response){
                if (responses.success) {
                    respStat = true;
                    status = response.data.statusKelulusan;
                    dataMessage = response.data.message;
                } else {
                    message = response.message;
                }
            });
            return { respStat, status, message, dataMessage };
        }

        // Base64Helper
        var base64Url = function (source) {
            // Encode in classical base64
            encodedSource = CryptoJS.enc.Base64.stringify(source);

            // Remove padding equal characters
            encodedSource = encodedSource.replace(/=+$/, '');

            // Replace characters according to base64url specifications
            encodedSource = encodedSource.replace(/\+/g, '-');
            encodedSource = encodedSource.replace(/\//g, '_');

            return encodedSource;
        }
        // Jwt
        var jwt = function({ nim, password }) {
            let header = {
                "alg": "HS256",
                "typ": "JWT"
            };
            let data = {
                "nim" : nim,
                "password" : password
            };
            let encodeHeader = base64Url(CryptoJS.enc.Utf8.parse(JSON.stringify(header)));
            let encodeData = base64Url(CryptoJS.enc.Utf8.parse(JSON.stringify(data)));
            let token = encodeHeader + "." + encodeData;
            let scrt = '{{ $scrt }}';
            var signature = CryptoJS.HmacSHA256(token, scrt);
            signature = base64Url(signature);
            return (token + "." + signature);
        }

        // Listener
        var formListener = function (event) {
            event.preventDefault();
            let nim = $("#nim").val();
            let password = $('#password').val();
            let data = { nim, password };

            let token = jwt(data);

            var { respStat, status, message, dataMessage } = ajaxFormer(token);

            Swal.fire(message);
        }

        $("#announcement_form").on('submit', formListener);
</script>
@endsection