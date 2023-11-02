@extends('admin-page.index')

@section('content')




<!-- Modal Tambah data -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf

                <div class="modal-body px-xl-5 px-4">


                 


                    <div class="row">


                        <div class="col-12">
                            <div class="select-style-1">
                                <label>Kategori</label>
                                <div class="select-position">
                                    <select class="light-bg @error('kategoriId') is-invalid @enderror"
                                        name="kategoriId">
                                        @foreach ($kategori as $ktgr)

                                        @if (old('kategoriId') == $ktgr->id)
                                        <option value="{{ $ktgr->id }}" selected>{{ $ktgr->nama }}</option>
                                        @else
                                        <option value="{{ $ktgr->id }}">{{ $ktgr->nama }}</option>
                                        @endif

                                        @endforeach
                                    </select>
                                    @error('kategoriId')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-style-2">
                                <label>Foto</label>
                                <input type="file" placeholder="Masukan Foto" name="foto" id="foto"
                                    onchange="previewFoto()"
                                    class="form-control mt-1- rounded-2" required/>
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
                                <label>Judul</label>
                                <input type="text" placeholder="Masukan Judul" name="title" value="{{ old('title') }}"
                                    class="form-control mt-1- rounded-2" required/>
                                {{-- <span class="icon"> <i class="lni lni-slice"></i></span> --}}
                                <div class="invalid-feedback">
                                    The Judul field is required.
                            </div> 
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-style-1">
                                <label>Isi</label>
                                <textarea placeholder="Type here" id="editor" value="" name="body" rows="6"
                                    class="form-control " required>{{ old('body') }}</textarea>
                                      <div class="invalid-feedback">
                                    The Body field is required.
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


<!-- ========== section start ========== -->
<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30 p-2">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2 class="mt-3">Berita</h2>
                        <div class="d-flex gap-2">
                            <a href="{{ url('/admin-page/berita/create') }}" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" class="px-3 py-2 bg-whitee mt-3 rounded-2 animate "><i
                                    class="lni lni-plus"></i> Tambah
                                Berita</a>
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
        <!-- ========== title-wrapper end ========== -->
        <div class="row">
            <div class="col-12 p-4 overflow-auto">
                <table id="example" class="table table-bordered table-light nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Foto</th>
                            <th>Waktu</th>
                            <th>Kategori</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($berita as $brt)

                        <tr>
                            <td>{{ Str::limit($brt->title, 25) }}</td>
                            <td><img src="{{ asset('storage/'.$brt->foto) }}" alt="{{ $brt->foto }}" width="50px"
                                    class="rounded-3 border border-dark" /></td>

                            @php
                            $date = new DateTime($brt->published_at);
                            @endphp

                            <td>{{ $date->format('D, d M Y | H:i:s') }}</td>
                            <td>{{ $brt->kategori->nama }}</td>
                            <td>
                                <form action="{{ route('beritas.destroy',$brt->id) }}" method="POST">

                                    <a href="{{ url('/admin-page/berita/show',$brt->slug) }}"
                                        class="px-3 py-1 bg-whitee btn-action rounded-3 text-black"><i
                                            class="lni lni-keyword-research"></i> View</a>
                                    <button class=" px-3 py-1 bg-whitee btn-action rounded-3 " type="button"
                                        id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="lni lni-more-alt"></i>
                                    </button>
                                    <ul class="dropdown-menu delete-menu dropdown-menu-end p-2"
                                        aria-labelledby="profile">
                                        <li>
                                            <a href="{{ url('/admin-page/berita/edit',$brt->slug) }}"
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
    // This sample still does not showcase all CKEditor 5 features (!)
    // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage',
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },

        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: '',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [{
                name: /.*/,
                attributes: true,
                classes: true,
                styles: true
            }]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [{
                marker: '@',
                feed: [
                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                    '@chocolate', '@cookie', '@cotton', '@cream',
                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                    '@gummi', '@ice', '@jelly-o',
                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                    '@sesame', '@snaps', '@soufflé',
                    '@sugar', '@sweet', '@topping', '@wafer'
                ],
                minimumCharacters: 1
            }]
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType
            'MathType'
        ]
    });

</script>




<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function () {
        fetch('/admin-page/berita/createSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)

    });





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
    // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
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
