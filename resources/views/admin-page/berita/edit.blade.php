{{-- Modal View --}}
@extends('admin-page.index')

@section('content')

<div class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30 p-2">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2 class="mt-3">Edit Berita</h2>
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


        <form action="{{ route('berita.update',$berita->id) }}" method="POST" enctype="multipart/form-data"> @csrf
            @method('PUT') <div class="modal-body p-4">


            <div class="row">
                <div class="col-xxl-4 pe-xl-4 p-0 mb-5">
                    <div class="col-12 p-0 rounded-3">

                        <div class="card-style-2">
                            <div class="card-image">
                                <input type="hidden" name="oldImage" value="{{ $berita->foto }}">
                                <img src="{{ asset('storage/'.$berita->foto) }}" value="{{ $berita->foto }}" />
                            </div>
                            <div class="card-content">
                                <h6 class="mb-2"> <i class="lni lni-image me-1"></i> Default Image</h6>
                                <span class="mb-3 text-date"><i class="lni lni-folder"></i> {{ $berita->foto }} &nbsp;<i
                                        class="lni lni-timer"></i>
                                    {{ $berita->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="col-12 p-0 rounded-3">
                        <div class="card-style-2">
                            <div class="card-image">
                                <img class="img-preview" />
                            </div>
                            <div class="card-content">
                                <h6 class="mb-2"><i class="lni lni-image me-1"></i> New Image</h6>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-xxl-8 bg-white p-xl-5 p-3 rounded-3 h-100">
                    <div class="col-12">
                        <div class="select-style-1">
                            <label>Kategori</label>
                            <div class="select-position">
                                <select class="light-bg @error('kategoriId') is-invalid @enderror" name="kategoriId">
                                    @foreach ($kategori as $ktgr)

                                    @if (old('kategoriId', $berita->kategoriId) == $ktgr->id)
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
                                    class="form-control mt-1- rounded-2 @error('foto') is-invalid @enderror" />
                                <span class="icon"> <i class="lni lni-image"></i></span>
                                @error('foto')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                    <div class="col-12">
                        <div class="input-style-2">
                            <label>Judul</label>
                            <input type="text" name="title" value="{{ $berita->title }}"
                                class="form-control mt-1- rounded-2 @error('title') is-invalid @enderror" required/>
                            <span class="icon"> <i class="lni lni-slice"></i> </span>
                            @error('title')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-2">
                            <label>Slug</label>
                            <input type="text" name="slug" value="{{ $berita->slug }}"
                                class="form-control mt-1- rounded-2 @error('slug') is-invalid @enderror" disabled/>
                            <span class="icon"> <i class="lni lni-slice"></i> </span>
                            @error('slug')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="input-style-1">
                            <label>Isi</label>
                            <textarea placeholder="Type here" id="editor" value="" name="body" rows="6"
                                class="form-control @error('body') is-invalid @enderror">{{ $berita->body }}</textarea>
                        </div>
                        @error('body')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="d-flex justify-content-end align-items-end">
                    <button type="submit" class="btn btn-primary px-5 mt-3" data-bs-dismiss="modal">Edit</button>
                </div>



                </div>






              

            </div>



    </div>

</div>





</form>
{{-- Modal End View --}}
</div>

</div>

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

@endsection
