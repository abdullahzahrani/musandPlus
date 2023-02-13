<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/login.css')}}" rel="stylesheet">
    {{--    <link href="assets/css/login.css" rel="stylesheet">--}}
    <!-- Styles -->
    {{--            <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    {{--            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">--}}
    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Scripts -->
    {{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
</head>

<body>

<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="text-danger"> {{ $error }} </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="d-flex justify-content-center py-4">
                            <a href="#" class="logo d-flex align-items-center w-auto"
                               style="text-decoration: none !important;">
                                <img src="{{asset('assets/img/logo.png')}}" alt="">
                                <span class="text-decoration-none d-lg-block">musandPlus</span>
                            </a>
                        </div><!-- End Logo -->
                        <h6 class="mb-0 pb-3"><span>Student </span><span>Admin</span></h6>
                        <!-- Start Student  -->
                        <!-- Start Toggle -->
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                        <label for="reg-log"></label>
                        <!-- End Toggle -->

                        <div class="card-3d-wrap mx-auto">
                            <div class="card card-3d-wrapper">


                                <div class="card-front">

                                    <div class="card-body">

                                        <div class="pt-4 pb-2 ">
                                            <h5 class="card-title text-center pb-0 fs-4">Login to Student Account</h5>
                                            <p class="text-center small">Enter your email & password to login</p>
                                        </div>
                                        <form class="row g-3 needs-validation" novalidate method="POST"
                                              action="{{ route('student.login') }}">
                                            @csrf
                                            <div class="col-12">
                                                <label for="studentemail" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <input type="email" name="email" class="form-control"
                                                           id="studentemail" required>
                                                    <div class="invalid-feedback">Please enter your email.</div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="studentpassword" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                       id="studentpassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit">Login</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>

                                <!-- End Student -->

                                <!-- Start Admin -->

                                <div class="card-back">
                                    <div class="card-body">

                                        <div class="pt-4 pb-2 ">
                                            <h5 class="card-title text-center pb-0 fs-4">Login to Admin Account</h5>
                                            <p class="text-center small">Enter your email & password to login</p>
                                        </div>

                                        <form method="POST" class="row g-3 needs-validation" novalidate
                                              action="{{ route('admin.login') }}">
                                            @csrf
                                            <div class="col-12">
                                                <label for="adminemail" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <input type="email" name="email" value="{{old('email')}}"
                                                           class="form-control" id="adminemail" required>
                                                    <div class="invalid-feedback">Please enter your email.</div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="adminpassword" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                       id="adminpassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit">Login</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>

                                <!-- End Admin -->
                            </div>
                        </div>
                        <!-- </div> -->


                        <div class="copyright">
                            &copy; Copyright <strong><span>MusandPlus</span></strong>. All Rights Reserved
                        </div>
                        <div class="credits">




                            Designed by <a href="#">CCIS</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
