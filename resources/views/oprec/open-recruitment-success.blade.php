@extends('layouts.app')

@section('title', 'Recruitment') 
 
@section('content')
<div class="container d-flex justify-content-center " >  
    <br><br><br> 
        <div class="row">
            <div class="col-md-12"> 
                <section class="recruitment__top">
                    <div class="recruitment__head_text">Open Recruitment</div>
                    @include('layouts.heading', ['text' => 'Selamat Telah Mendaftar'])
                    <br> 
                </section>
             
                <section class="recruitment__down">
                </section> 
            </div>
        </div> 
</div> 
@endsection   