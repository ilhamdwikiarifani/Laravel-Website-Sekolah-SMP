@extends('landing-page.index')
@section('content')



{{-- Start --}}


	{{-- <div class="hero overlay">

		<div class="img-bg rellax">
        <img src="{{ asset("landingpage/images/nav-header.jpg") }}" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">

                <h1 class="heading " data-aos="fade-up">Struktur Sekolah</h1>
                <p class="" data-aos="fade-up">A small river named Duden flows by their place and supplies it with
                    the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                    into your mouth.</p>
            </div>
        </div>
    </div>

		
	</div>
 --}}


 <div class="hero overlay">
	    <div class="img-bg rellax ">
	        <img src={{ asset("landingpage/images/nav-header.jpg") }} alt="Image" class="img-fluid">
	    </div>
	    <div class="container mb--berita  d-flex justify-content-center align-items-center" data-aos="fade-up">
	        <p class="d-none d-md-flex pt-4 "><span><i class="lni lni-home"></i></span> &nbsp; - &nbsp; <a href="{{ url('/struktursekolah') }}">Struktur Sekolah</a></p>
	    </div>
	</div>

{{-- End --}}
<div class="section">
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-6 mx-auto text-center">
                <div class="heading-content" data-aos="fade-up">
                    <h2 class="heading">Stuktur Organisasi</h2>
                    <p>Profil Kepala Sekolah & Tenaga Pengajar.</p>
                </div>
            </div>
        </div>

        <div class="row align-items-stretch">

            @if ($struktur->count() != 0)

            @foreach ($struktur as $str)

            <div class="col-12 mx-auto col-sm-6 col-md-6 col-lg-3 mt-5 px-5 px-sm-3 px-md-3 px-lg-4  ">
                <div class="person">
                    <div class="img-galeri-struktur mb-4">
								<a href="{{ asset('storage/'.$str->foto) }}" data-toggle="lightbox">
									<img src="{{ asset('storage/'.$str->foto) }}" class="img-gambar-struktur ">
								</a>
							</div>
                    <span class="subheading d-inline-block text-black bg-yellow py-1 px-3 rounded-1">{{ $str->jabatan }}</span>
                    <h3 class="mb-3">{{ $str->nama }}</h3>
                    <p class="text-muted  text-justify">{{ $str->status }}</p>
                </div>
            </div>

            @endforeach


                 @else
	            <h4 class="text-center mt-5">Data tidak Ditemukan.</h4>
	            @endif

        </div>
    </div>
</div>

@endsection
