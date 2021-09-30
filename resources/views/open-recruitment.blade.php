@extends('layouts.app')

@section('title', 'Recruitment') 
 
@section('content')
<div class="container d-flex justify-content-center " >  
    <br><br><br> 
        <div class="row">
            <div class="col-md-12"> 
                <section class="recruitment__top">
                    
                    <div class="recruitment__head_text">Open Recruitment</div>
                    @include('layouts.heading', ['text' => 'Staff Muda'])
                    <br> 
                    <div class="recruitment__description-text">
                        <div class="recruitment__description-text-desc">
                            Melambangkan open recruitment Melambangkan open recruitment Melambangkan open recruitment
                            Melambangkan open recruitment Melambangkan open recruitment Melambangkan open recruitment
                            Melambangkan open recruitment Melambangkan open recruitment 
                        </div>
                    </div>
                </section>
                <section class="recruitment__content"> 
                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf   
                        <div class="form-group">
                            <label class="required recruitment__label" for="name">Nama Lengkap*</label>
                            <div class="recruitment__break-small"></div>
                            <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }} 
                            search__container" style="  border-radius: 5px;" 
                            type="text" name="nama" id="nama" value="{{ old('nama', '') }}" 
                            placeholder="Jawaban Anda" required>
                            @if($errors->has('nama'))
                            @endif 
                        </div>
                        <div class="recruitment__break"></div>
                        <div class="form-group">
                            <label class="required recruitment__label" for="nim">NIM</label>
                            <div class="recruitment__break-small"></div>
                            <input class="form-control {{ $errors->has('nim') ? 'is-invalid' : '' }} 
                            search__container" style="  border-radius: 5px;" 
                            type="text" name="nim" id="nim" value="{{ old('nim', '') }}" 
                            placeholder="Jawaban Anda" required>
                            @if($errors->has('nim'))
                            @endif
                        </div> 
                        <div class="recruitment__break"></div>
                        <div class="form-group">
                            <label class="required recruitment__label" for="prodi">Program Studi/Angkatan</label>
                            <div class="recruitment__break-small"></div>
                            <input class="form-control {{ $errors->has('prodi') ? 'is-invalid' : '' }} 
                            search__container" style="  border-radius: 5px;" 
                            type="text" name="prodi" id="prodi" value="{{ old('prodi', '') }}" 
                            placeholder="Jawaban Anda" required>
                            @if($errors->has('prodi'))
                            @endif
                        </div>  
                        <div class="recruitment__break"></div>
                        <div class="form-group">
                            <label class="required recruitment__label" for="kelas">Kelas</label>
                            <div class="recruitment__break-small"></div>
                            <input class="form-control {{ $errors->has('kelas') ? 'is-invalid' : '' }} 
                            search__container" style="  border-radius: 5px;" 
                            type="text" name="kelas" id="kelas" value="{{ old('kelas', '') }}" 
                            placeholder="Jawaban Anda" required>
                            @if($errors->has('kelas'))
                            @endif
                        </div> 
                        <div class="recruitment__break"></div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group" >
                                    <label class="required recruitment__label" for="tempat">Tempat</label>
                                    <div class="recruitment__break-small"></div>
                                    <input class="form-control {{ $errors->has('tempat') ? 'is-invalid' : '' }} 
                                    search__container" style="  border-radius: 5px;" 
                                    type="text" name="tempat" id="tempat" value="{{ old('tempat', '') }}" 
                                    placeholder="Jawaban Anda" required>
                                    @if($errors->has('tempat'))
                                    @endif
                                </div> 
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="required recruitment__label" for="tanggal_lahir">Tanggal Lahir</label>
                                    <div class="recruitment__break-small"></div>
                                    <input class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }} 
                                    search__container" style="  border-radius: 5px;" 
                                    type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', '') }}" 
                                    placeholder="Jawaban Anda" required>
                                    @if($errors->has('tanggal_lahir'))
                                    @endif
                                </div>
                            </div>
                        </div> 
                        <div class="recruitment__break"></div>
                        <div class="form-group">
                            <label class="required recruitment__label" for="alamat_asal">Alamat Asal</label>
                            <div class="recruitment__break-small"></div>
                            <textarea class="form-control {{ $errors->has('alamat_asal') ? 'is-invalid' : '' }}
                            search__container" style="border-radius: 5px;" 
                            name="alamat_asal" id="alamat_asal" value="{{ old('alamat_asal','') }}"
                            placeholder="Jawaban Anda"></textarea>
                            @if($errors->has('content'))
                            @endif
                        </div>
                        <div class="recruitment__break"></div>
                        <div class="form-group">
                            <label class="required recruitment__label" for="alamat_malang">Alamat di Malang</label>
                            <div class="recruitment__break-small"></div>
                            <textarea class="form-control {{ $errors->has('alamat_malang') ? 'is-invalid' : '' }}
                            search__container" style="  border-radius: 5px;" 
                            name="alamat_malang" id="alamat_malang" value="{{ old('alamat_malang','') }}" 
                            placeholder="Jawaban Anda"></textarea>
                            @if($errors->has('content'))
                            @endif
                        </div>
                        <div class="recruitment__break"></div>
                        <div class="form-group">
                            <label class="required recruitment__label" for="email">Email</label>
                            <div class="recruitment__break-small"></div>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} 
                            search__container" style="  border-radius: 5px;" 
                            type="email" name="email" id="email" value="{{ old('email', '') }}" 
                            placeholder="Jawaban Anda" required>
                            @if($errors->has('email'))
                            @endif 
                        </div>
                        <div class="recruitment__break"></div>
                        <div class="form-group">
                            <label class="required recruitment__label" for="id_line">ID Line</label>
                            <div class="recruitment__break-small"></div>
                            <input class="form-control {{ $errors->has('id_line') ? 'is-invalid' : '' }} 
                            search__container" style="  border-radius: 5px;" 
                            type="id_line" name="id_line" id="id_line" value="{{ old('id_line', '') }}" 
                            placeholder="Jawaban Anda" required>
                            @if($errors->has('id_line'))
                            @endif 
                        </div>
                        <div class="recruitment__break"></div>
                        <div class="form-group">
                            <label class="required recruitment__label" for="no_hp">No. Handphone</label>
                            <div class="recruitment__break-small"></div>
                            <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }} 
                            search__container" style="  border-radius: 5px;" 
                            type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', '') }}" 
                            placeholder="Jawaban Anda" required>
                            @if($errors->has('no_hp'))
                            @endif 
                        </div>
                        <div class="recruitment__break"></div>
                        <div class="form-group">
                            <label class="required recruitment__label" for="hobi">Hobi</label>
                            <div class="recruitment__break-small"></div>
                            <input class="form-control {{ $errors->has('hobi') ? 'is-invalid' : '' }} 
                            search__container" style="  border-radius: 5px;" 
                            type="text" name="hobi" id="hobi" value="{{ old('hobi', '') }}" 
                            placeholder="Jawaban Anda" required>
                            @if($errors->has('hobi'))
                            @endif 
                        </div>  
                        <div class="recruitment__break"></div>
                        <div class="form-group">
                            <label class="required recruitment__label" for="motto">Motto</label>
                            <div class="recruitment__break-small"></div>
                            <textarea class="form-control {{ $errors->has('motto') ? 'is-invalid' : '' }}
                            search__container" style="  border-radius: 5px;" 
                            name="motto" id="motto" value="{{ old('motto','') }}" 
                            placeholder="Jawaban Anda"></textarea>
                            @if($errors->has('content'))
                            @endif
                        </div>
                        <div class="recruitment__break"></div>
                        <label for="foto" class="required recruitment__label"  >Foto 3X4</label>
                        <div class="recruitment__break-small"></div>
                        <button type="submit" class="btn recruitment__button-input btn-sm">Upload Foto</button>
                        <div class="recruitment__break"></div>
                        <button type="submit" class="btn recruitment__button-red btn-lg">Submit</button>
                        <button type="submit" class="btn recruitment__button-white btn-lg">Clear Form</button>
                    </form>
                </section>
                <section class="recruitment__down">
                </section> 
            </div>
        </div> 
</div> 
@endsection 