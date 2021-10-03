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
                            Melambangkan open recruitment Melambangkan 
                        </div>
                    </div>
                </section>
                <section class="recruitment__content"> 
                    <form method="POST" action="{{ url("open-recruitment.store") }}" enctype="multipart/form-data">
                        @csrf     
                        <div class="form-group">
                            <label class="required recruitment__label" for="name">Nama Lengkap*</label>
                            <div class="recruitment__break-small"></div>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} 
                            search__container" style="  border-radius: 5px;" 
                            type="text" name="name" id="name" value="{{ old('name', '') }}" 
                            placeholder="Jawaban Anda" required>
                            @if($errors->has('name'))
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
                            <label class="required recruitment__label" for="angkatan">Angkatan</label>
                            <div class="recruitment__break-small"></div>
                            <input class="form-control {{ $errors->has('angkatan') ? 'is-invalid' : '' }} 
                            search__container" style="  border-radius: 5px;" 
                            type="text" name="angkatan" id="prodi" value="{{ old('angkatan', '') }}" 
                            placeholder="Jawaban Anda" required>
                            @if($errors->has('angkatan'))
                            @endif
                        </div>  
                        <div class="recruitment__break"></div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group" >
                                    <label class="required recruitment__label" for="tempat_lahir">Tempat Lahir</label>
                                    <div class="recruitment__break-small"></div>
                                    <input class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }} 
                                    search__container" style="  border-radius: 5px;" 
                                    type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', '') }}" 
                                    placeholder="Jawaban Anda" required>
                                    @if($errors->has('tempat_lahir'))
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
                            <label class="required recruitment__label" for="alamat">Alamat</label>
                            <div class="recruitment__break-small"></div>
                            <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}
                            search__container" style="border-radius: 5px;" 
                            name="alamat" id="alamat" value="{{ old('alamat','') }}"
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
                        <label for="foto" class="required recruitment__label">Foto 3X4</label>
                        <input id="file" type="file" name="image">
                        <div class="recruitment__break"></div>
                        <label for="foto" class="required recruitment__label">Berkas</label>
                        <input id="file" type="file" name="berkas">
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