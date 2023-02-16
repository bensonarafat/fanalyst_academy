<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, shrink-to-fit=9" />
        <title>{{ config('app.name') }} - Thank You</title>

        <link rel="icon" type="image/png" href="{{ asset('assets/images/fav.png') }}" />

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,500" rel="stylesheet" />
        <link href="{{ asset('assets/vendor/unicons-2.0.1/css/unicons.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/vertical-responsive-menu.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" />

        <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/semantic/semantic.min.css') }}" />
    </head>
    <body class="coming_soon_style">
        <div class="wrapper coming_soon_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cmtk_group">
                            <div class="ct-logo">
                                <a href="/"><img src="{{ asset('assets/images/logo.png') }}" alt="" /></a>
                            </div>
                            @if($status == 'success')
                            <div class="cmtk_dt">
                                <h1 class="thnk_coming_title">Thank You</h1>
                                <h4 class="thnk_title1">Your Order is Confirmed!</h4>
                            </div>
                            @else
                            <div class="cmtk_dt">
                                <h1 class="thnk_coming_title">Ooops, payment error</h1>
                                <h4 class="thnk_title1">There was an error, making payment for this course</h4>
                            </div>
                            @endif
                            <div class="tc_footer_main">
                                <div class="tc_footer_left">
                                    <ul>
                                        <li><a href="about_us.html">About</a></li>
                                        <li><a href="contact_us.html">Contact Us</a></li>
                                        <li><a href="terms_of_use.html">Privacy Policy</a></li>
                                        <li><a href="terms_of_use.html">Terms</a></li>
                                    </ul>
                                </div>
                                <div class="tc_footer_right">
                                    <p>© {{ date('Y') }} <strong>{{ config('app.name') }}</strong>. All Rights Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset('assets/vendor/OwlCarousel/owl.carousel.js') }}"></script>
        <script src="{{ asset('assets/vendor/semantic/semantic.min.css') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
    </body>

</html>


