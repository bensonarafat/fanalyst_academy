<div class="wrapper _bg4586 _new89">
    <section >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner" >
              <div class="carousel-item active">
                <img class="d-block w-100" style="height:550px;object-fit:cover" src="{{ asset('assets/images/banner/1.jpg') }}" alt="First slide">
                <div class="carousel-caption d-md-block">
                    <h2>Welcome to Fanalyst Academy</h2>
                    <p>We offer ACCA, ICAN, CFA, FRM, Corporate Finance and Personal Finance training services</p>
                    <a href="{{ route("login") }}" class="upload_btn" title="Enrol">Enrol Now</a>
                  </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" style="height:550px;object-fit:cover;" src="{{ asset('assets/images/banner/2.jpg') }}" alt="Second slide">
                <div class="carousel-caption d-md-block">
                    <h2>Quality contents and expert tutors</h2>
                    <p>Sign up for our tuition and take the first step towards academic success</p>
                    <a href="{{ route("login") }}" class="upload_btn" title="Enrol">Enrol Now</a>
                  </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </section>

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

                        <h4>Quality contents</h4>
                        <p>We offer relevant and top-notch course materials that are regularly updated
                            to ensure that our students.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="feature125">
                        <img src="{{ asset('assets/images/icons/1.png') }}" style="width:100px;"  alt="">

                        <h4>Support services</h4>
                        <p>We provide ample support services, such as online tutoring, academic
                            advising, and technical assistance.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="feature125">
                        <img src="{{ asset('assets/images/icons/2.png') }}" style="width:100px;"  alt="">
                        <h4>Personalized learning</h4>
                        <p>Our personalized and convenient learning
                            approach offers students a tailored education that is accessible and flexible.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="feature125">
                        <img src="{{ asset('assets/images/icons/4.png') }}" style="width:100px;" alt="">
                        <h4>Money back guarantee*</h4>
                        <p>We stand behind our commitment to your success with our pass your
                            exams or get your money back guarantee</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="_215td5">
        <div class="container">
            <div>

                <div>
                    <div class="component-margin">
                        <div class="unit-title--container--2Zy9z unit-title--has-title--ZqwQR">
                            <div class="unit-title--title-container--2RfU_">
                                <h2 class="ud-heading-xl unit-title--title--3KpMc" data-us="0" data-purpose="discovery-unit-1152523765">Free Courses</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="_14d25">
                            <div class="row">
                                @foreach ($freeCourses as $row)
                                     @php
                                        $user = \App\Models\User::find($row->instructor);
                                        // $rate = \App\Models\Rating::where('courseid', $row->id)->avg('vote');
                                    @endphp
                                    <div class="col-lg-3 col-md-4">
                                        <div class="fcrse_1 mt-30">
                                            <a href="{{ route('view.course', $row->id) }}" class="fcrse_img">
                                                <img src="{{ asset($row->media_thumbnail) }}" style="width:100%;height:150px;object-fit:cover;" alt="" />
                                                <div class="course-overlay">
                                                    <span class="play_btn1"><i class="uil uil-play"></i></span>
                                                </div>
                                            </a>
                                            <div class="fcrse_content">
                                                <div class="vdtodt">
                                                    <span class="vdt14">{{ $row->likes }} likes</span>
                                                    <span class="vdt14">{{ \Carbon\Carbon::parse($row->created_at)->diffForhumans(); }}</span>
                                                </div>
                                                <a href="{{ route('view.course', $row->id) }}" class="crse14s">{{ $row->title }}</a>
                                                <div class="auth1lnkprce">
                                                    <p class="cr1fot">By <a href="{{ route('view.user', $user->id) }}">{{ $user->fullname }}</a></p>
                                                    <div class="prce142">
                                                        @if(!$row->is_free)
                                                            FREE
                                                        @else
                                                            {!! naira() . number_format($row->amount, 2) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="_215td5">
        <div class="container">
            <div>
                <div class="component-margin">
                    <div class="unit-title--container--2Zy9z unit-title--has-title--ZqwQR">
                        <div class="unit-title--title-container--2RfU_">
                            <h2 class="ud-heading-xl unit-title--title--3KpMc" data-us="0" data-purpose="discovery-unit-1152523765">Paid Courses</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="_14d25">
                        <div class="row">
                            @foreach ($paidCourses as $row)
                                 @php
                                    $user = \App\Models\User::find($row->instructor);
                                    // $rate = \App\Models\Rating::where('courseid', $row->id)->avg('vote');
                                @endphp
                                <div class="col-lg-3 col-md-4">
                                    <div class="fcrse_1 mt-30">
                                        <a href="{{ route('view.course', $row->id) }}" class="fcrse_img">
                                            <img src="{{ asset($row->media_thumbnail) }}" style="width:100%;height:150px;object-fit:cover;" alt="" />
                                            <div class="course-overlay">
                                                <span class="play_btn1"><i class="uil uil-play"></i></span>
                                            </div>
                                        </a>
                                        <div class="fcrse_content">
                                            <div class="vdtodt">
                                                <span class="vdt14">{{ $row->likes }} likes</span>
                                                <span class="vdt14">{{ \Carbon\Carbon::parse($row->created_at)->diffForhumans(); }}</span>
                                            </div>
                                            <a href="{{ route('view.course', $row->id) }}" class="crse14s">{{ $row->title }}</a>
                                            <div class="auth1lnkprce">
                                                <p class="cr1fot">By <a href="{{ route('view.user', $user->id) }}">{{ $user->fullname }}</a></p>
                                                <div class="prce142">
                                                    @if(!$row->is_free)
                                                        FREE
                                                    @else
                                                        {!! naira() . number_format($row->amount, 2) !!}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>

@media (min-width: 61.31em){
    .component-margin:last-of-type {
        margin-bottom: 9.6rem;
    }
}

.unit-title--container--2Zy9z .unit-title--title-container--2RfU_ {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
}

.unit-title--container--2Zy9z .unit-title--title--3KpMc {
    max-width: 80rem;
}

.ud-heading-xl {
    font-family: udemy sans,-apple-system,BlinkMacSystemFont,Roboto,segoe ui,Helvetica,Arial,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol;
    font-weight: 700;
    line-height: 1.2;
    letter-spacing: -.02rem;
    font-size: 2.4rem;
}

.unit-title--container--2Zy9z.unit-title--has-title--ZqwQR {
    margin-bottom: 1.6rem;
}
@media (min-width: 61.31em){
    .component-margin+.component-margin, .discovery-unit-empty-render+.component-margin {
        margin-top: 6.4rem;
    }
}
        .alternate-headline--title-no-margin--2B8yO {
    margin: 0;
    max-width: 100%;
}

.alternate-headline--secondary-text-small-margin--3aDFf {
    margin: 1.6rem 0 0;
    max-width: 80rem;
}

.headline__sub-text {
    margin-top: 0.8rem;
    max-width: 80rem;
}

.ud-text-lg {
    font-family: udemy sans,sf pro text,-apple-system,BlinkMacSystemFont,Roboto,segoe ui,Helvetica,Arial,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol;
    font-weight: 400;
    line-height: 1.4;
    font-size: 1.9rem;
}

@media (min-width: 61.31em){
.headline__main-text {
    max-width: 80rem;
    font-family: SuisseWorks,Georgia,Times,times new roman,serif,apple color emoji,segoe ui emoji,segoe ui symbol;
    font-weight: 700;
    font-size: 3.2rem;
    line-height: 1.25;
    letter-spacing: -.05rem;
}
}
.headline__main-text {
    max-width: 80rem;
}

.carousel-item .upload_btn{
    font-size: 15px !important;
    padding: 15px 25px !important;
}

@media only screen and (max-width: 600px) {
    .carousel-item img{
        height: 200px !important;
    }
    .carousel-item .carousel-caption h2{
        font-size: 16px !important;
    }

    .carousel-item .carousel-caption p{
        font-size: 12px !important;
        line-height: 15px;
    }
    .carousel-caption {
        bottom: 10% !important;
    }
    .carousel-caption .upload_btn {
        display: unset;
        font-size: 12px !important;
        padding: 6px 10px !important;
    }
}

    </style>
    @include("components.footer")
</div>
