@extends('layouts.main')
@section('title', "Privacy Policy")
@section('description', 'Privacy Policy')
@section('url', config('app.url') .'/privacy_policy' )
@section('image', asset('assets/images/logo.png') )
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
                                            <li class="breadcrumb-item active" aria-current="page">Copyright and Trademark Policy</li>
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
                            <div class="atlink">These Policy of Use <strong>("Privacy Policy")</strong> were last updated on Feb 16th, 2023.</div>
                            <p>
                                At Fanalyst Academy, we take the privacy of our students and clients very seriously. We understand
                                that the personal information you provide to us is valuable, and we are committed to protecting it in
                                accordance with applicable privacy laws. This Privacy Policy outlines our practices and policies
                                regarding the collection, use, and disclosure of personal information that we receive through our
                                services. By accessing or using our services, you agree to the terms of this Privacy Policy.
                            </p>
                        </div>

                        <div class="vew120 mt-35 mb-30">

                            <ol class="ntt125 mtl145">
                                <li>
                                    Collection of personal information
                                    We collect personal information from our students and clients for the purpose of providing
                                    our tuition services, including course registration, payment processing, and other related
                                    activities. This information may include, but is not limited to, your name, email address,
                                    postal address, and payment information.
                                </li>
                                <li>
                                    Use of Personal Information:
                                    We use the personal information we collect from you for the purposes for which it was
                                    collected, such as to provide you with our tuition services, to process your payments, to
                                    communicate with you about your account and course offerings, and for other related
                                    purposes.
                                </li>
                                <li>
                                    Sharing of Information:
                                    We may share your information with third parties in the following circumstances:
                                    a. With your consent: We may share your information with third parties when you have
                                    provided us with your consent to do so.
                                    b. For legal purposes: We may disclose your information if we believe it is required by law, to
                                    enforce our policies, or to protect our rights or the rights of others.
                                    c. With service providers: We may share your information with service providers who assist
                                    us in providing our services, such as payment processors or hosting providers.
                                </li>
                                <li>
                                    Data Retention:
                                    We will retain your information for as long as necessary to fulfill the purposes for which it
                                    was collected, as described in this Privacy Policy, or as required by law.
                                </li>
                                <li>
                                    Security of personal information
                                    We take reasonable measures to protect the security of your information, including the use of
                                    encryption and other security technologies. However, no system can be completely secure,
                                    and we cannot guarantee the security of your information.

                                </li>
                                <li>
                                    Changes to Privacy Policy
                                    We may update this Privacy Policy from time to time to reflect changes in our practices and
                                    services. Any changes to this Privacy Policy will be posted on this page, and we will take
                                    reasonable steps to notify you of any material changes.
                                </li>
                                <li>
                                    Contact Us
                                    If you have any questions or concerns about this Privacy Policy, or if you would like to access
                                    or correct your personal information, please contact us at <a href="mailto:support@fanalystacademy.org">support@fanalystacademy.org.</a>
                                </li>
                            </ol>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        @include('components.footer')
    </div>
@endsection

