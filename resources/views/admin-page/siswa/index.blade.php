@extends('admin-page.index')

@section('content')


<!-- Modal Tambah data -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf

                <div class="modal-body px-xl-5 px-4">



                    <div class="row">

                        <div class="col-12">
                            <div class="input-style-2">
                                <label>Name</label>
                                <input type="text" placeholder="Full Name" name="nama" value="{{ old('nama') }}"
                                    class="form-control mt-1- rounded-2" required />
                                {{-- <span class="icon"> <i class="lni lni-user"></i> </span> --}}
                                <div class="invalid-feedback">
                                    The Nama field is required.
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-style-2">
                                <label>Foto</label>
                                <input type="file" placeholder="Masukan Foto" name="foto" id="foto"
                                    onchange="previewFoto()" class="form-control mt-1- rounded-2 " required />
                                {{-- <span class="icon"> <i class="lni lni-image"></i></span> --}}
                                <div class="invalid-feedback">
                                    The Foto field is required.
                                </div>
                            </div>
                        </div>

                        <div class="w-100 mb-10" style="margin-top: -25px">
                            <small>*Preview</small>
                            <img class="img-preview img-fluid mb-3 img-size">
                        </div>


                        <div class="col-12">
                            <div class="input-style-2">
                                <label>NISN</label>
                                <input type="text" placeholder="Masukan NISN" name="nisn" value="{{ old('nisn') }}"
                                    class="form-control mt-1- rounded-2 " required />
                                {{-- <span class="icon"> <i class="lni lni-postcard"></i> </span> --}}
                                <div class="invalid-feedback">
                                    The NISN field is required.
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-style-2">
                                <label>NIK</label>
                                <input type="text" placeholder="Masukan NIK" name="nik" value="{{ old('nik') }}"
                                    class="form-control mt-1- rounded-2" required />
                                {{-- <span class="icon"> <i class="lni lni-license"></i> </span> --}}
                                <div class="invalid-feedback">
                                    The NIK field is required.
                                </div>
                            </div>
                        </div>


                        <div class="col-xxl-4">
                            <div class="input-style-2">
                                <label>Tempat</label>
                                <input type="text" placeholder="Tempat Lahir" name="tempat" value="{{ old('tempat') }}"
                                    class="form-control mt-1- rounded-2 " required />
                                {{-- <span class="icon"> <i class="lni lni-map-marker"></i> </span> --}}
                                <div class="invalid-feedback">
                                    The Tempat Lahir field is required.
                                </div>
                            </div>

                        </div>
                        <div class="col-xxl-4">
                            <div class="input-style-2">
                                <label>Tanggal</label>
                                <input type="date" placeholder="Tanggal Lahir" name="tanggallahir"
                                    value="{{ old('tanggallahir') }}" class="form-control mt-1- rounded-2" required />
                                {{-- <span class="icon"> <i class="lni lni-calendar"></i> </span> --}}
                                <div class="invalid-feedback">
                                    The Tanggal Lahir field is required.
                                </div>
                            </div>

                        </div>

                        <div class="col-xxl-4">
                            <div class="select-style-1">
                                <label>Gender</label>
                                <div class="select-position">
                                    <select class="light-bg" name="jeniskelamin">
                                        <option value="Laki-Laki" selected>Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-xxl-6">
                            <div class="input-style-2">
                                <label>Username</label>
                                <input type="email" placeholder="Username Akun Belajar id" name="userbelajarid"
                                    value="{{ old('userbelajarid') }}" class="form-control mt-1- rounded-2" required />
                                {{-- <span class="icon"> <i class="lni lni-user"></i> </span> --}}
                                <div class="invalid-feedback">
                                    The Username field is required.
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-xxl-6">
                            <div class="input-style-2">
                                <label>Password</label>
                                <input type="text" placeholder="Password Akun Belajar id" name="passwordbelajarid"
                                    value="{{ old('passwordbelajarid') }}" class="form-control mt-1- rounded-2"
                                    required />
                                {{-- <span class="icon"> <i class="lni lni-key"></i> </span> --}}
                                <div class="invalid-feedback">
                                    The Password field is required.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label>Alamat</label>
                                <textarea placeholder="Type here" name="alamat" rows="6" class="form-control"
                                    required>{{ old('alamat') }}</textarea>
                                <div class="invalid-feedback">
                                    The Alamat field is required.
                                </div>
                            </div>

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
                        <h2 class="mt-3">Data Siswa</h2>
                        <div class="d-flex gap-2">
                            <a href="{{ url('/admin-page/siswa/create') }}" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" class="px-3 py-2 bg-whitee mt-3 rounded-2 animate"><i
                                    class="lni lni-plus"></i> Tambah Data</a>
                            <a href="{{ route('exportsiswa') }}" class="px-3 py-2 bg-exel-new mt-3 rounded-2"> <img
                                    src="{{ asset('adminpage/assets/images/logo/exel.png') }}" width="21" /> Export to
                                Exel</a>
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
                                    Struktur Sekolah
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
                <table id="example" class="table table-bordered table-light nowrap" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>NISN</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($siswa as $sswa)

                        <tr>
                            <td>{{ $sswa->nama }}</td>
                            <td> <img src="{{ asset('storage/'.$sswa->foto) }}" alt="{{ $sswa->foto }}" width="50px"
                                    class="rounded-3 border border-dark" /></td>
                            <td>{{ $sswa->nisn }}</td>
                            <td>{{ $sswa->nik }}</td>
                            <td>{{ $sswa->jeniskelamin }}</td>
                            <td>
                                <form action="{{ route('siswas.destroy',$sswa->id) }}" method="POST">

                                    <a href="{{ url('/admin-page/siswa/show',$sswa->id) }}"
                                        class="px-3 py-1 bg-whitee btn-action rounded-3 text-black"><i
                                            class="lni lni-keyword-research"></i> View</a>
                                    <button class=" px-3 py-1 bg-whitee btn-action rounded-3 " type="button"
                                        id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="lni lni-more-alt"></i>
                                    </button>
                                    <ul class="dropdown-menu delete-menu dropdown-menu-end p-2"
                                        aria-labelledby="profile">
                                        <li>
                                            <a href="{{ url('/admin-page/siswa/edit',$sswa->id) }}"
                                                class="d-flex justify-content-start align-items-center gap-2"> <i
                                                    class="lni lni-pencil"></i> Edit
                                            </a>
                                        </li>
                                        <li>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" onclick="return confirm('Yakin Menghapus Data ini?')"
                                                class="d-flex justify-content-start align-items-center gap-2 border-0 "><i
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

<script>
    function previewFoto() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>


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


@endsection
