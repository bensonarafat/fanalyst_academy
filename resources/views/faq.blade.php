@extends('layouts.main')
@section('title', "Q&A")
@section('content')
@section('description', 'Question and Answer')
@section('url', config('app.url') . '/faq' )
@section('image', asset('assets/images/logo.png') )

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
                                        <li class="breadcrumb-item active" aria-current="page">Q&A</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                    </div>
                    <div class="title126">
                        <h2>Q&A</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sa4d25 mb4d25">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12 col-md-4">
                    <div class="section3125 hstry142">
                        <div class="tb_145">
                            <div class="panel-group accordion" id="accordionfilter">
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingOne">
                                        <div class="panel-title10">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseOne" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                What is Fanalyst Academy?
                                            </a>
                                        </div>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" aria-labelledby="headingOne" data-parent="#accordionfilter">
                                        <div class="panel-body">
                                            <p>
                                                Fanalyst Academy is a tuition provider for finance certification
exams, personal finance, and corporate finance. We offer our courses through an online
platform, as well as live class sessions with our students.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingTwo">
                                        <div class="panel-title10">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" href="#" aria-expanded="false" aria-controls="collapseTwo">
                                                What finance certification exams do you offer tuition for?
                                            </a>
                                        </div>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" aria-labelledby="headingTwo" data-parent="#accordionfilter">
                                        <div class="panel-body">
                                            <p>
                                                We offer tuition for ACCA, CFA, ICAN, and FRM exams.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingThree">
                                        <div class="panel-title10">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" href="#" aria-expanded="false" aria-controls="collapseThree">
                                                Do you offer live class sessions with your students?
                                            </a>
                                        </div>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" aria-labelledby="headingThree" data-parent="#accordionfilter">
                                        <div class="panel-body">
                                            <p>
                                                Yes, we offer extra live class sessions
                                                with our students in addition to our online platform.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingfour">
                                        <div class="panel-title10">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapsefour" href="#" aria-expanded="false" aria-controls="collapsefour">
                                                How does your online platform work?
                                            </a>
                                        </div>
                                    </div>
                                    <div id="collapsefour" class="panel-collapse collapse" aria-labelledby="headingfour" data-parent="#accordionfilter">
                                        <div class="panel-body">
                                            <p>
                                                Our online platform provides access to course
                                                materials, such as videos, textbooks, and practice exams. Students can access the platform
                                                anytime and anywhere, making it convenient for those with busy schedules.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingfive">
                                        <div class="panel-title10">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapsefive" href="#" aria-expanded="false" aria-controls="collapsefive">
                                                What is included in your courses?
                                            </a>
                                        </div>
                                    </div>
                                    <div id="collapsefive" class="panel-collapse collapse" aria-labelledby="headingfive" data-parent="#accordionfilter">
                                        <div class="panel-body">
                                            <p>
                                                Our courses include access to all course materials, live
class sessions, and support from our team of experienced tutors.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingsix">
                                        <div class="panel-title10">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapsesix" href="#" aria-expanded="false" aria-controls="collapsesix">
                                                How long does it take to complete a course?
                                            </a>
                                        </div>
                                    </div>
                                    <div id="collapsesix" class="panel-collapse collapse" aria-labelledby="headingsix" data-parent="#accordionfilter">
                                        <div class="panel-body">
                                            <p>
                                                The duration of our courses depends on the
                                                specific finance certification exam you are preparing for. We provide a recommended study
                                                schedule for each exam, and students can complete the course at their own pace.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingseven">
                                        <div class="panel-title10">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseseven" href="#" aria-expanded="false" aria-controls="collapseseven">
                                                How does the Money Back guarantee work?
                                            </a>
                                        </div>
                                    </div>
                                    <div id="collapseseven" class="panel-collapse collapse" aria-labelledby="headingseven" data-parent="#accordionfilter">
                                        <div class="panel-body">
                                            <p>
                                                The moneyback guarantee is on our ACCA,
                                                ICAN, CFA, and FRM tuition. To be eligible, you must attend at least 95% of the live class
                                                and complete all assignments. If you fail the exam, you have the option to either receive a full
                                                refund of your tuition or attend another lecture free of charge.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingeight">
                                        <div class="panel-title10">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseeight" href="#" aria-expanded="false" aria-controls="collapseeight">
                                                Is there any qualification for joining the live class?
                                            </a>
                                        </div>
                                    </div>
                                    <div id="collapseeight" class="panel-collapse collapse" aria-labelledby="headingeight" data-parent="#accordionfilter">
                                        <div class="panel-body">
                                            <p>
                                                To be eligible for the live class, it is
                                                necessary to complete the weekly readings, video lectures, and assignments that are available
                                                on the learning platform.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingnine">
                                        <div class="panel-title10">
                                            <a class="collapsed" data-toggle="collapse" data-target="#headingnine" href="#" aria-expanded="false" aria-controls="collapsenine">
                                                How can I get in touch with Fanalyst Academy if I have more questions?
                                            </a>
                                        </div>
                                    </div>
                                    <div id="collapsenine" class="panel-collapse collapse" aria-labelledby="headingnine" data-parent="#accordionfilter">
                                        <div class="panel-body">
                                            <p>
                                                You can contact us
                                                through our website, email, or phone. Our contact information can be found on our website.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('components.footer')
</div>

@endsection
