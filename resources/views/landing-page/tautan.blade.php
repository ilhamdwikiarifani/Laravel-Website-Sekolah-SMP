	@extends('landing-page.index')
	@section('content')

	{{-- Start --}}

	<div class="hero overlay">
	    <div class="img-bg rellax ">
	        <img src="{{ asset("landingpage/images/nav-header.jpg") }}" alt="Image" class="img-fluid">
	    </div>
	    <div class="container mb--berita  d-flex justify-content-center align-items-center">
	        <p class="d-none d-md-flex pt-4 "> <a href="#">Informasi</a> &nbsp; - <span> &nbsp; Link / Tautan</span></p>
	    </div>
	</div>



	{{-- END --}}


	<div class="section">
	    <div class="container">
	        <div class="row">
	            <div class="col-12 mx-auto row align-items-stretch">

					@if ($tautan->count() != 0)

					@foreach ($tautan as $ttn)

	                <div class="col-12 mb-4" data-aos="fade-up" data-aos-delay="300">
	                    <div class="border rounded-3 d-block d-md-flex  justify-content-between align-items-center w-100 p-4 animate">
	                        <div class="d-flex justify-content-start align-items-center gap-2 mb-4 mb-md-0">
	                            <div class=""><img src="https://img.icons8.com/fluency/48/null/external-link.png"
	                                    width="50" />
	                            </div>
	                            <div class="ms-3">
	                                <h6 class="text-tebal -mb-judul">{{ $ttn->nama }}</h6>
	                                <p class="text-dcm"><i class="lni lni-calendar"></i> &nbsp;
										@php
										$date = new DateTime($ttn->published_at);
										@endphp
										{{ $date->format('D, d M Y | H:i:s') }} &nbsp; <span class="text-info-date"><i class="lni lni-timer"></i> {{ $ttn->created_at->diffForHumans() }}</span></p>
	                            </div>
	                        </div>
	                        <div class="">
	                            <a href="{{ $ttn->link }}" target="_blank" class=" px-3 py-2 bg-dark text-white rounded-1 "><i class="lni lni-world"></i> &nbsp; Visit site</a>
	                        </div>
	                    </div>

	                </div>

					@endforeach

					@else
					<h4 class="text-center">Data tidak Ditemukan.</h4>
					@endif

					


	            </div>

				<div class="ms-3" data-aos="fade-up" data-aos-delay="100">
						{!! $tautan->links() !!}
					</div>
	        </div>
	    </div>
	</div>


	@endsection
