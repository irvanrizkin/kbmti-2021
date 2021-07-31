@extends('layouts.app')

@section('title', 'Berita')

@section('content')
<section class="berita__top">
    @include('layouts.heading', ['text' => 'Berita'])
    <div class="berita__break"></div>
    @include('layouts.search', ['name' => 'searchBerita', 'text' => 'Info Advokasi...'])
</section>
<section class="berita__content">

<section class="berita__content">	
	<div class="container" > 
        <div class="row">
    		<div class="col-sm-4">
            	<div class="berita__card">
                    <img src="{{ asset('img/caroufoot1.png') }}" style="width:100%" >
                     <div class = "berita__container">
                    	<div class="d-flex justify-content-center">
                            <div class="home__down__date">
							Selasa, 03 Mei 2021
                            </div> 
                        </div>
                                    
                        <div class="home__down__title">
							INFO ADVOKASI Pengambilan Jas Almamater Angkatan 2019 Semester GENAP 2019/2020
                        </div>
                                
                    </div>
            	</div>
            </div>
			<div class="col-sm-4">
            	<div class="berita__card">
                    <img src="{{ asset('img/caroufoot1.png') }}" style="width:100%" >
                     <div class = "berita__container">
                    	<div class="d-flex justify-content-center">
                            <div class="home__down__date">
							Selasa, 03 Mei 2021
                            </div> 
                        </div>
                                    
                        <div class="home__down__title">
							INFO ADVOKASI Pengambilan Jas Almamater Angkatan 2019 Semester GENAP 2019/2020
                        </div>
                                
                    </div>
            	</div>
            </div>
			<div class="col-sm-4">
            	<div class="berita__card">
                    <img src="{{ asset('img/caroufoot1.png') }}" style="width:100%" >
                     <div class = "berita__container">
                    	<div class="d-flex justify-content-center">
                            <div class="home__down__date">
							Selasa, 03 Mei 2021
                            </div> 
                        </div>
                                    
                        <div class="home__down__title">
							INFO ADVOKASI Pengambilan Jas Almamater Angkatan 2019 Semester GENAP 2019/2020
                        </div>
                                
                    </div>
            	</div>
            </div>
			<div class="col-sm-4">
            	<div class="berita__card">
                    <img src="{{ asset('img/caroufoot1.png') }}" style="width:100%" >
                     <div class = "berita__container">
                    	<div class="d-flex justify-content-center">
                            <div class="home__down__date">
							Selasa, 03 Mei 2021
                            </div> 
                        </div>
                                    
                        <div class="home__down__title">
							INFO ADVOKASI Pengambilan Jas Almamater Angkatan 2019 Semester GENAP 2019/2020
                        </div>
                                
                    </div>
            	</div>
            </div>
			<div class="col-sm-4">
            	<div class="berita__card">
                    <img src="{{ asset('img/caroufoot1.png') }}" style="width:100%" >
                     <div class = "berita__container">
                    	<div class="d-flex justify-content-center">
                            <div class="home__down__date">
							Selasa, 03 Mei 2021
                            </div> 
                        </div>
                                    
                        <div class="home__down__title">
							INFO ADVOKASI Pengambilan Jas Almamater Angkatan 2019 Semester GENAP 2019/2020
                        </div>
                                
                    </div>
            	</div>
            </div>
			<div class="col-sm-4">
            	<div class="berita__card">
                    <img src="{{ asset('img/caroufoot1.png') }}" style="width:100%" >
                     <div class = "berita__container">
                    	<div class="d-flex justify-content-center">
                            <div class="home__down__date">
							Selasa, 03 Mei 2021
                            </div> 
                        </div>
                                    
                        <div class="home__down__title">
							INFO ADVOKASI Pengambilan Jas Almamater Angkatan 2019 Semester GENAP 2019/2020
                        </div>
                                
                    </div>
            	</div>
            </div>
        </div>
    </div>	
</section>


</section>
<section class="berita__paginator">
    <hr class="berita__hr">
    {{ $berita->links('vendor.pagination.custom') }}
</section>
@endsection
