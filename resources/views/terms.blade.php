@extends('layouts.main')
@section('title', "Terms")
@section('description', 'Terms of Use')
@section('url', config('app.url') .'/terms' )
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
                                            <li class="breadcrumb-item active" aria-current="page">Terms</li>
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
                                {{-- <li><a href="{s{ route('instructor.agreement') }}" class="tt_item">Instructor Agreement</a></li> --}}
                                <li><a href="{{ route('cookie') }}" class="tt_item">Cookie Policy</a></li>
                                <li><a href="{{ route('terms') }}" class="tt_item">Terms of use</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7">
                        <div class="vew120 frc123">
                            <div class="atlink">These Policy of Use <strong>("Terms of Use")</strong> were last updated on Feb 16th, 2023.</div>
                            <p>
                                These terms of use (the &quot;Terms&quot;) govern your use of our platform, so please read them carefully. By
                                accessing or using our platform, you agree to be bound by these Terms. If you do not agree to these
                                Terms, please do not use our platform.
                            </p>
                        </div>

                        <div class="vew120 mt-35 mb-30">

                            <ol class="ntt125 mtl145">
                                <li>
                                    Description of Services
Fanalyst Academy provides online education and training services, including but not limited
to tuition for finance certification exams, financial modeling, personal finance, and corporate
finance tuition.
                                </li>
                                <li>
                                    Eligibility
Our platform is available only to individuals who are at least 18 years old and capable of
forming a legally binding contract. By using our platform, you represent and warrant that you
meet these eligibility requirements.
                                </li>
                                <li>
                                    Use of Services
You may use our services only for lawful purposes and in accordance with these Terms. You
agree not to use our services:
a. In any manner that could damage, disable, overburden, or impair our services;
b. To interfere with any other party&#39;s use and enjoyment of our services; or
c. For any illegal or unauthorized purpose.
                                </li>
                                <li>
                                    Account Registration
                                    In order to access certain features of our platform, you will need to register for an account.
                                    You agree to provide accurate and complete information when creating your account and to
                                    promptly update your information if it changes. You are solely responsible for the security of
                                    your account and all activity that occurs under your account. If you suspect any unauthorized
                                    use of your account, please contact us immediately.
                                </li>
                                <li>
                                    User Content
                                    You may be able to submit, upload, publish, or otherwise make available content through our
                                    services, including but not limited to questions, comments, and reviews. You retain all rights
                                    in the content you make available through our services and are solely responsible for the
                                    legality, reliability, accuracy, and appropriateness of such content.

                                </li>
                                <li>
                                    Fees and Payments
                                    You agree to pay all fees and charges associated with your use of our platform, including
                                    tuition for the financial certification exams you choose to prepare for. All fees are non-
                                    refundable and payable in advance. We may change the fees and charges associated with our
                                    platform at any time, and will provide you with notice of any such changes.
                                </li>
                                <li>
                                    Money Back guarantee
                                    Our ACCA, ICAN, CFA, and FRM tuition includes a 100% money-back guarantee if you
                                    attend at least 95% of the live class and complete all assignments but fail the exam.
                                </li>
                                <li>
                                    Qualification for joining the live class
                                    To be eligible for the live class, it is necessary to complete the weekly readings, video
                                    lectures, and assignments that are available on the learning platform.
                                </li>
                                <li>
                                    Intellectual Property
                                    The content and materials available through our services, including but not limited to text,
                                    graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and
                                    software, are the property of Fanalyst Academy or its licensors and are protected by
                                    copyright, trademark, and other intellectual property laws. You may not modify, copy,
                                    distribute, transmit, display, perform, reproduce, publish, license, create derivative works
                                    from, transfer, or sell any information, software, products, or services obtained from our
                                    services.
                                </li>
                                <li>
                                    Disclaimer of Warranties
                                    Our platform is provided &quot;as is&quot; and &quot;as available.&quot; We do not guarantee the accuracy,
                                    completeness, or timeliness of the information on our platform, and we make no

                                    representations or warranties of any kind, express or implied, about the completeness,
                                    accuracy, reliability, suitability or availability with respect to the platform or the information,
                                    products, services, or related graphics contained on the platform for any purpose.
                                </li>

                                <li>
                                    Limitation of Liability
                                    In no event will we be liable for any loss or damage, including without limitation, indirect or
                                    consequential loss or damage, arising from the use of our platform.
                                </li>

                                <li>
                                    Indemnification
You agree to indemnify and hold Fanalyst Academy, its affiliates, and their respective
officers, agents, partners, and employees, harmless from any claims, losses, damages,
liabilities, including attorney&#39;s fees, arising out of your use of our platform or violation of
these Terms.
                                </li>


                                <li>
                                    Termination
                                    We reserve the right, in our sole discretion, to terminate or suspend your access to all or part
                                    of our services, with or without notice and with or without cause, at any time.
                                </li>

                                <li>
                                    Changes to the Terms
                                    We may modify these Terms at any time, and any such changes will be effective immediately
                                    upon posting. Your continued use of our platform constitutes your acceptance of the modified
                                    Terms.
                                </li>

                                <li>
                                    Governing Law
These Terms are governed by and construed in accordance with the laws of the jurisdiction in
which Fanalyst Academy is located, without giving effect to any principles of conflicts of
law.
                                </li>

                                <li>
                                    Dispute Resolution
                                    Any dispute arising out of or relating to these Terms will be resolved through binding
                                    arbitration in accordance with the commercial arbitration rules of the jurisdiction in which
                                    Fanalyst Academy is located.
                                </li>

                                <li>
                                    Entire Agreement
                                    These Terms constitute the entire agreement between you and Fanalyst Academy and
                                    supersede all prior understandings or agreements.
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

