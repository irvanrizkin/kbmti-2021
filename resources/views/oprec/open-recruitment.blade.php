@extends('layouts.app')

@section('title', 'Recruitment')

@section('content')
<div class="container d-flex justify-content-center ">
    <br><br><br>
    <div class="row">
        <div class="col-md-12">
            <section class="recruitment__top">

                <div class="recruitment__head_text">Open Recruitment Staff Muda EMTI 2021</div>
                @include('layouts.heading', ['text' => 'Staff Muda'])
                <br>
                <div class="recruitment__description-text">
                    <div class="recruitment__description-text-desc">
                        Hallo teman-teman Teknologi Informasi 2021! Silahkan isi form dibawah ini dengan
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
                        <div class="col-md-8">
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
                        <label class="required recruitment__label" for="pilihan1">Departemen Pilihan 1*</label>
                        <div class="recruitment__break-small"></div>
                        <select name="pilihan1" id="pilihan1"
                            class="form-control {{ $errors->has('pilihan1') ? 'is-invalid' : '' }} search__container"
                            style="border-radius: 5px">
                            <option value disabled {{ old('pilihan1', null) === null ? 'selected' : '' }}>Silakan
                                Memilih</option>
                            <option value="Human Resource Development">Human Resource Development</option>
                            <option value="Advocacy">Advocacy</option>
                            <option value="Social Environment">Social Environment</option>
                            <option value="Research and Development">Research and Development</option>
                            <option value="Entrepreneur">Entrepreneur</option>
                            <option value="Relation and Creative">Relation and Creative</option>
                        </select>
                        @if($errors->has('pilihan1'))
                        @endif
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label" for="pilihan2">Departemen Pilihan 2*</label>
                        <div class="recruitment__break-small"></div>
                        <select name="pilihan2" id="pilihan2"
                            class="form-control {{ $errors->has('pilihan2') ? 'is-invalid' : '' }} search__container"
                            style="border-radius: 5px">
                            <option value disabled {{ old('pilihan2', null) === null ? 'selected' : '' }}>Silakan
                                Memilih</option>
                            <option value="Human Resource Development">Human Resource Development</option>
                            <option value="Advocacy">Advocacy</option>
                            <option value="Social Environment">Social Environment</option>
                            <option value="Research and Development">Research and Development</option>
                            <option value="Entrepreneur">Entrepreneur</option>
                            <option value="Relation and Creative">Relation and Creative</option>
                        </select>
                        @if($errors->has('pilihan2'))
                        @endif
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <div class="recruitment__head_text">Download Berkas Pendaftaran disini!</div>
                        <div class="d-flex align-items-center w-100 justify-content-center">
                            <a href="https://bit.ly/DaftarStaffMudaEMTI2021" target="blank" class="btn recruitment__button-red btn-lg ms-auto me-auto"><i class="fas fa-download"></i> Download Pemberkasan (Email UB)  <i class="fas fa-download"></i></a>
                        </div>
                    </div>
                    <div class="recruitment__break"></div>
                    <div class="form-group">
                        <div class="recruitment__head_text">Download Berkas Pendaftaran disini!</div>
                        <div class="d-flex align-items-center w-100 justify-content-center">
                            <a href="https://bit.ly/PengumpulanBerkas_StaffMudaEMTI_2021" target="blank" class="btn recruitment__button-red btn-lg ms-auto me-auto"><i class="fas fa-upload"></i> Upload Pemberkasan (Email UB)  <i class="fas fa-download"></i></a>
                        </div>
                    </div>
                    {{-- <div class="recruitment__break"></div>
                    <div class="form-group">
                        <label class="required recruitment__label" for="berkas_link">Link Google Drive Berkas*</label>
                        <div class="recruitment__break-small"></div>
                        <input class="form-control {{ $errors->has('berkas_link') ? 'is-invalid' : '' }}
                    search__container" style=" border-radius: 5px;" type="text" name="berkas_link" id="berkas_link"
                            value="{{ old('berkas_link', '') }}" placeholder="Jawaban Anda" required>
                        @if($errors->has('berkas_link'))
                        @endif
                    </div> --}}
                    {{-- <div class="recruitment__break"></div>
                        <label for="foto" class="required recruitment__label">Foto 3X4</label>
                        <input id="file" type="file" name="photo">
                        <div class="recruitment__break"></div>
                        <label for="foto" class="required recruitment__label">Berkas</label>
                        <input id="file" type="file" name="berkas">
                    <div class="recruitment__break"></div> --}}
                    <div class="recruitment__break"></div>
                    <button type="submit" class="btn recruitment__button-red btn-lg">Submit</button>
                </form>
            </section>
            <section class="recruitment__down">
            </section>
        </div>
    </div>
</div>
@endsection