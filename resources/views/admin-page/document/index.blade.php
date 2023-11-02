@extends('admin-page.index')

@section('content')


<!-- Modal Tambah data -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah File Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf

            <div class="modal-body p-4">

                <div class="w-100 pb-4">
                        <p>Preview</p>
                        <div
                            class="d-flex justify-content-center align-items-center rounded-3 p-3 bg-dark text-white text-center" id="file-preview">

                        </div>

                    </div>

                <div class="row">


                    <div class="col-12">
                        <div class="input-style-2">
                            <label>FIle</label>
                            <input type="file"  name="file" id="file" onchange="previewFile()" value="{{ old('file') }}"
                                class="form-control mt-1- rounded-2 " required/>
                            {{-- <span class="icon"> <i class="lni lni-empty-file"></i> </span> --}}
                            <div class="invalid-feedback">
                                    The File field is required.
                            </div> 
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="input-style-2">
                            <label>Waktu</label>
                            <input type="datetime-local"  name="waktu"  value="{{ old('waktu') }}"
                                class="form-control mt-1- rounded-2 " required/>
                          
                            <div class="invalid-feedback">
                                    The Waktu field is required.
                            </div> 
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="input-style-2">
                            <label>Nama Document</label>
                            <input type="text" placeholder="Masukan nama document"  name="nama"  value="{{ old('nama') }}"
                                class="form-control mt-1- rounded-2 " required/>
                            {{-- <span class="icon"> <i class="lni lni-slice"></i> </span> --}}
                            <div class="invalid-feedback">
                                    The Nama Document field is required.
                            </div> 
                        </div>
                    </div>


                    <div class="col-12">
                            <div class="input-style-1">
                                <label>Deskripsi</label>
                                <textarea placeholder="Type here" id="editor" value="" name="deskripsi" rows="6"
                                    class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                            </div>
                            @error('deskripsi')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                    </div>

                </div>
            </div>
             <div class="modal-footer d-flex">
                    <button type="submit" class="btn btn-primary submit">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
                 </form>
        </div>
    </div>
</div>
{{-- Modal End tambah data--}}


{{-- Mulai Navbar --}}

<!-- ========== section start ========== -->
<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30 p-2">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2 class="mt-3">Document / File</h2>
                        <div class="d-flex gap-2">
                            <a href="{{ url('/admin-page/document/create') }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                class="px-3 py-2 bg-whitee mt-3 rounded-2 animate"><i class="lni lni-plus"></i> Tambah
                                Document / File</a>
                            {{-- <a href="#" class="px-3 py-2 bg-exel mt-3 rounded-2"> Export to Exel</a> --}}
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
                                    Document / File
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>


        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <!-- ========== title-wrapper end ========== -->
        <div class="row">
            <div class="col-12 p-4 overflow-auto">
                <table id="example" class="table table-bordered table-light nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama File</th>
                            <th>File</th>
                            <th>Waktu</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                         @foreach ($document as $dcm)

                        <tr>
                            <td>{{ $dcm->nama }}</td>
                            <td>{{ Str::limit($dcm->file, 30) }}</td>
                             @php
                                $date = new DateTime($dcm->waktu);
                            @endphp

                            <td>{{ $date->format('D, d M Y | H:i:s') }}</td>
                           <td >

                                <form action="{{ route('documents.destroy',$dcm->id) }}" method="POST">

                                    <a href="{{ url('/admin-page/document/show',$dcm->id) }}"
                                        class="px-3 py-1 bg-whitee btn-action rounded-3 text-black"> <i class="lni lni-keyword-research"></i> View</a>
                                    <button class=" px-3 py-1 bg-whitee btn-action rounded-3 " type="button"
                                        id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="lni lni-more-alt"></i>
                                    </button>
                                    <ul class="dropdown-menu delete-menu dropdown-menu-end p-2"
                                        aria-labelledby="profile">
                                        <li>
                                            <a href="{{ url('/admin-page/document/edit',$dcm->id) }}" 
                                                class="d-flex justify-content-start align-items-center gap-2"> <i
                                                    class="lni lni-pencil"></i> Edit
                                            </a>
                                        </li>
                                        <li>

                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" onclick="return confirm('Yakin Menghapus Data ini?')"  class="d-flex justify-content-start align-items-center gap-2 border-0 "><i
                                                    class="lni lni-trash-can"></i> Delete</button>

                                            
                                        </li>

                                    </ul>
                                </form>
                            </td>
                        </tr>

                         @endforeach

                    </tbody>

                </table>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->

        </div>
        <!-- End Row -->
    </div>
    <!-- end container -->
</section>
<!-- ========== section end ========== -->

<script
            src="https://kit.fontawesome.com/2952392494.js"
            crossorigin="anonymous"
        ></script>

<script>



    function previewFile() {

        const file = document.querySelector('#file');
        document.querySelector('#file-preview').textContent = file.files[0].name;


    }

</script>



<script>

    (function() {
'use strict';
window.addEventListener('load', function() {
var forms = document.getElementsByClassName('needs-validation');
var validation = Array.prototype.filter.call(forms, function(form) {
form.addEventListener('submit', function(event) {
if (form.checkValidity() === false) {
event.preventDefault();
event.stopPropagation();
}
form.classList.add('was-validated');
}, false);
});
}, false);
})();
</script>

@endsection
