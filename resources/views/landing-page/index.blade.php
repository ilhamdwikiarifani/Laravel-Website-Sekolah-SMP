
<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

	<link rel="shortcut icon" href="{{ asset('landingpage/images/icon.png') }}">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Brygada+1918:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@400;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('landingpage/fonts/icomoon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('landingpage/fonts/flaticon/font/flaticon.css') }}">

	<link rel="stylesheet" href="{{ asset('landingpage/css/tiny-slider.css') }}">
	<link rel="stylesheet" href="{{ asset('landingpage/css/aos.css') }}">
	<link rel="stylesheet" href="{{ asset('landingpage/css/flatpickr.min.css') }}">
	<link rel="stylesheet" href="{{ asset('landingpage/css/glightbox.min.css') }}">
	<link rel="stylesheet" href="{{ asset('landingpage/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('landingpage/css/new-style.css') }}">
	<link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
	<script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>

	<title>SMP PGRI REJOTANGAN</title>

</head>
<body>


	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>


	@include('landing-page.navbar')
	
	@yield('content')



		<div class="py-5 bg-yellow ">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center mb-3 mb-lg-0 text-lg-start">
					<h3 class="text-black m-0">" Jadilah bagian dari kami untuk mewujudkan pendidikan yang lebih baik. "</h3>
				</div>		
			</div>		
		</div>		
	</div>


	<div class="site-footer">

		@include('landing-page.footer')

		{{-- <!-- Preloader -->
		<div id="overlayer"></div>
		<div class="loader">
			<div class="spinner-border text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
		</div> --}}


		<script src="{{ asset('landingpage/js/bootstrap.bundle.min.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.2/dist/index.bundle.min.js"></script>
		<script src="{{ asset('landingpage/js/tiny-slider.js') }}"></script>
		<script src="{{ asset('landingpage/js/aos.js') }}"></script>
		<script src="{{ asset('landingpage/js/navbar.js') }}"></script>
		<script src="{{ asset('landingpage/js/counter.js') }}"></script>
		<script src="{{ asset('landingpage/js/rellax.js') }}"></script>
		<script src="{{ asset('landingpage/js/flatpickr.js') }}"></script>
		<script src="{{ asset('landingpage/js/glightbox.min.js') }}"></script>
		<script src="{{ asset('landingpage/js/custom.js') }}"></script>

		<script>
    document.querySelectorAll( 'oembed[url]' ).forEach( element => {
        // Create the <a href="..." class="embedly-card"></a> element that Embedly uses
        // to discover the media.
        const anchor = document.createElement( 'a' );

        anchor.setAttribute( 'href', element.getAttribute( 'url' ) );
        anchor.className = 'embedly-card';

        element.appendChild( anchor );
    } );
</script>
	</body>
	</html>
