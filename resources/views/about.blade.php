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
                                Welcome to Fanalyst Academy, the premier online learning platform where you can access top-quality education at affordable prices. Our mission is to empower individuals from all walks of life to learn and grow by offering a comprehensive and flexible learning experience.
                                <br/>

                                At Fanalyst Academy, we believe that education is a lifelong journey, and we are committed to helping our students achieve their goals. Our platform connects passionate instructors from around the world with students who are eager to learn and develop their skill sets. We offer a diverse range of courses on various topics, including programming, marketing, business, design, and much more.

                                <br/>

                                We carefully select our instructors based on their expertise and real-world experience, ensuring that our students receive top-quality instruction. Our instructors are not only knowledgeable, but they are also passionate about sharing their knowledge and committed to helping their students succeed.

                                <br/>
                                Our courses are designed to make learning easy, fun, and interactive. We understand that everyone has unique learning needs, which is why we offer self-paced and flexible courses that allow students to learn at their own pace and on their own schedule. We also recognize the importance of certification exams and job interviews in advancing one's career, which is why we offer a wide range of practice tests to help our students prepare for these critical assessments. Our practice tests are specifically designed to instil confidence in our students and provide them with the tools they need to succeed.
                                <br/>
                                Join our global community of learners and instructors today and take the first step towards achieving your learning goals. At Fanalyst Academy, we are passionate about learning and dedicated to helping our students succeed. Start your learning journey with us today!
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
                            <img src="{{ asset('assets/images/icons/3.png') }}" style="width:100px;"  alt="">

                            <h4>Practice test</h4>
                            <p>
                                Prepare effectively for your exams and interview with a wide range of practice tests.

                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature125">
                            <img src="{{ asset('assets/images/icons/1.png') }}" style="width:100px;"  alt="">

                            <h4>Interactive Learning</h4>
                            <p>Engage in Interactive Learning for Better Results and Experience.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature125">
                            <img src="{{ asset('assets/images/icons/2.png') }}" style="width:100px;"  alt="">
                            <h4>Experienced Instructors</h4>
                            <p>
                                Learn from knowledgeable instructors with real-world experience.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature125">
                            <img src="{{ asset('assets/images/icons/4.png') }}" style="width:100px;" alt="">
                            <h4>Budget-friendly Courses</h4>
                            <p>Access top-quality education without worrying about financial constraints.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('components.footer')
    </div>
@endsection
