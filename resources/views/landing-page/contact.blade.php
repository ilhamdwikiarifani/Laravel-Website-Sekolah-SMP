@extends('landing-page.index')
@section('content')


{{-- START --}}


{{-- <div class="hero overlay">

    <div class="img-bg rellax">
        <img src="{{ asset("landingpage/images/nav-header.jpg") }}" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">

                <h1 class="heading" data-aos="fade-up">Contact</h1>
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
	        <p class="d-none d-md-flex pt-4 "><span><i class="lni lni-home"></i></span> &nbsp; - &nbsp; <a href="{{ url('/contact') }}">Contact</a></p>
	    </div>
	</div>



{{-- END --}}

<div class="section">
    <div class="container">
       
        <div class="row mb-4">
            <div class="col-12" data-aos="fade-up" data-aos-delay="0">

                <h2 class="heading mb-5" data-aos="fade-up" data-aos-delay="100">Contact Person</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-info">

                    <div class="address mt-4">
                        <i class="icon-room"></i>
                        <h4 class="mb-2">Lokasi :</h4>
                        <p>Jl. Raya Blitar No. 35 Rejotangan - 66293</p>
                    </div>

                    <div class="open-hours mt-4">
                        <i class="icon-clock-o"></i>
                        <h4 class="mb-2">Jam Kerja:</h4>
                        <p>
                            Senin - Sabtu :<br>
                            07:00 AM - 12:00 AM
                        </p>
                    </div>

                    <div class="email mt-4">
                        <i class="icon-envelope"></i>
                        <h4 class="mb-2">Email:</h4>
                        <p>smppgrirejotangan@gmail.com</p>
                    </div>

                    <div class="phone mt-4">
                        <i class="icon-phone"></i>
                        <h4 class="mb-2">Call:</h4>
                        <p>+62 8 - - -</p>
                    </div>

                </div>
            </div>
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                @if(Session::has('status'))

                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
                @endif
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <input type="text" name="nama" value="{{ old('nama') }}"
                                class="form-control rounded-3 @error('nama') is-invalid @enderror"
                                placeholder="Nama Anda">
                            @error('nama')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control rounded-3 @error('email') is-invalid @enderror"
                                placeholder="Email Anda">
                            @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" name="subject" value="{{ old('subject') }}"
                                class="form-control rounded-3 @error('subject') is-invalid @enderror"
                                placeholder="Subject Pesan">
                            @error('subject')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <textarea name="pesan" id="" value="" cols="30" rows="7"
                                class="form-control rounded-3 @error('pesan') is-invalid @enderror"
                                placeholder="Pesan">{{ old('pesan') }}</textarea>
                            @error('pesan')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <input type="submit" value="Kirim Pesan" class="btn btn-primary text-black">
                        </div>
                    </div>
                </form>
            </div>
        </div>


        {{-- Mappsss --}}

         <div class="row mt-5">
            <div class="col-12" data-aos="fade-up" data-aos-delay="0">
                <h2 class="heading mb-5" data-aos="fade-up" data-aos-delay="100">Maps</h2>
            </div>
           <div data-aos="fade-up" data-aos-delay="0">
			 <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d830.3432590016175!2d112.07924729127286!3d-8.121789801032687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78e90e46003b13%3A0x89ae57042e6d3474!2sSMP%20PGRI%20REJOTANGAN!5e0!3m2!1sid!2sid!4v1669126640159!5m2!1sid!2sid"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="rounded-3 col-12"></iframe>
		   </div>

        </div>
    </div>
</div> <!-- /.untree_co-section -->
@endsection
