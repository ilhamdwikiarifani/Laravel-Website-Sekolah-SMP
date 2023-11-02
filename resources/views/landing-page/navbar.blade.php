<nav class="site-nav position-fixed" id="style-navbar" data-aos="fade-down">
    <div class="container pb-2 pt-3">
        

        <div class="site-navigation">
            <div class="row">
                <div class="col-6 col-lg-3 ">
                    <a href="{{ url('/home') }}" class="logo m-0 float-start"><img
                            src="{{ asset('landingpage//images/Logo.png') }}" alt="" class="mt--logo"></a>
                </div>
                <div class="col-lg-6 d-none d-lg-inline-block text-center nav-center-wrap ">
                    <ul class="js-clone-nav  text-center site-menu p-0 m-0">
                        <li class="active"><a href="{{ url('/home') }}">Beranda</a></li>
                        <li class="has-children d-none d-lg-inline-block">
                            <a href="#">Profil</a>
                            <ul class="dropdown">
                                <li><a href="{{ url('/visimisi') }}">Visi & Misi</a></li>
                                <li><a href="{{ url('/struktursekolah') }}">Struktur Sekolah</a></li>
                            </ul>
                        </li>
                        <div class="d-block d-lg-none"> 
                            <li class=""><a href="{{ url('/visimisi') }}">Visi & Misi</a></li>
                        <li class=""><a href="{{ url('/struktursekolah') }}">Struktur Sekolah</a></li>
                        </div>
                        <li class=""><a href="{{ url('/berita') }}">Berita</a></li>
                        <li class=""><a href="{{ url('/galleri') }}">Galeri</a></li>
                        <li class=""><a href="{{ url('/contact') }}">Contact</a></li>

                    </ul>
                </div>
                <div class="col-6 col-lg-3 text-lg-end">

                    @auth
                    <ul class="js-clone-nav d-none d-lg-inline-block text-end site-menu ">
						<li class="text-hitam2 mt-5 mt-md-0 me-2"> <p><i class="lni lni-user text-bold"></i> &nbsp; Hai, <span class="text-tebal">{{ Auth::user()->role->name }}</span></p>  </li>
                        <li class="cta-button"><a href="{{ url('/admin') }}">Dashboard</a></li>
                    </ul>
                    @else
                    <ul class="js-clone-nav d-none d-lg-inline-block text-end site-menu ">
                        <li class="cta-button"><a href="{{ url('/admin') }}" > <i
                                    class="lni lni-user text-bold"></i> &nbsp; Masuk</a></li>
                    </ul>
                    @endauth




                    <a href="#"
                        class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                        data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>




            </div>
        </div>

    </div>
</nav>


<script>

    window.addEventListener('scroll', (event) => {

        let scroll = this.scrollY;
        console.log(scroll);

        if(scroll >= 40){
            document.getElementById('style-navbar').style.background='#161616';
            document.getElementById('style-navbar').style.transition = "1s";
        } else {
             document.getElementById('style-navbar').style.background='';
        }
    })
    
</script>