@extends('admin-page.index')

@section('content')

<section class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>Dashboard</h2>
                        <p class="mt-2">Selamat datang, <span class="fw-bold">{{ Auth::user()->name }}</span> ✨</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper mb-30">
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb px-3 py-2 bg-whitee rounded-3">
                                <li class="breadcrumb-item">
                                    <a href="#0">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Home
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div> 
            </div>
        </div>

        <div class="row">

        <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon success">
                        <i class="lni lni-library"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Berita</h6>
                        <h3 class="text-bold mb-10">{{ @count($berita) }}</h3>
                        <p class="text-sm text-success">
                            <i class="lni lni-arrow-up"></i> 
                            <span class="text-gray"> Jumlah data</span> - 
                            <script>document.write(new Date().getFullYear());</script>
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon success">
                        <i class="lni lni-user"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Data Siswa</h6>
                        <h3 class="text-bold mb-10">{{ @count($siswa) }}</h3>
                        <p class="text-sm text-success">
                            <i class="lni lni-arrow-up"></i> 
                            <span class="text-gray"> Jumlah data</span> - 
                            <script>document.write(new Date().getFullYear());</script>
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon primary">
                        <i class="lni lni-users"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Struktur Sekolah</h6>
                        <h3 class="text-bold mb-10">{{ @count($struktur) }}</h3>
                        <p class="text-sm text-success">
                            <i class="lni lni-arrow-up"></i> 
                            <span class="text-gray"> Jumlah data</span> - 
                            <script>document.write(new Date().getFullYear());</script>
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon orange">
                        <i class="lni lni-image"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Galeri</h6>
                        <h3 class="text-bold mb-10">{{ @count($galeri) }}</h3>
                        <p class="text-sm text-success">
                            <i class="lni lni-arrow-up"></i> 
                            <span class="text-gray"> Jumlah data</span> - 
                            <script>document.write(new Date().getFullYear());</script>
                        </p>
                    </div>
                </div>

            </div>

            </div>

        </div>

    </div>

</section>


@endsection