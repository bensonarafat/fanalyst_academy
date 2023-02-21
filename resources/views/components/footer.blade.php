<footer class="footer mt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="item_f1">
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('contact') }}">Contact</a>
                    <a href="{{ route('course.section') }}">Courses</a>
                    <a href="{{ route('privacy_policy') }}">Privacy Policy</a>
                    <a href="{{ route('cookie') }}">Cookie Policy</a>
                    <a href="{{ route('terms') }}">Terms of use</a>
                    <a href="{{ route('faq') }}">Q&A</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="footer_bottm">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="fotb_left">
                                <li>
                                    <a href="index.html">
                                        <div class="footer_logo">
                                            <img src="{{ asset('assets/images/logo.png') }}" alt="" />
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <p>© {{ date('Y') }} <strong>{{ config('app.name') }}</strong>. All Rights Reserved.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="edu_social_links">
                                <a href="https://www.facebook.com/profile.php?id=100089973412155&mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://twitter.com/FanalystAcademy?t=JsmagNpS81tamFyVL0IYvA&s=08"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/company/fanalyst-academy/"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://instagram.com/fanalystacademy?igshid=YmMyMTA2M2Y="><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
