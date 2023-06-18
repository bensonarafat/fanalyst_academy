@extends('layouts.app')
@section('title', $course->title)
@section('content')

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

@include("components.messagemodel", ['id' => $course->instructor])


<div class="wrapper _bg4586 @guest _new89 @endguest">
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
                                                            <input type="hidden" name="type" value="course">
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

                                @guest
                                    <ul class="_215b31">
                                        @if($enrolled == 0)
                                            @if(!$course->is_free)

                                                <li>
                                                    <form action="{{ route('enroll.free') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="type" value="course">
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
                                @endguest
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
                    @auth
                        @if(auth()->user()->id != $course->instructor)
                            <div class="user_dt5">
                                <div class="user_dt_left">
                                    <div class="live_user_dt">
                                        <div class="user_img5">
                                            <a href="{{ route('view.user', $instructor->id) }}"><img src="@if($instructor->photo) {{ asset($instructor->photo) }} @else {{ asset('assets/images/left-imgs/img-1.jpg') }} @endif" alt="" /></a>
                                        </div>
                                        <div class="user_cntnt">
                                            <a href="{{ route('view.user', $instructor->id) }}" class="_df7852">{{ $instructor->fullname }}</a>
                                            <button class="subscribe-btn">View Profile</button>
                                            <button class="subscribe-btn" data-toggle="modal" data-target="#startMessage">Start Message</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="user_dt_right">
                                    <ul>
                                        <li>
                                            <a href="#" class="lkcm152"><i class="uil uil-eye"></i><span>{{ $course->enrolled }}</span></a>
                                        </li>
                                        <li>
                                            <a href="/courses/like-course/{{$course->id}}/{{ $like }}" class="lkcm152"><i class="uil uil-thumbs-up"></i><span>{{ $course->likes }}</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="course_tabs">
                            <nav>
                                <div class="nav nav-tabs tab_crse justify-content-center" id="nav-tab" role="tablist">
                                    @if(auth()->user()->id == $course->instructor) <a class="nav-item nav-link @if(auth()->user()->id == $course->instructor) active @endif" id="nav-about-tab" data-toggle="tab" href="#nav-curriculum" role="tab" aria-selected="true">Curriculum</a> @endif
                                    <a class="nav-item nav-link @if(auth()->user()->id != $course->instructor) active @endif" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-selected="false">About</a>
                                    <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-courses" role="tab" aria-selected="false">Courses Content</a>
                                    <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-enrolled" role="tab" aria-selected="false">Student Enrolled</a>
                                    {{-- <a class="nav-item nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-selected="false">Reviews</a> --}}
                                </div>
                            </nav>
                        </div>
                    @endauth

                    @guest
                        <div class="user_dt5">
                            <div class="user_dt_left">
                                <div class="live_user_dt">
                                    <div class="user_img5">
                                        <a href="{{ route('view.user', $instructor->id) }}"><img src="@if($instructor->photo) {{ asset($instructor->photo) }} @else {{ asset('assets/images/left-imgs/img-1.jpg') }} @endif" alt="" /></a>
                                    </div>
                                    <div class="user_cntnt">
                                        <a href="{{ route('view.user', $instructor->id) }}" class="_df7852">{{ $instructor->fullname }}</a>
                                        <button class="subscribe-btn">View Profile</button>
                                        <button class="subscribe-btn" data-toggle="modal" data-target="#startMessage">Start Message</button>
                                    </div>

                                </div>
                            </div>
                            <div class="user_dt_right">
                                <ul>
                                    <li>
                                        <a href="#" class="lkcm152"><i class="uil uil-eye"></i><span>{{ $course->enrolled }}</span></a>
                                    </li>
                                    <li>
                                        <a href="/courses/like-course/{{$course->id}}/{{ $like }}" class="lkcm152"><i class="uil uil-thumbs-up"></i><span>{{ $course->likes }}</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="course_tabs">
                            <nav>
                                <div class="nav nav-tabs tab_crse justify-content-center" id="nav-tab" role="tablist">
                                    @auth @if(auth()->user()->id == $course->instructor) <a class="nav-item nav-link @if(auth()->user()->id == $course->instructor) active @endif" id="nav-about-tab" data-toggle="tab" href="#nav-curriculum" role="tab" aria-selected="true">Curriculum</a> @endif @endauth
                                    <a class="nav-item nav-link @auth @if(auth()->user()->id != $course->instructor) active @endif @endauth @guest active @endguest" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-selected="false">About</a>
                                    <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-courses" role="tab" aria-selected="false">Courses Content</a>
                                    <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-enrolled" role="tab" aria-selected="false">Student Enrolled</a>
                                    {{-- <a class="nav-item nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-selected="false">Reviews</a> --}}
                                </div>
                            </nav>
                        </div>
                    @endguest
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
                            <div class="tab-pane fade  @auth @if(auth()->user()->id == $course->instructor) show active @endif @endauth" id="nav-curriculum" role="tabpanel">
                                <div class="_htg451">
                                    @include("components.alert")
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">

                                            <div class="top_countries">
                                                <div class="top_countries_title">
                                                    <h2>Add new Curriculum</h2>
                                                </div>
                                                <div class="p-2">
                                                    <form action="{{ route('store.curriculum') }}" method="post">
                                                        @csrf
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="ui search focus mt-30 lbel25">
                                                                <label>Name</label>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="text" placeholder="Name" name="name" data-purpose="edit-course-title" maxlength="60" id="name" value="" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="p-2">
                                                            <input type="hidden" name="id" value="{{ $course->id }}">
                                                            <button data-direction="next" class="btn btn-default steps_btn">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-1">
                                            <div class="table-responsive mt-30">
                                                <table class="table ucp-table earning__table">
                                                    <thead class="thead-s">
                                                        <tr>
                                                            <th scope="col">SN</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Lectures</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($curriculum as $row)
                                                            @php
                                                                $CurriculumLectureCount =  App\Models\CurriculumLecture::where(['courseid' => $course->id, 'curriculumid' => $row->id])->count();
                                                            @endphp
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $CurriculumLectureCount }}</td>
                                                            <td>
                                                                <a href="{{ route('add.lectures', $row->id) }}" title="Add Lecture"><i class="fa fa-plus"></i></a>
                                                                <a href="/courses/curriculum/delete/{{ $row->id }}/{{ $course->id }}"><i class="fa fa-trash"></i></a>
                                                                <a href="{{ route('edit.curriculum', $row->id) }}"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach



                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade @auth @if(auth()->user()->id != $course->instructor) show active  @endif @endauth @guest show active @endguest" id="nav-about" role="tabpanel">
                                <div class="_htg451">
                                    <div class="_htg452">
                                        <h3>Requirements</h3>
                                        {!! $course->prerequisites !!}
                                    </div>
                                    <div class="_htg452 mt-35">
                                        <h3>Description</h3>
                                        {!! $course->description !!}
                                    </div>

                                    <div class="_htgdrt mt-35">
                                        <h3>What you'll learn</h3>
                                        <div class="_scd123">
                                            {!! $course->will_learn !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                            @auth
                                                                @if(auth()->user()->id == $course->instructor)
                                                                    @if($x->lecture_type == "video")
                                                                        @if($x->downloadable)
                                                                        <a href="{{ asset($x->media_video) }}" download><i class="uil uil-download-alt icon_142"></i></a>
                                                                        @endif
                                                                        <a href="/courses/stream/{{ $course->id }}/{{ $row->id }}/{{ $x->id }}" class="preview-text">View</a>
                                                                    @else
                                                                        <a href="{{ asset($x->document) }}" download=""><i class="uil uil-download-alt icon_142"></i></a>
                                                                    @endif
                                                                @else
                                                                    @if($enrolled == 0)
                                                                        @if($x->is_free)
                                                                            @if($x->lecture_type == "video")
                                                                                @if($x->downloadable)
                                                                                    <a href="{{ asset($x->media_video) }}" download><i class="uil uil-download-alt icon_142"></i></a>
                                                                                @endif
                                                                                <a href="/courses/stream/{{ $course->id }}/{{ $row->id }}/{{ $x->id }}" class="preview-text">Download</a>
                                                                            @else
                                                                                <a href="{{ asset($x->document) }}" download=""><i class="uil uil-download-alt icon_142"></i></a>
                                                                            @endif
                                                                        @else
                                                                            <a href="javascript:void(0)" class="preview-text">--</a>
                                                                        @endif
                                                                    @else
                                                                        @if($x->lecture_type == "video")
                                                                            @if($x->downloadable)
                                                                                <a href="{{ asset($x->media_video) }}" download><i class="uil uil-download-alt icon_142"></i></a>
                                                                            @endif
                                                                            <a href="/courses/stream/{{ $course->id }}/{{ $row->id }}/{{ $x->id }}" class="preview-text">Download</a>
                                                                        @else
                                                                            <a href="{{ asset($x->document) }}" download=""><i class="uil uil-download-alt icon_142"></i></a>
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                            @endauth

                                                            @guest
                                                                @if($enrolled == 0)
                                                                    @if($x->is_free)
                                                                        @if($x->lecture_type == "video")
                                                                            @if($x->downloadable)
                                                                                <a href="{{ asset($x->media_video) }}" download><i class="uil uil-download-alt icon_142"></i></a>
                                                                            @endif
                                                                            <a href="/courses/stream/{{ $course->id }}/{{ $row->id }}/{{ $x->id }}" class="preview-text">Download</a>
                                                                        @else
                                                                            <a href="{{ asset($x->document) }}" download=""><i class="uil uil-download-alt icon_142"></i></a>
                                                                        @endif
                                                                    @else
                                                                        <a href="javascript:void(0)" class="preview-text">--</a>
                                                                    @endif
                                                                @else
                                                                    @if($x->lecture_type == "video")
                                                                        @if($x->downloadable)
                                                                            <a href="{{ asset($x->media_video) }}" download><i class="uil uil-download-alt icon_142"></i></a>
                                                                        @endif
                                                                        <a href="/courses/stream/{{ $course->id }}/{{ $row->id }}/{{ $x->id }}" class="preview-text">Download</a>
                                                                    @else
                                                                        <a href="{{ asset($x->document) }}" download=""><i class="uil uil-download-alt icon_142"></i></a>
                                                                    @endif
                                                                @endif
                                                            @endguest
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
