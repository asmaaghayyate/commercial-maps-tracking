<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title> Admin - Login</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/x-icon" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!--  Right-sidemenu css -->
    <link href="{{ asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

    <!--  Custom Scroll bar-->
    <link href="{{ asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

    <!--  Left-Sidebar css -->
    <link rel="stylesheet" href="{{ asset('assets/css/sidemenu.css') }}">

    <!--- Style css --->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!--- Dark-mode css --->
    <link href="{{ asset('assets/css/style-dark.css') }}" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- Animations css-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">

</head>

<body class="main-body bg-light">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('assets/img/loader.svg') }} " class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">

        <div class="container-fluid">
            <div class="row no-gutter">
                <!-- The image half -->
                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary">
                    <div class="row wd-100p mx-auto text-center">
                        <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                            <img src="{{ asset('assets/img/gestion-personnel_gif.gif') }} " class=""
                                alt="logo">
                        </div>
                    </div>
                </div>
                <!-- The content half -->
                <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                    <div class="login d-flex align-items-center py-2">
                        <!-- Demo content-->
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                    <div class="card-sigin">
                                        <div class="card-sigin">
                                            <div class="main-signup-header">
                                                <h2>Reset Password!</h2>
                                                <form action="{{ route('reset.password.post') }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="token" value="{{ $token }}">
                                                    <div class="form-group">
                                                        <label style="color: black">Email</label> <input
                                                            class="form-control" value="{{ old('email') }}"
                                                            style="border: 1px solid black ; border-bottom-right-radius: 20px;border-top-right-radius: 20px"
                                                            name="email" placeholder="Enter your email"
                                                            type="email">
                                                        @error('email')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="color: black">Password</label>
                                                        <div class="input-group">
                                                            <input style="border: 1px solid black" class="form-control"
                                                                name="password" placeholder="Enter your password"
                                                                type="password" id="passwordField">
                                                            <div class="input-group-append">
                                                                <button
                                                                    style="border: 1px solid black; border-bottom-right-radius: 20px; border-top-right-radius: 20px"
                                                                    class="btn btn-outline-secondary" type="button"
                                                                    onclick="togglePasswordVisibility('passwordField', 'togglePasswordIcon')">
                                                                    <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        @error('password')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="color: black">Password confirmation</label>
                                                        <div class="input-group">
                                                            <input style="border: 1px solid black" class="form-control"
                                                                name="password_confirmation"
                                                                placeholder="Enter your password" type="password"
                                                                id="passwordConfirmationField">
                                                            <div class="input-group-append">
                                                                <button
                                                                    style="border: 1px solid black; border-bottom-right-radius: 20px; border-top-right-radius: 20px"
                                                                    class="btn btn-outline-secondary" type="button"
                                                                    onclick="togglePasswordVisibility('passwordConfirmationField', 'togglePasswordIconConfirmation')">
                                                                    <i class="fas fa-eye"
                                                                        id="togglePasswordIconConfirmation"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        @error('password_confirmation')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <br><br>
                                                        <button class="btn btn-main-primary btn-block">Sign In</button>
                                                    </div>
                                                    <script>
                                                        function togglePasswordVisibility(passwordFieldId, toggleIconId) {
                                                            var passwordField = document.getElementById(passwordFieldId);
                                                            var toggleIcon = document.getElementById(toggleIconId);

                                                            if (passwordField.type === "password") {
                                                                passwordField.type = "text";
                                                                toggleIcon.classList.remove("fa-eye");
                                                                toggleIcon.classList.add("fa-eye-slash");
                                                            } else {
                                                                passwordField.type = "password";
                                                                toggleIcon.classList.remove("fa-eye-slash");
                                                                toggleIcon.classList.add("fa-eye");
                                                            }
                                                        }
                                                    </script>

                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End -->
                    </div>
                </div><!-- End -->
            </div>
        </div>

    </div>
    <!-- End Page -->

    <!-- JQuery min js -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Bundle js -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Ionicons js -->
    <script src="{{ asset('assets/plugins/ionicons/ionicons.js') }}"></script>

    <!-- Moment js -->
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>

    <!-- eva-icons js -->
    <script src="{{ asset('assets/js/eva-icons.min.js') }}"></script>

    <!-- Rating js-->
    <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>
    <script src="{{ asset('assets/plugins/rating/jquery.barrating.js') }}"></script>

    <!-- custom js -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
