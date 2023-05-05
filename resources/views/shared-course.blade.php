@extends('layouts.main')
@section('title',  $instructor->fullname . " Courses")
@section('content')
@section('description', 'Courses')
@section('image', asset('assets/images/logo.png') )


<div class="modal vd_mdl fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                @if($course->media_type == 'mp4')
                <video id="my-video" class="video-js" controls preload="auto" width="640" height="264" poster="{{ asset($course->media_thumbnail) }}" data-setup="{}">
                    <source src="{{ asset($course->media_video) }}" type="video/mp4" />
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
                @elseif($course->media_type == 'youtube')
                    <iframe  width="640" height="264" src="{!! getYoutubeEmbedUrl($course->media_video) !!}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                @elseif($course->media_type == 'url')
                <video id="my-video" class="video-js" controls preload="auto" width="640" height="264" poster="{{ asset($course->media_thumbnail) }}" data-setup="{}">
                    <source src="{{ $course->media_video }}" type="video/mp4" />
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="wrapper _bg4586 _new89">
    <div class="_215b01">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section3125">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-5 col-md-6">
                                <div class="preview_video">
                                    <a href="#" class="fcrse_img" data-toggle="modal" data-target="#videoModal">
                                        <img style="height:200px;object-fit:cover;" src="@if($course->media_thumbnail) {{ asset($course->media_thumbnail) }} @else {{ asset('assets/images/courses/img-2.jpg') }} @endif" alt="{{ $course->title }}" />
                                        <div class="course-overlay">
                                            <span class="play_btn1"><i class="uil uil-play"></i></span>
                                            <span class="_215b02">Preview this course</span>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-6">

                                @include('components.alert')

                                <div class="_215b03">
                                    <h2>{{ $course->title }}</h2>
                                    <span class="_215b04">{{ $course->short_description }}</span>
                                </div>
                                {{-- <div class="_215b05">
                                    <div class="crse_reviews mr-2"><i class="uil uil-star"></i>{{ $rate }}</div>
                                    ({{ $course->ratings }} ratings)
                                </div> --}}
                                <div class="_215b05">
                                    {{ $course->enrolled }} students enrolled
                                </div>

                                <div class="_215b05">
                                    Last updated {{ \Carbon\Carbon::parse($course->updated_at)->format('d M, Y') }}
                                </div>

                                @auth
                                    @if(auth()->user()->id != $course->instructor)
                                        <ul class="_215b31">
                                            @if($enrolled == 0)
                                                @if(!$course->is_free)

                                                    <li>
                                                        <form action="{{ route('enroll.free') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $course->id }}">
                                                            <button type="submit" class="btn_adcart">Enroll for Free</button>
                                                        </form>
                                                    </li>
                                                @else
                                                    <li>
                                                        @if(inCart($course->id))
                                                        <form action="{{ route('remove.cart') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $course->id }}">
                                                            <input type="hidden" name="type" value="course">
                                                            <button class="btn_adcart">Remove from Cart ({!! naira() . number_format($course->amount, 2) !!}) </button>
                                                        </form>
                                                        @else
                                                        <form action="{{ route('add.cart') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $course->id }}">
                                                            <input type="hidden" name="type" value="course">
                                                            <button class="btn_adcart">Add to Cart ({!! naira() . number_format($course->amount, 2) !!}) </button>
                                                        </form>
                                                        @endif

                                                    </li>
                                                @endif
                                            @else
                                                <li><button class="btn_adcart">Enrolled</button></li>
                                            @endif
                                        </ul>
                                    @else
                                        <ul class="_215b31">
                                            @if(!$course->is_free)

                                            <li>
                                                <button type="submit" class="btn_adcart"> Free</button>
                                            </li>
                                            @else
                                                <li><button class="btn_adcart">{!! naira() . number_format($course->amount, 2) !!}</button></li>
                                            @endif
                                        </ul>
                                    @endif
                                @endauth

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="_215b15 _byt1458">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="course_tabs">
                        <nav>
                            <div class="nav nav-tabs tab_crse justify-content-center" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-selected="false">About</a>
                                <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-courses" role="tab" aria-selected="false">Courses Content</a>
                                <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-enrolled" role="tab" aria-selected="false">Student Enrolled</a>
                                {{-- <a class="nav-item nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-selected="false">Reviews</a> --}}
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="_215b17">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course_tab_content">
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade" id="nav-courses" role="tabpanel">
                                @if(count($curriculum) > 0)
                                    <div class="crse_content">
                                        <h3>Course content</h3>
                                        <div class="_112456">
                                            <ul class="accordion-expand-holder">
                                                <li><span class="accordion-expand-all _d1452">Expand all</span></li>
                                                <li><span class="_fgr123"> {{ count($curriculum) }} lectures</span></li>
                                            </ul>
                                        </div>
                                        <div id="accordion" class="ui-accordion ui-widget ui-helper-reset">
                                            @foreach ($curriculum as $row)
                                                @php
                                                 $lectures = \App\Models\CurriculumLecture::where('curriculumid', $row->id)->get();
                                                @endphp
                                                <a href="javascript:void(0)" class="accordion-header ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all">
                                                    <div class="section-header-left">
                                                        <span class="section-title-wrapper">
                                                            <i class="uil uil-angle-down crse_icon"></i>
                                                            <span class="section-title-text">{{ $row->name }}</span>
                                                        </span>
                                                    </div>
                                                    <div class="section-header-right">
                                                        <span class="num-items-in-section">{{ count($lectures) }} lectures</span>
                                                    </div>
                                                </a>
                                                <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
                                                   @foreach ($lectures as $x)
                                                   <div class="lecture-container">
                                                        <div class="left-content">
                                                            @if($x->lecture_type == "video")
                                                                <i class="uil uil-play-circle icon_142"></i>
                                                            @else
                                                                <i class="uil uil-file icon_142"></i>
                                                            @endif
                                                            <div class="top">
                                                                <div class="title">{{ $x->title }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            @if($enrolled == 0)
                                                                <a href="javascript:void(0)" class="preview-text">--</a>
                                                            @else
                                                                @if($x->lecture_type == "video")
                                                                    <a href="/courses/stream/{{ $course->id }}/{{ $row->id }}/{{ $x->id }}" class="preview-text">View</a>
                                                                @else
                                                                    <a href="{{ asset($x->document) }}" download="">View</a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                   @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center">
                                        <h1>No Course Content yet</h1>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="nav-enrolled" role="tabpanel">
                                <div class="student_reviews">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="la5lo1">
                                                <div class="row">
                                                    @foreach ($students as $row)
                                                    @php
                                                        $user = \App\Models\User::find($row->userid);
                                                    @endphp
                                                    <div class="col-md-3">
                                                        <div class="stream_1 mb-30">
                                                            <a href="{{ route('view.user', $row->id) }}" class="stream_bg">
                                                                <img src="@if($user->photo) {{ asset($user->photo) }} @else {{ asset('assets/images/left-imgs/img-1.jpg') }} @endif" alt="{{ $user->fullname }}" />
                                                                <h4>{{ $user->fullname }}</h4>
                                                                <p>{{ $user->email }}<span></span></p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="nav-reviews" role="tabpanel">
                                <div class="student_reviews">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="review_all120">
                                                @foreach ($ratings as $row)
                                                <div class="review_item">
                                                    <div class="review_usr_dt">
                                                        <img src="{{ asset('assets/images/left-imgs/img-1.jpg') }}" alt="" />
                                                        <div class="rv1458">
                                                            <h4 class="tutor_name1">John Doe</h4>
                                                            <span class="time_145">2 hour ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-box mt-20">
                                                        <span class="rating-star full-star"></span>
                                                        <span class="rating-star full-star"></span>
                                                        <span class="rating-star full-star"></span>
                                                        <span class="rating-star full-star"></span>
                                                        <span class="rating-star half-star"></span>
                                                    </div>
                                                    <p class="rvds10">
                                                        Nam gravida elit a velit rutrum, eget dapibus ex elementum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce lacinia, nunc sit amet tincidunt venenatis.
                                                    </p>

                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>
<style>
    #my-video{
        width: 100% !important;
    }
</style>
@endsection
