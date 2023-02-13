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
                <iframe src="https://www.youtube.com/embed/Ohe_JzKksvA" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<div class="wrapper _bg4586">
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
                                            <div class="badge_seller">Bestseller</div>
                                            <span class="play_btn1"><i class="uil uil-play"></i></span>
                                            <span class="_215b02">Preview this course</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="_215b10">
                                    <a href="#" class="_215b11">
                                        <span><i class="uil uil-heart"></i></span>Save
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-6">
                                <div class="_215b03">
                                    <h2>{{ $course->title }}</h2>
                                    <span class="_215b04">{{ $course->short_description }}</span>
                                </div>
                                <div class="_215b05">
                                    <div class="crse_reviews mr-2"><i class="uil uil-star"></i>{{ $rate }}</div>
                                    ({{ $course->ratings }} ratings)
                                </div>
                                <div class="_215b05">
                                    {{ $course->enrolled }} students enrolled
                                </div>

                                <div class="_215b05">
                                    Last updated {{ \Carbon\Carbon::parse($course->updated_at)->format('d M, Y') }}
                                </div>
                                @if(auth()->user()->id != $course->instructor)
                                    <ul class="_215b31">
                                        <li><button class="btn_adcart">Add to Cart</button></li>
                                    </ul>
                                @endif
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
                    @if(auth()->user()->id != $course->instructor)
                    <div class="user_dt5">
                        <div class="user_dt_left">
                            <div class="live_user_dt">
                                <div class="user_img5">
                                    <a href="#"><img src="@if($instructor->photo) {{ asset($instructor->photo) }} @else {{ asset('assets/images/left-imgs/img-1.jpg') }} @endif" alt="" /></a>
                                </div>
                                <div class="user_cntnt">
                                    <a href="#" class="_df7852">{{ $instructor->fullname }}</a>
                                    <button class="subscribe-btn">View Profile</button>
                                </div>
                            </div>
                        </div>
                        <div class="user_dt_right">
                            <ul>
                                <li>
                                    <a href="#" class="lkcm152"><i class="uil uil-eye"></i><span>{{ $course->enrolled }}</span></a>
                                </li>
                                <li>
                                    <a href="#" class="lkcm152"><i class="uil uil-thumbs-up"></i><span>{{ $course->likes }}</span></a>
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
                                <a class="nav-item nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-selected="false">Reviews</a>
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
                            <div class="tab-pane fade @if(auth()->user()->id == $course->instructor) show active @endif" id="nav-curriculum" role="tabpanel">
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
                            <div class="tab-pane fade @if(auth()->user()->id != $course->instructor) show active  @endif" id="nav-about" role="tabpanel">
                                <div class="_htg451">
                                    <div class="_htg452">
                                        <h3>Requirements</h3>
                                        {{ $course->prerequisites }}
                                    </div>
                                    <div class="_htg452 mt-35">
                                        <h3>Description</h3>
                                        {!! $course->description !!}
                                    </div>

                                    <div class="_htgdrt mt-35">
                                        <h3>What you'll learn</h3>
                                        <div class="_scd123">
                                            {{ $course->will_learn }}
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
                                                <li><span class="_fgr123"> 402 lectures</span></li>
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
                                                            <i class="uil uil-presentation-play crse_icon"></i>
                                                            <span class="section-title-text">{{ $row->title }}</span>
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
                                                            <i class="uil uil-play-circle icon_142"></i>
                                                            <div class="top">
                                                                <div class="title">{{ $x->title }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <a href="/courses/stream/{{ $course->id }}/{{ $row->id }}/{{ $x->id }}" class="preview-text">View</a>
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
                            <div class="tab-pane fade" id="nav-reviews" role="tabpanel">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.other_footer')
</div>

@endsection
