{{-- Modal View --}}
@extends('admin-page.index')

@section('content')

<div class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30 p-2">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2 class="mt-3">View Siswa</h2>
                        <div class="d-flex gap-2">
                            <a href="{{ url('/admin-page/siswa') }}" class="px-3 py-2 bg-whitee mt-3 rounded-2"><i
                                    class="lni lni-arrow-left"></i> Kembali ke
                                Data Siswa</a>
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
                      <img
                        src="{{ asset('storage/'.$siswa->foto) }}"
                        alt=""
                      />
                  </div>
                  <div class="card-content">
                    <h6 class="mb-2"><i class="lni lni-image me-1"></i>  Preview Images</h6>
                    <span class="mb-3 text-date"><i class="lni lni-folder"></i> {{ $siswa->foto }} &nbsp;  <i class="lni lni-timer"></i> {{ $siswa->created_at->diffForHumans() }}</span>
                  </div>
                </div>
                </div>

            <div class="col-xxl-8 bg-white p-xl-5 p-3 rounded-3">
                <div class="col-12">
                    <div class="input-style-2">
                        <label>Name</label>
                        <input type="text" name="nama" value="{{ $siswa->nama }}"
                            class="form-control mt-1- rounded-2 @error('nama') is-invalid @enderror" disabled/>
                        <span class="icon"> <i class="lni lni-user"></i> </span>
                        @error('nama')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="input-style-2">
                        <label>NISN</label>
                        <input type="text" name="nisn" value="{{  $siswa->nisn }}"
                            class="form-control mt-1- rounded-2 @error('nisn') is-invalid @enderror" disabled/>
                        <span class="icon"> <i class="lni lni-postcard"></i> </span>
                        @error('nisn')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="input-style-2">
                        <label>NIK</label>
                        <input type="text" name="nik" value="{{  $siswa->nik }}"
                            class="form-control mt-1- rounded-2 @error('nik') is-invalid @enderror" disabled/>
                        <span class="icon"> <i class="lni lni-license"></i> </span>
                        @error('nik')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    <div class="col-xxl-4">
                        <div class="input-style-2">
                            <label>Tempat</label>
                            <input type="text" name="tempat" value="{{  $siswa->tempat }}"
                                class="form-control mt-1- rounded-2 @error('tempat') is-invalid @enderror" disabled/>
                            <span class="icon"> <i class="lni lni-map-marker"></i> </span>
                        </div>
                        @error('tempat')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xxl-4">
                        <div class="input-style-2">
                            <label>Tanggal</label>
                            <input type="datetime-local" name="tanggallahir" value="{{  $siswa->tanggallahir }}"
                                class="form-control mt-1- rounded-2 @error('tanggallahir') is-invalid @enderror" disabled/>
                        </div>
                        @error('tanggallahir')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xxl-4">
                        <div class="select-style-1">
                            <label>Gender</label>
                            <div class="select-position">
                                <select class="light-bg @error('jeniskelamin') is-invalid @enderror"
                                    name="jeniskelamin" disabled> 
                                    <option value="{{  $siswa->jeniskelamin }}" >{{  $siswa->jeniskelamin }}</option>
                                </select>
                                @error('jeniskelamin')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xxl-6">
                    <div class="input-style-2">
                        <label>Username</label>
                        <input type="text"  name="userbelajarid"
                            value="{{ $siswa->userbelajarid }}"
                            class="form-control mt-1- rounded-2 @error('userbelajarid') is-invalid @enderror" disabled/>
                        <span class="icon"> <i class="lni lni-user"></i> </span>
                    </div>
                    @error('userbelajarid')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-xxl-6">
                    <div class="input-style-2">
                        <label>Password</label>
                        <input type="text"  name="passwordbelajarid"
                            value="{{ $siswa->passwordbelajarid }}"
                            class="form-control mt-1- rounded-2 @error('passwordbelajarid') is-invalid @enderror" disabled/>
                        <span class="icon"> <i class="lni lni-key"></i> </span>
                    </div>
                    @error('passwordbelajarid')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                </div>

                <div class="col-12">
                    <div class="input-style-1">
                        <label>Alamat</label>
                        <textarea name="alamat" rows="6"
                            class="form-control @error('alamat') is-invalid @enderror" disabled>{{ $siswa->alamat }}</textarea>
                    </div>
                    @error('alamat')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>




        </div>
    </div>


</div>
</div>


</div>

</div>


@endsection
