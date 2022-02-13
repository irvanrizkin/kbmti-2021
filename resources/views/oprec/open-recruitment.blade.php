@extends('layouts.app')

@section('title', 'Recruitment')

@section('content')
<div class="container d-flex justify-content-center ">
    <br><br><br>
    <div class="row">
        <div class="col-md-12">
            <section class="recruitment__top">

                <div class="recruitment__head_text">Open Recruitment Staff KBMTI 2022</div>
                @include('layouts.heading', ['text' => 'Staff'])
                <br>
                <div class="recruitment__description-text">
                    <div class="recruitment__description-text-desc">
                        Hallo teman-teman Teknologi Informasi 2022! Silahkan isi form di bawah ini dengan
                        sebenar-benarnya dan upload berkasnya ya!
                        Kami tunggu kontribusimu untuk KBMTI! Semangat :)
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
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label class="required recruitment__label" for="tempat_lahir">Tempat Lahir*</label>
                                <div class="recruitment__break-small"></div>
                                <input class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}
                                    search__container" style="  border-radius: 5px;" type="text" name="tempat_lahir"
                                    id="tempat_lahir" value="{{ old('tempat_lahir', '') }}" placeholder="Jawaban Anda"
                                    required>
                                @if($errors->has('tempat_lahir'))
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="required recruitment__label" for="tanggal_lahir">Tanggal Lahir*</label>
                                <div class="recruitment__break-small"></div>
                                <input class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}
                                    search__container" style="  border-radius: 5px;" type="text" name="tanggal_lahir"
                                    id="tanggal_lahir" value="{{ old('tanggal_lahir', '') }}" placeholder="Jawaban Anda"
                                    required>
                                @if($errors->has('tanggal_lahir'))
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label" for="alamat">Alamat*</label>
                        <div class="recruitment__break-small"></div>
                        <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}
                            search__container" style="border-radius: 5px;" name="alamat" id="alamat"
                            value="{{ old('alamat','') }}" placeholder="Jawaban Anda"></textarea>
                        @if($errors->has('content'))
                        @endif
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label" for="email">Email*</label>
                        <div class="recruitment__break-small"></div>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}
                            search__container" style="  border-radius: 5px;" type="email" name="email" id="email"
                            value="{{ old('email', '') }}" placeholder="Jawaban Anda" required>
                        @if($errors->has('email'))
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
                        <label class="required recruitment__label" for="no_hp">No. Handphone*</label>
                        <div class="recruitment__break-small"></div>
                        <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}
                            search__container" style="  border-radius: 5px;" type="text" name="no_hp" id="no_hp"
                            value="{{ old('no_hp', '') }}" placeholder="Jawaban Anda" required>
                        @if($errors->has('no_hp'))
                        @endif
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label" for="pilihan1">Departemen/Biro Pilihan 1*</label>
                        <div class="recruitment__break-small"></div>
                        <select name="pilihan1" id="pilihan1"
                            class="form-control {{ $errors->has('pilihan1') ? 'is-invalid' : '' }} search__container"
                            style="border-radius: 5px">
                            <option value disabled {{ old('pilihan1', null) === null ? 'selected' : '' }}>Silahkan Memilih</option>
                            <option value="Human Resource Development">Human Resource Development</option>
                            <option value="Advocacy">Advocacy</option>
                            <option value="Social Environment">Social Environment</option>
                            <option value="Research and Development">Research and Development</option>

                            <option value="Relation and Creative">Relation and Creative</option>
                            <option value="BPMTI Komisi 1">BPMTI Komisi 1</option>
                            <option value="BPMTI Komisi 2">BPMTI Komisi 2</option>
                            <option value="BPMTI Komisi 3">BPMTI Komisi 3</option>
                        </select>
                        @if($errors->has('pilihan1'))
                        @endif
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label" for="pilihan2">Departemen/Biro Pilihan 2*</label>
                        <div class="recruitment__break-small"></div>
                        <select name="pilihan2" id="pilihan2"
                            class="form-control {{ $errors->has('pilihan2') ? 'is-invalid' : '' }} search__container"
                            style="border-radius: 5px">
                            <option value disabled {{ old('pilihan2', null) === null ? 'selected' : '' }}>Silahkan Memilih</option>
                            <option value="Human Resource Development">Human Resource Development</option>
                            <option value="Advocacy">Advocacy</option>
                            <option value="Social Environment">Social Environment</option>
                            <option value="Research and Development">Research and Development</option>
                            <option value="Relation and Creative">Relation and Creative</option>
                            <option value="BPMTI Komisi 1">BPMTI Komisi 1</option>
                            <option value="BPMTI Komisi 2">BPMTI Komisi 2</option>
                            <option value="BPMTI Komisi 3">BPMTI Komisi 3</option>
                        </select>
                        @if($errors->has('pilihan2'))
                        @endif
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label">Download Berkas Pendaftaran disini!</label>
                        <div class="recruitment__break-small"></div>
                        <div >
                            <a href="https://drive.google.com/file/d/1uH15TIjnFCYqjZva-I2ULBuqyvzt8Spv/view?usp=sharing" target="blank" class="btn recruitment__button-input btn-lg ms-auto me-auto"><img src="{{ asset('img/directbox-send.svg') }}"> Download Pemberkasan (Email UB)</a>
                        </div>
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label">Silahkan submit berkas kalian pada link dibawah!</label>
                        <div class="recruitment__break-small"></div>
                        <div >
                            <a href="https://forms.gle/Z88wNbgHP8JqqGo98" target="blank" class="btn recruitment__button-input btn-lg ms-auto me-auto"><img src="{{ asset('img/directbox-send.svg') }}"> Upload Pemberkasan (Email UB)</a>
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
