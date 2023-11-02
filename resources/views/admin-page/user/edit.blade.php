{{-- Modal View --}}
@extends('admin-page.index')

@section('content')

<div class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30 p-2">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2 class="mt-3">Edit User</h2>
                        <div class="d-flex gap-2">
                            <a href="{{ url('/admin-page/manage-user') }}" class="px-3 py-2 bg-whitee mt-3 rounded-2"><i class="lni lni-arrow-left"></i> Kembali ke
                                Manage Users</a>
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


        <form action="{{ route('manage-user.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')

            @if ($message = Session::get('success'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif

            <div class="modal-body">
                 <div class="d-block d-lg-flex gap-1 w-100">
                        <div class="w-100 w-lg-50">
                            <p class="">Nama</p>
                            <input type="text" name="name" value="{{ $user->name }}"
                                class="form-control mt-1- rounded-2 @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-100 w-lg-50">
                        <p class="">Email</p>
                            <input type="email" name="email" value="{{ $user->email }}"
                                class="form-control mt-1- rounded-2 @error('email') is-invalid @enderror">
                            @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                    </div>
                        {{-- <div class=" w-100 w-lg-50">
                            <p class="">Role</p>
                            <select name="role_id" id="" class="form-select @error('role_id') is-invalid @enderror">

                                @foreach ($role as $rl)

                                @if (old('role_id') == $rl->id)
                                <option value="{{ $rl->id }}" selected>{{ $rl->name }}</option>
                                @else
                                <option value="{{ $rl->id }}">{{ $rl->name }}</option>
                                @endif

                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div> --}}
                    </div>
                    <div class="w-100 mt-3">
                        <p class="">Password</p>
                            <input type="password" name="password"
                                class="form-control mt-1- rounded-2 @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="w-100 mt-3">
                        <p class="">Konfirmasi Password</p>
                            <input type="password" name="password2"
                                class="form-control mt-1- rounded-2 @error('password2') is-invalid @enderror">
                            @error('password2')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                    </div>
                <div class="d-flex justify-content-end align-items-end">
                    <button type="submit" class="btn btn-primary px-5 mt-3" data-bs-dismiss="modal">Edit</button>
                </div>
            </div>
                
           


        </form>
        {{-- Modal End View --}}
    </div>

</div>

@endsection
