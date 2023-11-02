@extends('landing-page.index')
@section('content')

@include('landing-page.header')

<div class="section">
    <div class="container">

        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-delay="0">

                <h2 class="heading mb-5">Berita Terbaru</h2>
            </div>
        </div>
        <div class="row align-items-stretch">

             @if ($berita->count() != 0)

            @foreach ($berita as $brt)
            <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="media-entry">

                    <div class="img-galeri-home ">
                        <a href="{{ url('/berita',$brt->slug) }}">
                            <img src="{{ asset('storage/'.$brt->foto) }}" class="img-gambar-home ">
                        </a>
                    </div>
                    <div class="bg-white m-body">

                        <div class=" d-flex justify-content-between align-items-center">
                            <small class=" text-black bg-yellow py-1 px-2 rounded-1">{{ $brt->kategori->nama }}</small>
                            <small class=""><i class="lni lni-timer"></i> {{ $brt->created_at->diffForHumans() }}</small>
                        </div>

                        <h3 class="mt-3"><a href="{{ url('/berita',$brt->slug) }}">{{ $brt->title }}</a></h3>
                        <p>{!! Str::limit($brt->excerpt, 150) !!}</p>

                        <a href="{{ url('/berita',$brt->slug) }}" class="more d-flex align-items-center float-start text-yellow text-decoration-none">
                            <span class="label">Read More</span>
                            <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                        </a>
                    </div>
                </div>
            </div>

            @endforeach

            @else
            <h4 class="text-center">Data tidak Ditemukan.</h4>
            @endif

        </div>
        <div class="text-center mt-5">
            <p class="flex justify-content-center align-items-center m-auto" data-aos="fade-up" data-aos-delay="300"><a href="{{ url('/berita') }}" class="btn btn-primary text-black">View All</a></p>
        </div>
    </div>
</div>



@include('landing-page.visimisi-home')

@include('landing-page.logo')

@endsection