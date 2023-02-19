@extends('layouts.main')
@section('title', "Cookie Policy")
@section('content')
    <div class="wrapper _bg4586 _new89">
        <div class="_215b15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title125">
                            <div class="titleleft">
                                <div class="ttl121">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Cookie Policy</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="title126">
                            <h2>@yield('title')</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="faq1256">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="fcrse_3 frc123">
                            <ul class="ttrm15">
                                <li><a href="{{ route('privacy_policy') }}" class="tt_item active">Privacy Policy</a></li>
                                {{-- <li><a href="{{ route('instructor.agreement') }}" class="tt_item">Instructor Agreement</a></li> --}}
                                <li><a href="{{ route('cookie') }}" class="tt_item">Cookie Policy</a></li>
                                <li><a href="{{ route('terms') }}" class="tt_item">Terms of use</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7">
                        <div class="vew120 frc123">
                            <div class="atlink">These Policy of Use <strong>("Cookie Policy")</strong> were last updated on Feb 16th, 2023.</div>
                            <h4>Instructor Responsibilities</h4>
                            <p class="mt-4">
                                Fanalyst Academy values the privacy of our website visitors and is committed to being transparent
                                about the use of cookies on our site. This cookie policy sets out how we use cookies and similar
                                technologies on our website.
                            </p>

                        </div>

                        <div class="vew120 mt-35 mb-30">
                            <h4>What are Cookies?</h4>
                            <p class="mt-4">
                                Cookies are small text files that are stored on your device when you visit a website. Cookies are used
                                by websites to remember your preferences, improve your user experience, and track your browsing
                                activity. There are different types of cookies, including session cookies and persistent cookies, and
                                they can be set by the website you&#39;re visiting or by third-party services.
                            </p>
                            <h4>Why does Fanalyst Academy use Cookies?</h4>
                            <p>Fanalyst Academy uses cookies for several reasons, including:</p>
                            <ol class="ntt125 mtl145">
                                <li>
                                    To remember your preferences, such as language and location, so that you don&#39;t have to enter
                                    this information each time you visit our site
                                </li>
                                <li>
                                    To improve the performance of our site and provide a better user experience
                                </li>
                                <li>
                                    To understand how visitors use our site and to analyze and improve our site&#39;s functionality
                                </li>
                                <li>
                                    To display personalized content, such as recommended courses or special offers
                                </li>
                            </ol>
                            <p class="mt-4">What Types of Cookies Does Fanalyst Academy Use?</p>
                            <p>Fanalyst Academy uses the following types of cookies on our site:</p>
                            <ol class="ntt125 mtl145">
                                <li>
                                    Essential Cookies: These cookies are necessary for the basic functionality of our site, such as
                                    remembering your session ID, and enabling you to access secure areas of our site.
                                </li>
                                <li>
                                    Performance Cookies: These cookies collect information about how visitors use our site, such
                                    as the pages they visit most often and if they receive error messages from web pages. These
                                    cookies do not collect personal information that can be used to identify an individual visitor.
                                </li>
                                <li>
                                    Functionality Cookies: These cookies allow us to remember your preferences, such as
                                    language and location, so that you don&#39;t have to enter this information each time you visit our
                                    site.
                                </li>
                                <li>
                                    Advertising Cookies: These cookies are used to display personalized content and advertising
                                    to our visitors, such as recommended courses or special offers.
                                </li>
                            </ol>
                        </div>

                        <div class="vew120 mt-35 mb-30">
                            <h4>How to Control and Delete Cookies</h4>
                            <p class="mt-4">
                                You can control and delete cookies through your browser settings. The process for doing this varies
                                from browser to browser, so please refer to your browser&#39;s help documentation for specific
                                instructions. Please note that disabling cookies may impact the functionality of our site and limit your
                                user experience.
                            </p>
                            <h4>Changes to our Cookie Policy</h4>
                            <p class="mt-4">
                                We may update our cookie policy from time to time to reflect changes to our use of cookies or to
                                comply with legal requirements. We will notify you of any material changes to our cookie policy by
                                posting the updated policy on our site.
                            </p>

                            <h4>Contact Us</h4>
                            <p class="mt-4">
                                If you have any questions about our cookie policy, please don&#39;t hesitate to contact us at
                                <a href="mailto=support@fanalystacademy.org"> support@fanalystacademy.org</a>
                            </p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.footer')
    </div>
@endsection

