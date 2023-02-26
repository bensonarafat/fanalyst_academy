@extends('layouts.main')
@section('title', "About")
@section('content')
@section('description', 'About Us')
@section('url', config('app.url') . '/about' )
@section('image', asset('assets/images/logo.png') )

@section('image', asset('assets/images/logo.png') )
    <div class="wrapper _bg4586 _new89">

        <div class="_215zd5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="title478">
                            <h2>About Us</h2>
                            <img class="line-title" src="{{ asset('assets/images/line.svg') }}" alt="" />
                            <p>
                                Fanalyst Academy is a dynamic and innovative provider of finance education and training. With a
                                passion for empowering individuals and organizations to reach their full financial potential, we offer a
                                range of tuition services and resources to help our students achieve their career and financial goals.
                                <br/>

                                Our online platform offers a flexible and convenient way to learn, with a variety of finance
                                certification exams, including ACCA, CFA, ICAN, and FRM, as well as courses in personal finance,
                                and corporate finance. Our experienced instructors and engaging curriculum ensure that students
                                receive a high-quality education that is both comprehensive and accessible.

                                <br/>

                                But we don&#39;t stop there. Fanalyst Academy also provides extra live class sessions, giving students the
                                opportunity to interact with their instructors and peers in real-time. This blended approach to learning
                                provides the best of both worlds – the flexibility and convenience of online learning, combined with
                                the engagement and support of in-person instruction.

                                <br/>
                                At Fanalyst Academy, we are committed to helping our students succeed. With our expert team,
                                cutting-edge technology, and engaging curriculum, we provide the tools and support needed to
                                achieve financial literacy and success. Join us today and take your financial future to the next level.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="story125">
                            <img src="{{ asset('assets/images/banner/about.jpg') }}" alt="" style="width:95%"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="_215td5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title589 text-center">
                            <h2><strong>On {{ config('app.name') }},</strong> you have access to</h2>
                            <img class="line-title" src="{{ asset("assets/images/line.svg") }}" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature125">
                            <img src="{{ asset('assets/images/icons/1.png') }}" style="width:100px;"  alt="">
                            <h4>Quality contents</h4>
                            <p>
                                Our high-quality and up-to-date course materials are designed to enhance our students success.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature125">
                            <img src="{{ asset('assets/images/icons/2.png') }}" style="width:100px;"  alt="">
                            <h4>Support services</h4>
                            <p>We provide ample support services, such as online tutoring, academic
                                advising, and technical assistance.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature125">
                            <img src="{{ asset('assets/images/icons/3.png') }}" style="width:100px;"  alt="">
                            <h4>Personalized learning</h4>
                            <p>Our personalized and convenient learning
                                approach offers students a tailored education that is accessible and flexible.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature125">
                            <img src="{{ asset('assets/images/icons/4.png') }}" style="width:100px;"  alt="">
                            <h4>Money back guarantee</h4>
                            <p>We stand behind our commitment to your success with our pass your
                                exams or get your money back guarantee</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('components.footer')
    </div>
@endsection
