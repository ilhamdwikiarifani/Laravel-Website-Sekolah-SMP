{{-- Modal View --}}
@extends('admin-page.index')

@section('content')

<div class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30 p-2">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2 class="mt-3">Edit Link / Tautan</h2>
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
                                    Edit
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>



        <form action="{{ route('tautans.update',$tautan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body p-4">

                <div class="row mb-5">
                    <div class="col-xxl-6 mb-3">
                        <p>Link Lama</p>
                        <div
                            class="d-flex justify-content-center align-items-center rounded-3 p-3 text-center bg-dark text-white">

                            <div>
                                <input type="hidden" name="oldFile" value="{{ $tautan->link }}">
                                <div class="px-5 link-btn"> <a href="{{ $tautan->link }}" target="_blank"><i
                                            class="lni lni-world"></i> &nbsp;{{ $tautan->link }}</a></div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-6">
                        <p>Link Baru</p>
                        <div
                            class="d-flex justify-content-center align-items-center border border-dark  rounded-3 p-3 text-center">
                            <div>
                                <div class="display px-5"></div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="row bg-white p-xl-5 p-3 rounded-3">

                    <div class="col-12">
                        <div class="input-style-2">
                            <label>Link</label>
                            <input type="text" name="link" id="masukkan" value="{{ $tautan->link }}"
                                class="input form-control mt-1- rounded-2 " required/>
                            <span class="icon"> <i class="lni lni-link"></i> </span>
                            <div class="invalid-feedback">
    The Link field is required.
</div> 
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-2">
                            <label>Nama Link</label>
                            <input type="text" name="nama" value="{{ $tautan->nama }}"
                                class="form-control mt-1- rounded-2 "  required/>
                            <span class="icon"> <i class="lni lni-slice"></i> </span>
                             <div class="invalid-feedback">
    The Nama field is required.
</div> 
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-2">
                            <label>Waktu</label>
                            <input type="datetime-local" name="waktu" value="{{ $tautan->waktu }}"
                                class="form-control mt-1- rounded-2 @error('waktu') is-invalid @enderror"  />

                             <div class="invalid-feedback">
    The Waktu field is required.
</div> 
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1">
                            <label>Deskripsi</label>
                            <textarea id="editor" value="" name="deskripsi" rows="6"
                                class="form-control " required
                                >{{ $tautan->deskripsi }}</textarea>
                        </div>
                         <div class="invalid-feedback">
    The Deskrpsi field is required.
</div> 
                    </div>

                    <div class="d-flex justify-content-end align-items-end">
                        <button type="submit" class="btn btn-primary px-5 mt-3">Edit</button>
                    </div>


                </div>




            </div>





        </form>
        {{-- Modal End View --}}
    </div>

</div>

<script src="https://kit.fontawesome.com/2952392494.js" crossorigin="anonymous"></script>

<script>
    const input = document.querySelector("#masukkan")
    const display = document.querySelector(".display")


    input.addEventListener('input', (e) => {
        display.innerHTML = e.target.value;
    })

</script>

@endsection
