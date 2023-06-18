@extends('layouts.app')
@section('content')
@section('title', $question->name)
<form action="{{ route("store.quiz") }}" method="post">
    @csrf
    <div class="modal fade" id="add_lecture_model" tabindex="-1" aria-labelledby="lectureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lectureModalLabel">Add Lecture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="new-section-block">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="course-main-tabs">

                                    <div class="ui search focus lbel25 mt-10">
                                        <label>Question*</label>
                                        <div class="ui form swdh30">
                                            <div class="field">
                                                <textarea rows="3" name="question" class="" required id="question" placeholder="question here..."></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ui search focus mt-10 lbel25">
                                        <label>Option A*</label>
                                        <div class="ui left icon input swdh19">
                                            <input class="prompt srch_explore" type="text" placeholder="Option A" required name="a"  id="a" value="" />
                                        </div>
                                    </div>

                                    <div class="ui search focus mt-10 lbel25">
                                        <label>Option B*</label>
                                        <div class="ui left icon input swdh19">
                                            <input class="prompt srch_explore" type="text" placeholder="Option B here" required name="b" id="b" value="" />
                                        </div>
                                    </div>

                                    <div class="ui search focus mt-10 lbel25">
                                        <label>Option C*</label>
                                        <div class="ui left icon input swdh19">
                                            <input class="prompt srch_explore" type="text" placeholder="Option C here" required name="c" id="c" value="" />
                                        </div>
                                    </div>

                                    <div class="ui search focus mt-10 lbel25">
                                        <label>Option D</label>
                                        <div class="ui left icon input swdh19">
                                            <input class="prompt srch_explore" type="text" placeholder="Option D here" name="d" id="d" value="" />
                                        </div>
                                    </div>

                                    <div class="ui search focus mt-10 lbel25">
                                        <label>Option E</label>
                                        <div class="ui left icon input swdh19">
                                            <input class="prompt srch_explore" type="text" placeholder="Option E here" name="e" id="e" value="" />
                                        </div>
                                    </div>

                                    <div class="ui search focus mt-10 lbel25">
                                        <div class="mt-30 lbel25">
                                            <label>Answer*</label>
                                        </div>
                                        <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="answer" id="answer" required>
                                            <option value="">Select answer</option>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                            <option value="e">E</option>
                                        </select>
                                    </div>

                                    <div class="ui search focus lbel25 mt-10">
                                        <label>Explanation*</label>
                                        <div class="ui form swdh30">
                                            <div class="field">
                                                <textarea rows="3" name="explanation" class="" id="explanation" placeholder="Explanation here..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="topicid" id="topicid" value="{{ $topic->id }}">
                    <input type="hidden" name="qid" id="qid" value="{{ $question->id }}">
                    <button type="button" class="main-btn cancel" data-dismiss="modal">Close</button>
                    <button type="submit" class="main-btn">Add Question</button>
                </div>
            </div>
        </div>
    </div>
</form>


