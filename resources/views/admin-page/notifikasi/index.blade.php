@extends('admin-page.index')

@section('content')

<!-- ========== section start ========== -->
<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>Pesan</h2>
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
                                    Pesan
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->
        <div class="row p-3">
            <div class="card-style">


               @if ($contact->count() != 0)

              @foreach ($contact as $notif)
            <div class="single-notification">
              <div class="notification">
                <div class="image success-bg">
                  <span>P</span>
                </div>
                <a href="#0" class="content">
                  <h6>{{ $notif->subject }}</h6>
                  <p class="text-sm text-gray">
                    {{ $notif->pesan }}
                  </p>
                  <span class="text-sm  text-gray"> <i class="lni lni-envelope"></i> &nbsp; {{ $notif->email}} &nbsp;  &nbsp;    <i class="lni lni-user"></i> &nbsp; {{ $notif->nama}} &nbsp;&nbsp;  <i class="lni lni-timer"></i> &nbsp; {{ $notif->created_at->diffForHumans() }}</span>
                </a>
              </div>
              <div class="action">
                <form action="{{ route('contact.destroy', $notif->id) }}" method="POST">

                  @csrf
                  @method('DELETE')
                <button class="delete-btn" onclick="return confirm('Yakin Menghapus Data ini?')">
                  <i class="lni lni-trash-can"></i>
                </button>
                </form>
              </div>
            </div>
              @endforeach

              @else
            <h4 class="text-center">Data tidak Ditemukan.</h4>
            @endif



          </div>
          
        </div>

        <div class="ms-1">
						{!! $contact->links() !!}
					</div>
        <!-- End Row -->
    </div>
    <!-- end container -->
</section>
<!-- ========== section end ========== -->

@endsection