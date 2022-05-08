@extends('layouts.app')

@section('title', 'Recruitment')

@section('content')
<div class="container d-flex justify-content-center ">
    <br><br><br>
    <div class="row">
        <div class="col-md-12">
            <section class="recruitment__top">

                <div class="recruitment__head_text">Open Recruitment Staff FEEL-IT 2022</div>
                @include('layouts.heading', ['text' => 'Staff'])
                <br>
                <div class="recruitment__description-text">
                    <div class="recruitment__description-text-desc">
                       Hallo teman-teman Teknologi Informasi! Silahkan isi form dibawah ini
                       dengan sebenar-benarnya dan upload berkasnya ya!
                       Kami tunggu kontribusimu untuk KBMTI di FEEL-IT! Semangat :)
                    </div>
                </div>
            </section>
            <section class="recruitment__content">
                <form method="POST" action="{{ route("guest.open-recruitment.store") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="required recruitment__label" for="name">Nama Lengkap*</label>
                        <div class="recruitment__break-small"></div>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}
                            search__container" style="  border-radius: 5px;" type="text" name="name" id="name"
                            value="{{ old('name', '') }}" placeholder="Jawaban Anda" required>
                        @if($errors->has('name'))
                        @endif
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label" for="nim">NIM*</label>
                        <div class="recruitment__break-small"></div>
                        <input class="form-control {{ $errors->has('nim') ? 'is-invalid' : '' }}
                            search__container" style="  border-radius: 5px;" type="text" name="nim" id="nim"
                            value="{{ old('nim', '') }}" placeholder="Jawaban Anda" required>
                        @if($errors->has('nim'))
                        @endif
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label" for="angkatan">Angkatan*</label>
                        <div class="recruitment__break-small"></div>
                        <input class="form-control {{ $errors->has('angkatan') ? 'is-invalid' : '' }}
                            search__container" style="  border-radius: 5px;" type="text" name="angkatan" id="prodi"
                            value="{{ old('angkatan', '') }}" placeholder="Jawaban Anda" required>
                        @if($errors->has('angkatan'))
                        @endif
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label" for="id_line">ID Line*</label>
                        <div class="recruitment__break-small"></div>
                        <input class="form-control {{ $errors->has('id_line') ? 'is-invalid' : '' }}
                            search__container" style="  border-radius: 5px;" type="id_line" name="id_line" id="id_line"
                            value="{{ old('id_line', '') }}" placeholder="Jawaban Anda" required>
                        @if($errors->has('id_line'))
                        @endif
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label" for="no_hp">No. Handphone(WA)*</label>
                        <div class="recruitment__break-small"></div>
                        <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}
                            search__container" style="  border-radius: 5px;" type="text" name="no_hp" id="no_hp"
                            value="{{ old('no_hp', '') }}" placeholder="Jawaban Anda" required>
                        @if($errors->has('no_hp'))
                        @endif
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label" for="pilihan1">Divisi Pilihan 1*</label>
                        <div class="recruitment__break-small"></div>
                        <select name="pilihan1" id="pilihan1"
                            class="form-control {{ $errors->has('pilihan1') ? 'is-invalid' : '' }} search__container"
                            style="border-radius: 5px">
                            <option value disabled {{ old('pilihan1', null) === null ? 'selected' : '' }}>Silahkan Memilih</option>
                            <option value="Perlengkapan">Perlengkapan</option>
                            <option value="Konsumsi, Dana, dan Kesehatan (Kodakes)">Konsumsi, Dana, dan Kesehatan (Kodakes)</option>
                            <option value="Hubungan Masyarakat(Humas)">Hubungan Masyarakat(Humas)</option>
                            <option value="Acara">Acara</option>
                            <option value="Pendamping">Pendamping</option>
                            <option value="Dokumentasi dan Desain Multimedia(DDM)">Dokumentasi dan Desain Multimedia(DDM)</option>
                            <option value="Koordinator Lapangan (Korlap)">Koordinator Lapangan (Korlap)</option>
                            <option value="Kesekretariatan (Kestari)">Kesekretariatan (Kestari)</option>
                        </select>
                        @if($errors->has('pilihan1'))
                        @endif
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label" for="pilihan2">Divisi Pilihan 2*</label>
                        <div class="recruitment__break-small"></div>
                        <select name="pilihan2" id="pilihan2"
                            class="form-control {{ $errors->has('pilihan2') ? 'is-invalid' : '' }} search__container"
                            style="border-radius: 5px">
                            <option value disabled {{ old('pilihan2', null) === null ? 'selected' : '' }}>Silahkan Memilih</option>
                            <option value="Perlengkapan">Perlengkapan</option>
                            <option value="Konsumsi, Dana, dan Kesehatan (Kodakes)">Konsumsi, Dana, dan Kesehatan (Kodakes)</option>
                            <option value="Hubungan Masyarakat(Humas)">Hubungan Masyarakat(Humas)</option>
                            <option value="Acara">Acara</option>
                            <option value="Pendamping">Pendamping</option>
                            <option value="Dokumentasi dan Desain Multimedia(DDM)">Dokumentasi dan Desain Multimedia(DDM)</option>
                            <option value="Koordinator Lapangan (Korlap)">Koordinator Lapangan (Korlap)</option>
                            <option value="Kesekretariatan (Kestari)">Kesekretariatan (Kestari)</option>
                        </select>
                        @if($errors->has('pilihan2'))
                        @endif
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label">Download Berkas Pendaftaran disini!</label>
                        <div class="recruitment__break-small"></div>
                        <div >
                            <a href="https://drive.google.com/drive/folders/1zHLgshf1TwsCW5aDhBYxvVBVBbqZ27mJ?usp=sharing" target="blank" class="btn recruitment__button-input btn-lg ms-auto me-auto"><img src="{{ asset('img/directbox-send.svg') }}"> Download Pemberkasan (Email UB)</a>
                        </div>
                    </div>
                    <div class="recruitment__break"></div>


                    {{-- <div class="form-group">
                        <label class="required recruitment__label">Silahkan submit berkas kalian pada link dibawah!</label>
                        <div class="recruitment__break-small"></div>
                        <div >
                            <a href="#" target="blank" class="btn recruitment__button-input btn-lg ms-auto me-auto"><img src="{{ asset('img/directbox-send.svg') }}"> Upload Pemberkasan (Email UB)</a>
                        </div>
                    </div> --}}

                    <div class="recruitment__break"></div>

                    <div class="form-group">
                        <label class="required recruitment__label" for="tempat_lahir">Link berkas anda*</label>
                        <div class="recruitment__break-small"></div>
                            <input class="form-control
                            search__container" style="  border-radius: 5px;" type="text" name="tempat_lahir"
                            id="tempat_lahir" value="" placeholder="Jawaban Anda"
                            required>
                        </div>
                    </div>



                    <div class="recruitment__break-small"></div>
                    <div class="recruitment__break"></div>
                    <button type="submit" style="font-size: 18px;" class="btn recruitment__button-red btn-lg">
                    &emsp;&emsp;&emsp;Submit&emsp;&emsp;&emsp;
                    </button>
                </form>
            </section>
            <section class="recruitment__down">
            </section>
        </div>
    </div>
</div>
@endsection
