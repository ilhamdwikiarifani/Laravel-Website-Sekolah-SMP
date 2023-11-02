{{-- Modal View --}}
@extends('admin-page.index')

@section('content')

<div class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30 p-2">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2 class="mt-3">View Link / Tautan</h2>
                        <div class="d-flex gap-2">
                            <a href="{{ url('/admin-page/tautan') }}" class="px-3 py-2 bg-whitee mt-3 rounded-2"><i
                                    class="lni lni-arrow-left"></i> Kembali ke
                                Link / Tautan</a>
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

        <div class="modal-body p-4">
            <div class="row mb-4 ">
                <div class="col-12 rounded-3 p-3 text-center text-center bg-dark text-white">

                    <i class="lni lni-world"></i> &nbsp; <a class="link-btn" target="_blank"
                        href="{{ $tautan->link }}">{{ $tautan->link }}</a>

                </div>
            </div>

            <div class="row bg-white p-xl-5 p-3 rounded-3">

                <div class="col-12">
                    <div class="input-style-2">
                        <label>Waktu</label>
                        <input type="datetime-local" name="waktu" value="{{ $tautan->waktu }}"
                            class="form-control mt-1- rounded-2 @error('waktu') is-invalid @enderror" disabled />

                        @error('waktu')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-12">
                    <div class="input-style-2">
                        <label>Nama Link</label>
                        <input type="text" name="nama" value="{{ $tautan->nama }}"
                            class="form-control mt-1- rounded-2 @error('nama') is-invalid @enderror" disabled />
                        <span class="icon"> <i class="lni lni-user"></i> </span>
                        @error('nama')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-12">
                    <div class="input-style-1">
                        <label>Deskripsi</label>
                        <textarea id="editor" value="" name="deskripsi" rows="6"
                            class="form-control @error('deskripsi') is-invalid @enderror"
                            disabled>{{ $tautan->deskripsi }}</textarea>
                    </div>
                    @error('deskripsi')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


            </div>
        </div>


    </div>

</div>

<script src="https://kit.fontawesome.com/2952392494.js" crossorigin="anonymous"></script>




@endsection
