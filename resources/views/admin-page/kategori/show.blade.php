{{-- Modal View --}}
@extends('admin-page.index')

@section('content')

<div class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30 p-2">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2 class="mt-3">View {{ $kategori->nama }}</h2>
                        <div class="d-flex gap-2">
                            <a href="{{ url('/admin-page/kategori') }}" class="px-3 py-2 bg-whitee mt-3 rounded-2"><i class="lni lni-arrow-left"></i> Kembali ke
                                Kategori Berita</a>
                            <p href="#" class="px-3 py-2 bg-exel mt-3 rounded-2"> <i class="lni lni-grid-alt"></i> </p>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper mb-30">
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb px-3 py-2 bg-whitee rounded-3">
                                <li class="breadcrumb-item">
                                    <a href="#0">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    View
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>


            <div class="modal-body">
                <div class="w-100">
                    <p class="mb-2">Nama Kategori</p>
                    <input type="text" name="nama" value="{{ $kategori->nama }}" class="form-control mt-1- rounded-2" disabled>
                </div>
            </div>

    </div>

</div>

@endsection
