@extends('admin-page.index')

@section('content')




<form action="{{ route('kategori.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-12">
                        <div class="input-style-2">
                            <label>Nama Kategori</label>
                            <input type="text" placeholder="Masukan Kategori" name="nama" value="{{ old('nama') }}"
                                class="form-control mt-1- rounded-2 @error('nama') is-invalid @enderror" required />


                            <div class="invalid-feedback">
                                The Nama Kategori field is required.
                            </div>



                        </div>
                    </div>


                </div>
                <div class="modal-footer d-flex">
                    <button type="submit" class="btn btn-primary submit">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

</form>
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
                        <h2 class="mt-3">Kategori Berita</h2>
                        <div class="d-flex gap-2">
                            <a href="{{ url('/admin-page/kategori/create') }}" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" class="px-3 py-2 bg-whitee mt-3 rounded-2 animate"><i
                                    class="lni lni-plus"></i> Tambah
                                Kategori Berita</a>
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
                                    Berita
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

        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif

        <!-- ========== title-wrapper end ========== -->
        <div class="row">
            <div class="col-12 p-4 overflow-auto">
                <table id="example" class="table table-bordered table-light nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($kategori as $ktr)





                        <tr>

                            <td>{{ $ktr->nama }}</td>
                            <td class="d-flex gap-2">





                                <form action="{{ route('kategori.destroy', $ktr->id) }}" method="POST">

                                    <a href="{{ url('/admin-page/kategori/show', $ktr->slug) }}"
                                        class="px-3 py-1 bg-whitee btn-action rounded-3 text-black"><i
                                            class="lni lni-keyword-research"></i> View</a>

                                    <a href="{{ url('/admin-page/kategori/edit', $ktr->slug) }}"
                                        class="px-3 py-1 bg-whitee btn-action rounded-3 text-black"><i
                                            class="lni lni-pencil"></i> Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button class=" px-3 py-1 bg-whitee btn-action rounded-3"
                                        onclick="return confirm('Yakin Menghapus Data ini?')" type="submit"
                                        id="profile"><i class="lni lni-trash-can"></i>
                                    </button>

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



@endsection


<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {

            var forms = document.getElementsByClassName('needs-validation');

            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
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
