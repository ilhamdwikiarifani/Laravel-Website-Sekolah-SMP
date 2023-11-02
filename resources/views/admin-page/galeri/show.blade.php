{{-- Modal View --}}
@extends('admin-page.index')

@section('content')

<div class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30 p-2">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2 class="mt-3">View Galeri</h2>
                        <div class="d-flex gap-2">
                            <a href="{{ url('/admin-page/galeri') }}" class="px-3 py-2 bg-whitee mt-3 rounded-2"><i
                                    class="lni lni-arrow-left"></i> Kembali ke
                                Galeri</a>
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

                <div class="row">

                    <div class="col-xxl-4 pe-xl-4 p-0 rounded-3">
                    <div class="card-style-2 mb-30">
                        <div class="card-image">
                            <img src="{{ asset('storage/'.$galeri->foto) }}" alt="" />
                        </div>
                        <div class="card-content">
                            <h6 class="mb-2"><i class="lni lni-image me-1"></i> Preview Images</h6>
                            <span class="mb-3 text-date"><i class="lni lni-folder"></i> {{ $galeri->foto }} &nbsp;
                               <i class="lni lni-timer"></i> {{ $galeri->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-8 bg-white p-xl-5 p-3 rounded-3">

                     <div class="col-12">
                        <div class="input-style-2">
                            <label>Waktu</label>
                            <input type="text" name="waktu" value="{{ $galeri->waktu }}"
                                class="form-control mt-1- rounded-2 @error('waktu') is-invalid @enderror" disabled />
                            @error('waktu')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="input-style-1">
                            <label>Caption</label>
                            <textarea name="caption" rows="6"
                                class="form-control @error('caption') is-invalid @enderror"
                                disabled>{{ $galeri->caption }}</textarea>
                        </div>
                        @error('caption')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                </div>




                </div>

                
            </div>
            

    </div>

</div>


@endsection
