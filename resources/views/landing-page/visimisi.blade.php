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

                <h1 class="heading " data-aos="fade-up">Visi & Misi</h1>
                <p class="" data-aos="fade-up">A small river named Duden flows by their place and supplies it with
                    the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                    into your mouth.</p>
            </div>
        </div>
    </div>

		
	</div> --}}

{{-- End --}}


<div class="hero overlay">
	    <div class="img-bg rellax ">
	        <img src={{ asset("landingpage/images/nav-header.jpg") }} alt="Image" class="img-fluid">
	    </div>
	    <div class="container mb--berita  d-flex justify-content-center align-items-center" data-aos="fade-up">
	        <p class="d-none d-md-flex pt-4 "><span><i class="lni lni-home"></i></span> &nbsp; - &nbsp; <a href="{{ url('/visimisi') }}">Visi Misi</a></p>
	    </div>
	</div>



    	<div class="section ">
	    <div class="container">
	        <div class="row">

	            <div class="col-lg-6 mb-4 mb-lg-0">
	                <div class="p-2" data-aos="fade-up">
	                    <h2 class="heading mb-3">Visi</h2>
	              
	                        <h4 class="text-left border-5 border-top border-primary pt-5">Aktif, Kreatif, Antusias, Bersih dan Religius (A K B A R)</h4>

							<div class="ms-3 d-block justify-content-start">
								<h5 class="me-3 text-left mt-4">Indikator :</h5>

	                                <div class="d-flex justify-content-start align-items-center me-3 mt-3">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">1</p>
	                                    <p class="ms-3">Mendorong aktifitas dan kreatifitas secara optimal kepada seluruh komponen sekolah terutama para siswa</p>
	                                </div>
	                                <div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">2</p>
	                                    <p class="ms-3">Mengoptimalkan pembelajaran dalam rangka meningkatkan keterampilan siswa supaya mereka memiliki prestasi yang dapat dibanggakan.  </p>
	                                </div>
	                                <div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">3</p>
	                                    <p class="ms-3">Melaksanakan pembelajaran dan bimbingan secara efektif sehingga kecerdasan siswa terus diasah agar terciptanya kecerdasan intelektual dan emosional yang mantap.</p>
	                                </div>
	                                <div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">4</p>
	                                    <p class="ms-3">Antusias terhadap perkembangan dan kemajuan ilmu pengetahuan  dan teknologi.</p>
	                                </div>
	                                <div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">5</p>
	                                    <p class="ms-3">Menanamkan cinta kebersihan dan keindahan kepada semua komponen sekolah. </p>
	                                </div>
									<div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">6</p>
	                                    <p class="ms-3">Menimbulkan penghayatan yang dalam dan pengalaman yang tinggi terhadap ajaran agama (Religi) sehinggan tercipta kematangan dalam befikir dan bertindak. </p>
	                                </div>
							</div>

	                </div>
	            </div>
	            <div class=" col-lg-6 mb-lg-3 mb-0">
	                        <div class="p-2 data-aos="fade-up">

	                            <h2 class="heading mb-3">Misi</h2>
	                            <div class="d-block justify-content-start">


	                                <h5 class="me-3 text-justify ">Menyelenggarakan pendidikan secara professional, inovatif dan selalu berupaya meningkatkan pelayanan dan kepuasan stake holder .</h5>

									<h5 class="me-3 text-justify">Untuk mewujudkan misi yang telah dirumuskan maka langkah-langkah nyata yang harus dilakukan oleh sekolah adalah :</h5>

	                                <div class="d-flex justify-content-start align-items-center me-3 mt-3">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">1</p>
	                                    <p class="ms-3">Mendorong aktifitas dan kreatifitas secara optimal kepada seluruh komponen sekolah terutama para siswa</p>
	                                </div>
	                                <div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">2</p>
	                                    <p class="ms-3">Mengoptimalkan pembelajaran dalam rangka meningkatkan keterampilan siswa supaya mereka memiliki prestasi yang dapat dibanggakan. </p>
	                                </div>
	                                <div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">3</p>
	                                    <p class="ms-3">Melaksanakan pembelajaran dan bimbingan secara efektif sehingga kecerdasan siswa terus diasah agar terciptanya kecerdasan intelektual dan emosional yang mantap.</p>
	                                </div>
	                                <div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">4</p>
	                                    <p class="ms-3">Antusias terhadap perkembangan dan kemajuan ilmu pengetahuan  dan teknologi.</p>
	                                </div>
	                                <div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">5</p>
	                                    <p class="ms-3">Menanamkan cinta kebersihan dan keindahan kepada semua komponen sekolah. </p>
	                                </div>
									<div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">6</p>
	                                    <p class="ms-3">Menimbulkan penghayatan yang dalam dan pengalaman yang tinggi terhadap ajaran agama (Religi) sehinggan tercipta kematangan dalam befikir dan bertindak. </p>
	                                </div>

	                           
	                    </div>

	                </div>
	            </div>

			</div>


				<div class=" col-12 mt-5">
	              
	                        <div class="p-2" data-aos="fade-up">

	                            <h2 class="heading mb-3">Tujuan Jangka Panjang Sekolah </h2>
	                            <div class="d-block justify-content-start">


	                                <h5 class="text-justify mt-4">Berdasarkan Visi dan Misi yang telah dirumuskan dalam kurun waktu 5 tahun kedepan, tujuan yang diharapkan tercapai oleh sekolah pada tahun 2020/2014 adalah  :</h5>


	                                <div class="d-flex justify-content-start align-items-center me-3 mt-3">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">1</p>
	                                    <p class="ms-3">Perolehan Nilai Ujian Nasional rata-rata naik memenuhi standar kelulusan</p>
	                                </div>
	                                <div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">2</p>
	                                    <p class="ms-3">Memiliki kegiatan ekstra kurikuler yang maju dan berprestasi disegala bidang</p>
	                                </div>
	                                <div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">3</p>
	                                    <p class="ms-3">Terwujudnya disiplin yang tinggi dari seluruh warga sekolah.</p>
	                                </div>
	                                <div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">4</p>
	                                    <p class="ms-3">Terwujudanya suasana pergaulan sehari-hari yang berlandaskan keimanan dan ketaqwaan.</p>
	                                </div>
	                                <div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">5</p>
	                                    <p class="ms-3">Terwujudnya manajemen sekolah yang transparan dan partisipatif, melibatkan seluruh warga sekolah dan kelompok kepentingan yang terkait. </p>
	                                </div>
									<div class="d-flex justify-content-start align-items-center me-3 ">
	                                    <p class="px-2 py-1 rounded-3 bg-yellow text-black">6</p>
	                                    <p class="ms-3">Terwujudnya lingkungan sekolah yang bersih, indah, resik dan asri.</p>
	                                </div>

	                       
	                    </div>

	                </div>
	            </div>

	    </div>
	</div>


    @endsection