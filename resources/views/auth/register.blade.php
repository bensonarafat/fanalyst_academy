<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, shrink-to-fit=9" />
        <meta name="author" content="Obi Nnaekeka" />
        <!-- Primary Meta Tags -->
        <title>Login</title>
        <meta name="title" content="Register">
        <meta name="description" content="Register Fanalyst">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ config('app.url') . '/register' }}">
        <meta property="og:title" content="Register">
        <meta property="og:description" content="Register Fanalyst">
        <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ config('app.url') . '/register' }}">
        <meta property="twitter:title" content="Register">
        <meta property="twitter:description" content="Register Fanalyst">
        <meta property="twitter:image" content="{{ asset('assets/images/logo.png') }}">

        <link rel="icon" type="image/png" href="{{ asset("assets/images/fav.png") }}" />

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,500" rel="stylesheet" />
        <link href="{{ asset("assets/vendor/unicons-2.0.1/css/unicons.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/css/vertical-responsive-menu.min.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/css/responsive.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/css/night-mode.css") }}" rel="stylesheet" />

        <link href="{{ asset("assets/vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/vendor/OwlCarousel/assets/owl.carousel.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/vendor/OwlCarousel/assets/owl.theme.default.min.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset("assets/vendor/semantic/semantic.min.css") }}" />
    </head>
<body>

    <div class="sign_in_up_bg">
        <div class="container">
            <div class="row justify-content-lg-center justify-content-md-center">
                <div class="col-lg-12">
                    <div class="main_logo25" id="logo">
                        <a href="/"><img src="{{ asset("assets/images/logo.png") }}" style="width:100px;" alt="" /></a>
                        <a href="/"><img class="logo-inverse" style="width:100px;" src="{{ asset("assets/images/logo.png") }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="sign_form">
                        <h2>Welcome to {{ config("app.name") }}</h2>
                        <p>Sign Up and Start Learning!</p>

                        @include('components.alert')
                        <form action="{{ route("register") }}" method="POSt">
                            @csrf
                            <div class="ui search focus">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="text" name="fullname" value="" id="id_fullname" required="" maxlength="64" placeholder="Full Name" />
                                </div>
                            </div>
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="email" name="email" value="" id="id_email" required="" maxlength="64" placeholder="Email Address" />
                                </div>
                            </div>
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="password" name="password" value="" id="id_password" required="" maxlength="64" placeholder="Password" />
                                </div>
                            </div>
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="password" name="password_confirmation" value="" id="id_password" required="" maxlength="64" placeholder="Confirm Password" />
                                </div>
                            </div>
                            <button class="login-btn" type="submit">Register</button>
                        </form>
                        <p class="sgntrm145">By signing up, you agree to our <a href="terms_of_use.html">Terms of Use</a> and <a href="terms_of_use.html">Privacy Policy</a>.</p>
                        <p class="mb-0 mt-30">Already have an account? <a href="{{ route("login") }}">Log In</a></p>
                    </div>
                    <div class="sign_footer"><img src="{{ asset("assets/images/logo1.png") }}" alt="" />© {{ date("Y") }} <strong>{{ config("app.name") }}</strong>. All Rights Reserved.</div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/OwlCarousel/owl.carousel.js") }}"></script>
    <script src="{{ asset("assets/vendor/semantic/semantic.min.js") }}"></script>
    <script src="{{ asset("assets/js/custom.js") }}"></script>
    <script src="{{ asset("assets/js/night-mode.js") }}"></script>
</body>

</html>
