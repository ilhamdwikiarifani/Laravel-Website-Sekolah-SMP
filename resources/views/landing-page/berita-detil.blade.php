	@extends('landing-page.index')
	@section('content')


	<div class="hero overlay">
	    <div class="img-bg rellax ">
	        <img src={{ asset("landingpage/images/nav-header.jpg") }} alt="Image" class="img-fluid">
	    </div>
	    <div class="container mb--berita  d-flex justify-content-center align-items-center">
	        <p class="d-none d-md-flex pt-4 "> <a href="#">Berita</a> &nbsp; - <span> &nbsp;
	                {{ Str::limit($berita->title, 65) }}</span></p>
	    </div>
	</div>



	<div class="section">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-8 mx-auto row align-items-stretch">


	                <div class="col-12 mb-4" data-aos="fade-up" data-aos-delay="300">
	                    <div class="media-entry">
	                        <a href="{{ asset('storage/'.$berita->foto) }}" data-toggle="lightbox">
	                            <img src="{{ asset('storage/'.$berita->foto) }}" alt="Image" class="img-berita">
	                        </a>


	                        <div class="bg-white m-body">
	                            <div class=" d-block d-md-flex justify-content-start align-items-center gap-3">
	                                <div>
	                                    <small
	                                        class=" text-black bg-yellow py-1 px-2 rounded-1">{{ $berita->kategori->nama }}</small>
	                                    <small class="ms-2"> <i class="lni lni-calendar"></i>
	                                        @php
	                                        $date = new DateTime($berita->published_at);
	                                        @endphp
	                                        {{ $date->format('D, d M Y | H:i:s') }}

	                                    </small>
	                                </div>
	                                <div class="mt-2 mt-md-0"><small class=""> <i class="lni lni-eye"></i>
	                                        {{ $totalViews }} x dibaca</small>
	                                    <small class="ms-2"> <i class="lni lni-timer"></i>
	                                        {{ $berita->created_at->diffForHumans() }}</small></div>
	                            </div>
	                            <h2 class="my-3 text-black">{{ $berita->title }}</h2>
	                            <div id="container">
	                                {!! $berita->body !!}
	                                {{-- {{  $berita->body }} --}}
	                            </div>

	                        </div>
	                    </div>
	                </div>

	            </div>

	            <div class="col-md-4 sidebar">
	                <div class="sidebar-box">
	                    <h3 class=" mb-4">Document / File</h3>

	                    @if ($document->count() != 0)

	                    @foreach ($document as $dcm)
	                    <div class="d-flex justify-content-start align-items-center mb-4">
	                        <img src="https://img.icons8.com/fluency/48/null/document.png" width="45" />
	                        <div class="ms-4 ">
	                            <p class="mb-1- text-info-head link-btn "></i> <a href="{{ asset('storage/'.$dcm->file) }}"
	                                     download>{{ $dcm->nama }}</a></p>
	                            <span class="text-info-date"><i class="lni lni-timer"></i>
	                                {{ $dcm->created_at->diffForHumans() }}</span>
	                        </div>
	                    </div>
	                    @endforeach

	                    @else
	                    <h4 class="text-center">Data tidak Ditemukan.</h4>
	                    @endif

	                    <a href="{{ url('/document') }}"
	                        class="more d-flex align-items-center float-start text-yellow text-decoration-none">
	                        <span class="label">View All</span>
	                        <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
	                    </a>

	                </div>

					<div class="sidebar-box">
						<h3 class=" mb-4">Link / Tautan</h3>

						@if ($tautan->count() != 0)

						@foreach ($tautan as $ttn)
						<div class="d-flex justify-content-start align-items-center mb-4">
							<img src="https://img.icons8.com/fluency/48/null/external-link.png" width="39"/>
							<div class="ms-4">
								<p class="mb-1- text-info-head link-btn "></i> <a href="{{ $ttn->link }}" target="_blank">{{ $ttn->nama }}</a></p>
								<span class="text-info-date"><i class="lni lni-timer"></i> {{ $ttn->created_at->diffForHumans() }}</span>
							</div>
						</div>
						@endforeach

						@else
            			<h4 class="text-center">Data tidak Ditemukan.</h4>
            			@endif


						<a href="{{ url('/tautan') }}" class="more d-flex align-items-center float-start text-yellow text-decoration-none">
							<span class="label">View All</span>
							<span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
						</a>

					</div>

	                <div class="sidebar-box">
	                    <div class="categories">
	                        <h3>Baca Lainya</h3>

							@if ($rekom->count() != 0)

	                        @foreach ($rekom as $brt)
	                        <div class="d-flex justify-content-start align-items-center mb-4">
	                            <div class="img-galeri-detil ">
	                                <a href="{{ url('/berita',$brt->slug) }}">
	                                    <img src="{{ asset('storage/'.$brt->foto) }}" class="img-gambar-detil ">
	                                </a>
	                            </div>
	                            <div class="ms-4 ">
	                                <p class="mb-1- text-info-head link-btn "></i> <a href="{{ url('/berita',$brt->slug) }}"
	                                        >{{ $brt->title }}</a></p>
	                                <span class="text-info-date"><i class="lni lni-calendar"></i> &nbsp;
	                                    @php
	                                    $date = new DateTime($berita->published_at);
	                                    @endphp
	                                    {{ $date->format('D, d M Y | H:i:s') }}</span>
	                            </div>
	                        </div>
	                        @endforeach
							
							@else
            			<h4 class="text-center">Data tidak Ditemukan.</h4>
            			@endif


	                        <a href="{{ url('/berita') }}"
	                            class="more d-flex align-items-center float-start text-yellow text-decoration-none">
	                            <span class="label">View All</span>
	                            <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
	                        </a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


	@endsection
