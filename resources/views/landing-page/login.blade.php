<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="{{ asset('landingpage/images/icon.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('landingpage/fonts/icomoon/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('landingpage/fonts/flaticon/font/flaticon.css') }}" />

    <link rel="stylesheet" href="{{ asset('landingpage/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('landingpage/css/new-style.css') }}" />
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet" />

    <title>LOGIN | SMP PGRI REJOTANGAN</title>
</head>

<body class="overflow-hidden">

    <div class="row vh-100">

        <div class="d-none position-relative d-lg-flex justify-content-start align-items-center col-7 login-img">
            <div class="position-absolute top-0 d-flex align-items-center gap-3 mt-5 ms-login">
                <a href="{{ url('/') }}"><img src="{{ asset('landingpage//images/Logo.png') }}" alt="Image"></a>
                </div>
            <div class="d-block pb-login">
                <div class=" w-75 ms-login">
                    <h2 class="text-white text-tebal">" Bersama Kami, Menciptakan Lulusan yang Terbaik. "</h2>
                </div>
                <div class="ms-login mt-3">
                    <p class=" text-white"> - smppgrirejotangan</p>
                </div>
            </div>
            {{-- <div class="position-absolute bottom-0 d-flex align-items-center gap-3 mb-5 ms-5">
                <p class="mb-0 text-white">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. - SMP PGRI REJOTANGAN
					</p>
                </div> --}}
        </div>
        <div class="col-12 col-lg-5 d-flex justify-content-center align-items-center">
            <div class="">

                <div class="d-flex justify-content-center align-items-center p-4 login-box ">

                    <form action="" method="POST">
                        <div class="mb-5">
                            <h1 class="text-tebal">Log in</h1>
                            <h6>Welcome back ! Please enter your details.</h6>
                        </div>
                        @if(Session::has('status'))

                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        @csrf
                        <div class="mb-4">
                            <p class="-mb-text text-tebal">Email address</p>
                            <input class="form-control login-border border rounded-3 border-secondary"
                                placeholder="Enter your email" type="email" name="email" id="email" required />
                        </div>
                        <div class="mb-5">
                            <p class="-mb-text text-tebal">Password</p>
                            <input class="form-control login-border border rounded-3 border-secondary"
                                placeholder="Password" type="password" name="password" id="password" required />
                        </div>
                        <div>
                            <button class="form-control bg-dark text-white rounded-3" type="submit">
                                Masuk
                            </button>

                            {{-- <p class="mt-4">Not a member? <span><a href="#">Sign Up</a></span></p> --}}
                        </div>
                    </form>


                </div>
            </div>

        </div>


        <script src="{{
                asset('landingpage/js/bootstrap.bundle.min.js')
            }}"></script>
</body>

</html>