<div class="wrapper _bg4586 @guest _new89 @endguest">
    <div class="_215b01">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section3125">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-5 col-md-6">
                                <div class="preview_video">
                                    <a href="#" class="fcrse_img">
                                        <img style="height:200px;object-fit:cover;" src="@if($question->image) {{ asset($question->image) }} @else {{ asset('assets/images/courses/img-2.jpg') }} @endif" alt="{{ $question->name }}" />
                                    </a>
                                </div>

                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-6">

                                @include('components.alert')

                                <div class="_215b03">
                                    <h2>{{ $question->name }}</h2>
                                </div>

                                <div class="_215b05">
                                    {{ $totalenrolled }} students enrolled
                                </div>

                                <div class="_215b05">
                                    Last updated {{ \Carbon\Carbon::parse($question->updated_at)->format('d M, Y') }}
                                </div>
                                @auth
                                    @if(auth()->user()->id != $question->userid)
                                    <ul class="_215b31">
                                        @if(!$iquizenrolled)
                                            @if($question->isfree)
                                                <li>
                                                    <form action="{{ route('enroll.free') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="type" value="quiz">
                                                        <input type="hidden" name="id" value="{{ $question->id }}">
                                                        <button type="submit" class="btn_adcart">Enroll for Free</button>
                                                    </form>
                                                </li>
                                            @else
                                                <li>
                                                    @if(inCart($question->id, "quiz"))
                                                    <form action="{{ route('remove.cart') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $question->id }}">
                                                        <input type="hidden" name="type" value="quiz">
                                                        <button class="btn_adcart">Remove from Cart ({!! naira() . number_format($question->price, 2) !!}) </button>
                                                    </form>
                                                    @else
                                                    <form action="{{ route('add.cart') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $question->id }}">
                                                        <input type="hidden" name="type" value="quiz">
                                                        <button class="btn_adcart">Add to Cart ({!! naira() . number_format($question->price, 2) !!}) </button>
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
                                            @if($question->isfree)

                                            <li>
                                                <button type="submit" class="btn_adcart"> Free</button>
                                            </li>
                                            @else
                                                <li><button class="btn_adcart">{!! naira() . number_format($question->price, 2) !!}</button></li>
                                            @endif
                                        </ul>
                                    @endif
                                @endauth

                                @guest
                                    <ul class="_215b31">
                                        @if(!$iquizenrolled)
                                            @if($question->isfree)
                                                <li>
                                                    <form action="{{ route('enroll.free') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="type" value="quiz">
                                                        <input type="hidden" name="id" value="{{ $question->id }}">
                                                        <button type="submit" class="btn_adcart">Enroll for Free</button>
                                                    </form>
                                                </li>
                                            @else
                                                <li>
                                                    @if(inCart($question->id, "quiz"))
                                                    <form action="{{ route('remove.cart') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $question->id }}">
                                                        <input type="hidden" name="type" value="quiz">
                                                        <button class="btn_adcart">Remove from Cart ({!! naira() . number_format($question->price, 2) !!}) </button>
                                                    </form>
                                                    @else
                                                    <form action="{{ route('add.cart') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $question->id }}">
                                                        <input type="hidden" name="type" value="quiz">
                                                        <button class="btn_adcart">Add to Cart ({!! naira() . number_format($question->price, 2) !!}) </button>
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
                        @if(auth()->user()->id != $question->userid)
                            <div class="user_dt5">
                                <div class="user_dt_left">
                                    <div class="live_user_dt">
                                        <div class="user_img5">
                                            <a href="{{ route('view.user', $question->userid) }}"><img src="@if($instructor->photo) {{ asset($instructor->photo) }} @else {{ asset('assets/images/left-imgs/img-1.jpg') }} @endif" alt="" /></a>
                                        </div>
                                        <div class="user_cntnt">
                                            <a href="{{ route('view.user', $instructor->id) }}" class="_df7852">{{ $instructor->fullname }}</a>
                                            <button class="subscribe-btn">View Profile</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="user_dt_right">
                                    <ul>
                                        <li>
                                            <a href="#" class="lkcm152"><i class="uil uil-eye"></i><span>{{ $totalenrolled }}</span></a>
                                        </li>
                                        <li>
                                            <a href="/quiz/like-quiz/{{$question->id}}/{{ $like }}" class="lkcm152"><i class="uil uil-thumbs-up"></i><span>{{ $question->likes }}</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endauth

                    @guest
                        <div class="user_dt5">
                            <div class="user_dt_left">
                                <div class="live_user_dt">
                                    <div class="user_img5">
                                        <a href="{{ route('view.user', $question->userid) }}"><img src="@if($instructor->photo) {{ asset($instructor->photo) }} @else {{ asset('assets/images/left-imgs/img-1.jpg') }} @endif" alt="" /></a>
                                    </div>
                                    <div class="user_cntnt">
                                        <a href="{{ route('view.user', $instructor->id) }}" class="_df7852">{{ $instructor->fullname }}</a>
                                        <button class="subscribe-btn">View Profile</button>
                                    </div>
                                </div>
                            </div>
                            <div class="user_dt_right">
                                <ul>
                                    <li>
                                        <a href="#" class="lkcm152"><i class="uil uil-eye"></i><span>{{ $totalenrolled }}</span></a>
                                    </li>
                                    <li>
                                        <a href="/quiz/like-quiz/{{$question->id}}/{{ $like }}" class="lkcm152"><i class="uil uil-thumbs-up"></i><span>{{ $question->likes }}</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endguest

                    <div class="course_tabs">
                        <nav>
                            <div class="nav nav-tabs tab_crse justify-content-center" id="nav-tab" role="tablist">
                                @auth @if(auth()->user()->id == $question->userid) <a class="nav-item nav-link @if(auth()->user()->id == $question->userid) active @endif" id="nav-about-tab" data-toggle="tab" href="#nav-curriculum" role="tab" aria-selected="true">Add Quiz</a> @endif @endauth
                                <a class="nav-item nav-link  @auth   @if(auth()->user()->id != $question->userid) active @endif @endauth @guest active @endguest" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-selected="false">About</a>
                                <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-courses" role="tab" aria-selected="false">Quiz</a>
                                <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-enrolled" role="tab" aria-selected="false">Student Enrolled</a>
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
                            <div class="tab-pane fade @auth @if(auth()->user()->id == $question->userid) show active @endif @endauth" id="nav-curriculum" role="tabpanel">
                                <div class="_htg451">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card_dash1">
                                                <div class="card_dash_left1">
                                                    <i class="uil uil-book-alt"></i>
                                                    <h1>Jump Into Quiz Creation</h1>
                                                </div>
                                                <div class="card_dash_right1">
                                                    <button class="create_btn_dash" data-toggle="modal" data-target="#add_lecture_model">Create New Question</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">

                                            <table class="table ucp-table">
                                                <thead class="thead-s">
                                                    <tr>
                                                        <th scope="col">SN.</th>
                                                        <th>Question</th>
                                                        <th>Answer</th>
                                                        <th>Created</th>
                                                        <th class="text-center" scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($quiz as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $row->question }}</td>
                                                        <td>{{ strtoupper($row->answer_option) }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</td>
                                                        <td class="text-center">
                                                            <a href="{{ route("edit.quiz", $row->id) }}" title="Edit" class="gray-s"><i class="uil uil-edit-alt"></i></a>
                                                            <a href="{{ route("delete.quiz", $row->id) }}" title="Delete" class="gray-s"><i class="uil uil-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade @auth @if(auth()->user()->id != $question->userid) show active  @endif @endauth @guest show active @endguest" id="nav-about" role="tabpanel">
                                <div class="_htg451">
                                    <div class="_htg452 mt-35">
                                        <h3>Description</h3>
                                        {!! $question->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-courses" role="tabpanel">

                                <div class="row question__content">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="certi_form">
                                            <div class="test_timer_bg">
                                                <ul class="test_timer_left">
                                                    <li>
                                                        <div class="timer_time">
                                                            <h4 class="question__total">{{ count($quiz) }}</h4>
                                                            <p>Questions</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="timer_time">
                                                            <h4>{{ $question->time }}:00</h4>
                                                            <p>Minutes</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="test_timer_bg">
                                                <div style="text-align: center;padding:15px 5px;">
                                                    <h2>Start Quiz</h2>
                                                    @if($iquizenrolled)
                                                        <a href="{{ route('start.test', $question->id) }}" class="upload_btn" title="Start Quiz">Start Quiz</a>
                                                    @else
                                                    <a href="#" class="upload_btn" title="Enroll Quiz">You need to enrol for the quiz</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
