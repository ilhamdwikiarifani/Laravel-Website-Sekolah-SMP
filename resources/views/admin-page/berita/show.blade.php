{{-- Modal View --}}
@extends('admin-page.index')

@section('content')

<div class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30 p-2">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2 class="mt-3">View Berita</h2>
                        <div class="d-flex gap-2">
                            <a href="{{ url('/admin-page/berita') }}" class="px-3 py-2 bg-whitee mt-3 rounded-2"><i
                                    class="lni lni-arrow-left"></i> Kembali ke
                                Berita</a>
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
                                    View Berita
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
                        src="{{ asset('storage/'.$berita->foto) }}"
                        alt=""
                      />
                  </div>
                  <div class="card-content">
                    <h6 class="mb-2"><i class="lni lni-image me-1"></i>  Preview Images</h6>
                    <span class="mb-3 text-date"><i class="lni lni-folder"></i> {{ $berita->foto }} &nbsp;  <i class="lni lni-timer"></i> {{ $berita->created_at->diffForHumans() }}</span>
                  </div>
                </div>
                </div>


                 <div class="col-xxl-8 bg-white p-xl-5 p-3 rounded-3">

                    <div class="col-12">
                            <div class="input-style-2">
                                <label>Kategori</label>
                                <input type="text"  name="kategoriId" value="{{ $berita->kategori->nama }}"
                                    class="form-control mt-1- rounded-2 @error('kategoriId') is-invalid @enderror" disabled/>
                                <span class="icon"> <i class="lni lni-tag"></i> </span>
                                @error('kategoriId')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                     <div class="col-12">
                            <div class="input-style-2">
                                <label>Judul</label>
                                <input type="text"  name="title" value="{{ $berita->title }}"
                                    class="form-control mt-1- rounded-2 @error('title') is-invalid @enderror" disabled/>
                                <span class="icon"> <i class="lni lni-slice"></i> </span>
                                @error('title')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-style-2">
                                <label>Slug</label>
                                <input type="text"  name="slug" value="{{ $berita->slug }}"
                                    class="form-control mt-1- rounded-2 @error('slug') is-invalid @enderror" disabled/>
                                <span class="icon"> <i class="lni lni-slice"></i> </span>
                                @error('slug')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        
                     <div class="col-12">
                            <div class="input-style-2">
                                <label>Waktu</label>
                                <input type="datetime-local"  name="published_at" value="{{ $berita->published_at }}"
                                    class="form-control mt-1- rounded-2 @error('published_at') is-invalid @enderror" disabled/>
                                @error('published_at')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="col-12">
                            <div class="input-style-1">
                                <label>Isi</label>
                                

                                <div class="p-4 bg-textarea rounded-3">{!! $berita->body !!}</div>
                                {{-- <textarea placeholder="Type here" id="editor" value="" name="body" rows="6"
                                    class="form-control @error('body') is-invalid @enderror" disabled>{!! $berita->body !!}</textarea> --}}
                            </div>
                            @error('body')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                 </div>




            </div>

            </div>
            

    </div>

</div>


<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
            
        });

</script>




    @endsection
