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
                    <p>Upgrade your skills, and accelerate your learning with cutting edge courses</p>
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
        <div class="mx-2 mb-4 mobile_search" style="display:none;">
            <div class="input-group input-group-lg">
                <input type="search" class="form-control" placeholder="What do you want to learn? " aria-label="What do you want to learn?" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2"><i class="uil uil-search"></i></span>
                </div>
              </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-3">
                    @php
                        $allcourse_count = App\Models\Course::where(["status" => "active"])->count();
                    @endphp
                    <a href="/" class="__category" style="width:100%">
                        <strong>
                            <span style="background: white;border-radius:100%; padding: 8px 4px;margin-right:5px;">
                                <img src="{{ asset("assets/images/category.png") }}" style="width:20px; height:20px;object-fit:contain;">
                            </span>
                            <span style="font-size: 12px;">All ({{ $allcourse_count }})</span>
                        </strong>
                    </a>
                </div>
                @foreach (appcategories() as $row )
                    @php
                        $course_count = App\Models\Course::where(["category" => $row->id, "status" => "active"])->count();
                    @endphp
                    <div class="col-sm-12 col-lg-3">
                        <a href="?cat={{ $row->id }}" style="width:100%" class="__category">
                            <strong>
                                <span style="background: white;border-radius:100%; padding: 8px 4px;margin-right:5px;">
                                    @if($row->icon == null)
                                    <img src="{{ asset("assets/images/category.png") }}" style="width:20px;height:20px;object-fit:contain;">
                                    @else
                                        <img src="{{ asset($row->icon) }}" style="width:20px;height:20px;object-fit:contain;">
                                    @endif
                                </span>
                                <span style="font-size: 12px;">{{ $row->name }} ({{$course_count }})</span>
                            </strong>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        @isset($_GET['cat'])
        <div class="row">
            <div style="display:flex;align-items: end;">
                <span style="background: black;
                border-radius: 100%;
                padding: 5px;
                color: white;
                margin-right: 5px;
                height: 35px;
                width: 35px;
                text-align: center;
                display: flex;
                place-items: center;">
                    <i style="font-size: 20px;" class="uil {!! randomIcons()['icon']; !!}"></i>
                </span>
                <h2>{{ $category->name }}
                    <p>{{ $categoryCoureses }} Courses</p>
                </h2>
            </div>
        </div>
        <hr>
        <div class="">

            <div style="display:flex;justify-content: space-between; ">
                <div style="display:flex; padding: 5px;">
                    <div style="display: flex;border: 1px solid #948f8f;padding: 5px;border-radius: 5px;margin-right:2px;">
                        <strong>Sort By: </strong>
                        <select name="" id="" class="form-control">
                            <option value="">Nearest</option>
                        </select>
                    </div>
                    <div style="display:flex;border: 1px solid #948f8f;padding: 5px;border-radius: 5px;    align-items: center;">
                        <i class="fa fa-filter"></i>
                        <span>Filter</span>
                    </div>
                </div>
            </div>

        </div>
        @endisset

        <div class="row">
            @foreach ($allCourses as $row)
                    @php
                    $user = \App\Models\User::find($row->instructor);
                    // $rate = \App\Models\Rating::where('courseid', $row->id)->avg('vote');
                @endphp
                <div class="col-6 col-sm-3">
                    <div class="fcrse_1 mt-30">
                        <a href="{{ route('view.course', $row->id) }}" class="fcrse_img">
                            <img src="{{ asset($row->media_thumbnail) }}" style="width:100%;height:150px;object-fit:cover;" alt="" />
                            <div class="course-overlay">
                                <span class="play_btn1"><i class="uil uil-play"></i></span>
                            </div>
                        </a>
                        <div class="fcrse_content">
                            <a href="{{ route('view.course', $row->id) }}" class="crse14s">{{ $row->title }}</a>
                            <p style="font-size:11px;">
                                By {{ $user->fullname }}
                            </p>
                            <div class="auth1lnkprce">
                                <p class="cr1fot">
                                    @if(!$row->is_free)
                                        Free
                                    @else
                                        From {!! naira() . number_format($row->amount, 2) !!}
                                    @endif

                                </p>
                                <div class="prce142">
                                    <i class="fa fa-star" style="color: #FFD700;font-size: 12px;"></i>
                                    <span style="font-size: 13px;">{{ $row->ratings }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="_215td5" id="cr458">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title589 mb-20 text-center">
                        <h2>Practice Tests</h2>
                        <p>Looking to ace your upcoming exams? Try our comprehensive practice test for the ultimate preparation experience!</p>
                        <img class="line-title" src="{{ asset("assets/images/line.svg") }}" alt="" />
                    </div>
                </div>

                {{-- Quiz here  --}}
                <div class="row">
                    @foreach ($topics as $row)
                    <div class="col-6 col-sm-3">
                        <div class="fcrse_1 mt-30">
                            <a href="/quiz/take-quiz?query=true&id={{ $row->id }}" class="fcrse_img">
                                <img src="{{ asset($row->image) }}" style="width:100%;height:150px;object-fit:cover;" alt="" />
                                <div class="course-overlay">
                                    <span class="play_btn1"><i class="uil uil-play"></i></span>
                                </div>
                            </a>
                            <div class="fcrse_content">
                                <a href="/quiz/take-quiz?query=true&id={{ $row->id }}" class="crse14s">{{ $row->name }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- Quiz here --}}
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

                        <h4>Quality contents</h4>
                        <p>
                            Our high-quality and up-to-date course materials are designed to enhance our students success.
                        </p>
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
            <div class="non-student-cta--non-student-cta-bg--1okkJ">
                <div class="non-student-cta--non-student-cta-content-wrapper--26uBA">
                    <div class="row">
                        <div class="col-sm-6">
                            <img loading="lazy" class="non-student-cta--non-student-cta-image--7Y7Ul non-student-cta--on-desktop--2bk9D" data-purpose="desktop-non-student-cta-image" alt="" width="400" height="400" src="{{ asset("assets/images/start_teaching.jpg") }}" srcset="{{ asset("assets/images/start_teaching.jpg") }}">
                        </div>
                        <div class="col-sm-6">
                            <div class="non-student-cta--non-student-cta--2quSb" data-purpose="non-student-cta-body">
                                <h3 class="ud-heading-serif-xl non-student-cta--non-student-cta__header--3xgVp" data-purpose="non-student-cta-title">Teach with Us</h3>
                                <div class="ud-text-md non-student-cta--non-student-cta__content--3D827">Fanalyst Academy presents a unique opportunity for instructors worldwide to share their expertise and inspire students to learn what they love. With our comprehensive resources and support, you can create an engaging learning experience and make a real impact in the lives of students worldwide. Join our community of passionate instructors today and help shape the future of education!</div>
                                <a href="/register?tutor=true" class="career_lnk5">Start teaching today</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

