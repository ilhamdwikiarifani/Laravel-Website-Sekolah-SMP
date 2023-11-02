	@extends('landing-page.index')
	@section('content')


	{{-- <div class="hero overlay">

		<div class="img-bg rellax">
        <img src="{{ asset("landingpage/images/nav-header.jpg") }}" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">

                <h1 class="heading " data-aos="fade-up">Berita</h1>
                <p class="" data-aos="fade-up">" Setiap anak memiliki kesempatan memperoleh pendidikan yang berkualitas tanpa melihat ia bersekolah dimana. "</p>
            </div>
        </div>
    </div>


	</div> --}}

	<div class="hero overlay">
	    <div class="img-bg rellax ">
	        <img src={{ asset("landingpage/images/nav-header.jpg") }} alt="Image" class="img-fluid">
	    </div>
	    <div class="container mb--berita  d-flex justify-content-center align-items-center" data-aos="fade-up">
	        <p class="d-none d-md-flex pt-4 "><span><i class="lni lni-home"></i></span> &nbsp; - &nbsp; <a href="{{ url('/berita') }}">Berita</a></p>
	    </div>
	</div>




	<div class="section">
		<div class="container">


			<div class="row mb-4">
            <div class="col-12" data-aos="fade-up" data-aos-delay="0">

                <h2 class="heading mb-4" data-aos="fade-up" data-aos-delay="100">Berita / Informasi</h2>
            </div>
        </div>

			<div class="row">
				<div class="col-md-8 mx-auto row align-items-stretch">


					@if ($berita->count() != 0)

					@foreach ($berita as $brt)
					<div class="col-12 col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
						<div class="media-entry">
							<div class="img-galeri-home ">
								<a href="{{ url('/berita',$brt->slug) }}">
									<img src="{{ asset('storage/'.$brt->foto) }}" class="img-gambar-home ">
								</a>
							</div>
							<div class="bg-white m-body">

								<div class=" d-flex justify-content-between align-items-center">
									<small class=" text-black bg-yellow py-1 px-2 rounded-1">{{ $brt->kategori->nama }}</small>
									<small class=""> <i class="lni lni-timer"></i> {{ $brt->created_at->diffForHumans() }}</small>
								</div>
								<h3 class="mt-3"><a href="{{ url('/berita',$brt->slug) }}">{{ $brt->title }}</a></h3>
								<p style="text-align: justify">{!! Str::limit($brt->excerpt, 150) !!}</p>
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

					<div data-aos="fade-up" data-aos-delay="100">
						{!! $berita->links() !!}
					</div>
				</div>

				{{-- Document all --}}

				<div class="col-md-4 sidebar">
					<div class="sidebar-box" data-aos="fade-up" data-aos-delay="200">
						<h3 class=" mb-4">Document / File</h3>

						@if ($document->count() != 0)

						@foreach ($document as $dcm)
						<div class="d-flex justify-content-start align-items-center mb-4">
							<img src="https://img.icons8.com/fluency/48/null/document.png" width="45"/>
							<div class="ms-4 ">
								<p class="mb-1- text-info-head link-btn " ></i> <a href="{{ asset('storage/'.$dcm->file) }}" download>{{ $dcm->nama }}</a></p>
								<span class="text-info-date"><i class="lni lni-timer"></i> {{ $dcm->created_at->diffForHumans() }}</span>
							</div>
						</div>
						@endforeach

						@else
            			<h4 class="text-center">Data tidak Ditemukan.</h4>
            			@endif


						<a href="{{ url('/document') }}" class="more d-flex align-items-center float-start text-yellow text-decoration-none">
							<span class="label">View All</span>
							<span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
						</a>

					</div>

					<div class="sidebar-box" data-aos="fade-up" data-aos-delay="200">
						<h3 class=" mb-4">Link / Tautan</h3>

						@if ($tautan->count() != 0)

						@foreach ($tautan as $ttn)
						<div class="d-flex justify-content-start align-items-center mb-4">
							<img src="https://img.icons8.com/fluency/48/null/external-link.png" width="39"/>
							<div class="ms-4 ">
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
					@include('landing-page.kategori')
				</div>
			</div>
		</div>
	</div>
	</div>

	@endsection