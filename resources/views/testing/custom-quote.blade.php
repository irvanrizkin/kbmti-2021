<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Quote</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Font Awesome --}}
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />

    {{-- Custom CSS --}}
    <style>
        .blockquote-custom {
            position: relative;
            font-size: 1.1rem;
        }

        .blockquote-custom-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: -25px;
            left: 50px;
        }

        /* My Custom */
        .custom-bg {
            background-color: #951C21;
        }

        .custom-blockquote-border-radius {
            border-radius: 50px;
        }

        .custom-card-body-bg {
            background-color: #F5F5F5;
        }



        body {
            background: #eff0eb;
            background-image: url('https://i.postimg.cc/MTbfnkj6/bg.png');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>

</head>

<body>
    <section class="py-5">
        <div class="container">
            {{-- Demo Purpose --}}
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <header class="text-center pb-5">
                        <h1 class="h2">Bootstrap custom quote</h1>
                        <p>Build a nicely styled quote in Bootstrap 4.<br>Bootstrap snippet by <a
                                href="https://bootstrapious.com/snippets"
                                class="font-italic text-info">Bootstrapious</a></p>
                    </header>
                </div>
            </div>
            {{-- End --}}


            <div class="row">
                <div class="col-lg-6 mx-auto">

                    {{-- Custom Blockquote --}}
                    <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                        <div class="blockquote-custom-icon bg-info shadow-sm"><i
                                class="fa fa-quote-left text-white"></i></div>
                        <p class="mb-0 mt-2 font-italic">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo <a href="#"
                                class="text-info">@consequat</a>."</p>
                        <footer class="blockquote-footer pt-4 mt-4 border-top">Someone famous in
                            <cite title="Source Title">Source Title</cite>
                        </footer>
                    </blockquote>
                    {{-- End --}}

                    {{-- Custom Blockquote --}}
                    <blockquote class="blockquote blockquote-custom custom-card-body-bg p-5 shadow custom-blockquote-border-radius">
                        <div class="blockquote-custom-icon custom-bg shadow-sm">
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
                    {{-- End --}}

                    {{-- Custom Blockquote --}}
                    <blockquote class="blockquote blockquote-custom custom-card-body-bg p-5 shadow custom-blockquote-border-radius">
                        <div class="blockquote-custom-icon custom-bg shadow-sm">
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
                    {{-- End --}}

                </div>
            </div>
        </div>
    </section>

    {{-- Option 1: Bootstrap Bundle with Popper --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>