<style>


.non-student-cta--non-student-cta-content-wrapper--26uBA {
    padding: 0 2.4rem;
}
@media only screen and (max-width: 600px) {
    .non-student-cta--non-student-cta-content-wrapper--26uBA img{
    width: 100% !important;
    object-fit: contain !important;
    }
}

@media (min-width: 61.31em){
.non-student-cta--on-mobile--18vY3 {
    display: none;
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


@media (min-width: 61.31em){
.non-student-cta--non-student-cta--2quSb {
    display: flex;
    flex-direction: column;
    justify-content: center;
    max-width: 40rem;
    text-align: left;
}
}

.non-student-cta--non-student-cta--2quSb {
    max-width: 60rem;
    margin: 0 auto;
    text-align: center;
}

@media (min-width: 37.56em){
.non-student-cta--non-student-cta__header--3xgVp {
    font-family: var(--font-stack-heading-serif);
    font-weight: 700;
    font-size: 3.2rem;
    line-height: 1.25;
    letter-spacing: -.05rem;
}
}
.non-student-cta--non-student-cta__header--3xgVp {
    margin-bottom: 1.6rem;
}
.ud-heading-serif-xl {
    font-family: var(--font-stack-heading-serif);
    font-weight: 700;
    font-size: 2.4rem;
    line-height: 1.35;
    letter-spacing: -.02rem;
}

@media (min-width: 37.56em){
.non-student-cta--non-student-cta__content--3D827 {
    font-size: 1.2rem;
}
}

.non-student-cta--non-student-cta__content--3D827 {
    margin-bottom: 1.6rem;
}
.ud-text-md {
    font-family: udemy sans,sf pro text,-apple-system,BlinkMacSystemFont,Roboto,segoe ui,Helvetica,Arial,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol;
    font-weight: 400;
    line-height: 1.4;
    /* font-size: 1.6rem; */
}


@media (min-width: 61.31em){
.non-student-cta--ctas-container--1alXW {
    justify-content: left;
}
}

@media (min-width: 37.56em){
    .non-student-cta--ctas-container--1alXW {
        flex-direction: row;
    }
}
.non-student-cta--ctas-container--1alXW {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

@media (min-width: 61.31em){
    .non-student-cta--non-student-cta--2quSb {
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-width: 40rem;
        text-align: left;
    }
}
    .non-student-cta--non-student-cta--2quSb {
        max-width: 60rem;
        margin: 0 auto;
        text-align: center;
    }
</style>
    @include("components.footer")
</div>
