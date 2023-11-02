@extends('landing-page.index')
@section('content')

{{-- Header Start --}}

{{-- <div class="hero overlay">

    <div class="img-bg rellax">
        <img src="{{ asset("landingpage/images/nav-header.jpg") }}" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">

                <h1 class="heading" data-aos="fade-up">Galleri</h1>
                <p class="" data-aos="fade-up">A small river named Duden flows by their place and supplies it with
                    the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                    into your mouth.</p>
            </div>
        </div>
    </div>


</div> --}}


	<div class="hero overlay">
	    <div class="img-bg rellax ">
	        <img src={{ asset("landingpage/images/nav-header.jpg") }} alt="Image" class="img-fluid">
	    </div>
	    <div class="container mb--berita  d-flex justify-content-center align-items-center" data-aos="fade-up">
	        <p class="d-none d-md-flex pt-4 "><span><i class="lni lni-home"></i></span> &nbsp; - &nbsp; <a href="{{ url('/galleri') }}">Galeri</a></p>
	    </div>
	</div>


{{-- Header  End --}}
<div class="section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-12" data-aos="fade-up" data-aos-delay="0">

                <h2 class="heading mb-4" data-aos="fade-up" data-aos-delay="100">Galeri</h2>
            </div>
        </div>


        <div class="row align-items-stretch">

            @if ($galeri->count() != 0)

            @foreach ($galeri as $glr)

            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 " data-aos="fade-up" data-aos-delay="100">
                <div class="media-entry img-galeri ">

                    <a href="{{ asset('storage/'.$glr->foto) }}" data-toggle="lightbox">

                        <img src="{{ asset('storage/'.$glr->foto) }}" alt="{{ asset('storage/'.$glr->foto) }}"
                            class="img-gambar ">
                        <div class="img-cover"></div>
                    </a>

                    <div class="bg-img"></div>

                    <p class="text-gambar"><span><small><span
                                    class="text-black bg-yellow py-1 px-3 rounded-1"><i class="lni lni-calendar"></i>
                                    &nbsp;
                                    @php
                                    $date = new DateTime($glr->waktu);
                                    @endphp
                                    {{ $date->format('D | d M Y') }}</span> &nbsp; <i class="lni lni-timer"></i>
                                {{ $glr->created_at->diffForHumans() }}</small></span>
                        <br>- <br> <span>{{ $glr->caption }}</span></p>
                </div>
            </div>

            @endforeach

            @else
            <h4 class="text-center">Data tidak Ditemukan.</h4>
            @endif

        </div>
        <div data-aos="fade-up" data-aos-delay="100">
            {!! $galeri->links() !!}
        </div>
    </div>
</div>
@endsection
