@extends('layouts.app')
@section('content')
@section('title', $user->fullname)


@include("components.messagemodel", ['id' => $user->id])
@include("components.withdrawal", ['id' => $user->id])


<div class="wrapper _bg4586">
    <div class="_216b01">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="section3125 rpt145">

                        @include('components.alert')

                        <div class="row">
                            <div class="col-lg-7">

                                <div class="dp_dt150">
                                    <div class="img148">
                                        <img src="@if($user->photo) {{ asset($user->photo) }} @else {{ asset('assets/images/hd_dp.jpg') }} @endif" alt="{{ auth()->user()->fullname }}" />
                                    </div>
                                    <div class="prfledt1">
                                        <h2>{{ $user->fullname }}</h2> {!! UserStatus($user->status) !!}
                                        <span>{{ ucfirst($user->type) }}</span> <br/> <br/>
                                        @if($user->job_title) <span>{{ $user->job_title }}</span> @endif
                                        <br/>
                                        <button class="subscribe-btn" data-toggle="modal" data-target="#startMessage">Start Message</button>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">

                                <div class="rgt-145">
                                    <ul class="tutor_social_links">
                                        <li>
                                            <a href="{{ $user->facebook_url }}" target="_blank" class="fb"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $user->twitter_url }}" target="_blank" class="tw"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $user->linkedin_url }}" target="_blank" class="ln"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $user->youtube_url }}" target="_blank" class="yu"><i class="fab fa-youtube"></i></a>
                                        </li>
                                    </ul>
                                </div>

                                @if(auth()->user()->type == 'admin')
                                    <div class="_bty149" style="width:70%;float:right;">
                                        @if($user->instructor_status == 'pending')
                                            <form action="{{ route('update.instructor.status') }}" method="post">
                                                @csrf
                                                <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="status">
                                                    <option value="">Select option</option>
                                                    <option value="pending" @if($user->instructor_status == 'pending') selected @endif>Pending</option>
                                                    <option value="approved" @if($user->instructor_status == 'approved') selected @endif>Approved</option>
                                                    <option value="declined" @if($user->instructor_status == 'declined') selected @endif>Declined</option>
                                                </select>
                                                <br/>
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button class="subscribe-btn btn500" style="width:100%;margin-top:10px;">Update Status</button>
                                            </form>
                                        @endif

                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="_215b15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course_tabs">
                        <nav>
                            <div class="nav nav-tabs tab_crse" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-personal-tab" data-toggle="tab" href="#nav-personal" role="tab" aria-selected="true">Basic Information</a>
                                @if($user->type == 'instructor' || $user->instructor_status == 'pending') <a class="nav-item nav-link" id="nav-professional-tab" data-toggle="tab" href="#nav-professional" role="tab" aria-selected="false">Professional Information</a> @endif
                                @if(auth()->user()->type ==  'admin' || auth()->user()->type == 'instructor')
                                    @if($user->type == 'instructor' || $user->instructor_status == 'pending')<a class="nav-item nav-link" id="nav-documents-tab" data-toggle="tab" href="#nav-documents" role="tab" aria-selected="false">Documents</a> @endif
                                    @if($user->type == 'instructor' || $user->instructor_status == 'pending')<a class="nav-item nav-link" id="nav-payment-tab" data-toggle="tab" href="#nav-payment" role="tab" aria-selected="false">Payment Information</a> @endif
                                    @if($user->type == 'instructor' || $user->instructor_status == 'pending')<a class="nav-item nav-link" id="nav-earnings-tab" data-toggle="tab" href="#nav-earnings" role="tab" aria-selected="false">Earnings</a> @endif
                                @endif
                                <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-courses" role="tab" aria-selected="false">Courses</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="_215b17">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course_tab_content">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-personal" role="tabpanel">
                                <div class="">
                                    <div class="general_info10">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="ui search focus mt-30 lbel25">
                                                    <label>Full Name</label>
                                                    <div class="ui left icon input swdh19">
                                                        <input class="prompt srch_explore" type="text" readonly placeholder="Full Name" name="fullname" maxlength="60" id="fullname" value="{{ $user->fullname }}" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="ui search focus mt-30 lbel25">
                                                    <label>Telephone</label>
                                                    <div class="ui left icon input swdh19">
                                                        <input class="prompt srch_explore" type="tel" readonly placeholder="Telephone" name="mobile" id="mobile" value="{{ $user->mobile }}" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="mt-30 lbel25">
                                                    <label>Gender</label>
                                                </div>
                                                <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="gender" readonly required>
                                                    <option value="">Select gender</option>
                                                    <option value="male" @if($user->gender == 'male') selected @endif>Male</option>
                                                    <option value="female" @if($user->gender == 'female') selected @endif>Female</option>
                                                </select>
                                            </div>


                                            <div class="col-lg-6 col-md-12">
                                                <div class="mt-30 lbel25">
                                                    <label>Date of Birth</label>
                                                </div>
                                                <div class="ui left icon input swdh19">
                                                    <input class="prompt srch_explore" type="date" placeholder="Date of Birth" name="dob" id="dob" value="{{ $user->dob }}" required readonly/>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="mt-30 lbel25">
                                                    <label>Email</label>
                                                </div>
                                                <div class="ui left icon input swdh19">
                                                    <input class="prompt srch_explore" type="email" readonly placeholder="email" name="email" id="email" value="{{ $user->email }}" required readonly/>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="ui search focus lbel25 mt-30">
                                                    <label>Address</label>
                                                    <div class="ui form swdh30">
                                                        <div class="field">
                                                            <textarea rows="3" name="address" id="address" required placeholder="" readonly>{{ $user->address }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="ui search focus lbel25 mt-30">
                                                    <label>About me</label>
                                                    <div class="ui form swdh30">
                                                        <div class="field">
                                                            <textarea rows="3" name="about_me" id="" required placeholder="" readonly>{{ $user->about_me }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-professional" role="tabpanel">
                                <div class="_htg451">
                                    <div class="general_info10">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="ui search focus mt-30 lbel25">
                                                    <label>Job Title</label>
                                                    <div class="ui left icon input swdh19">
                                                        <input class="prompt srch_explore" type="text" placeholder="Title" name="job_title" id="Job title" value="{{ $user->job_title }}" required readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="ui search focus mt-30 lbel25">
                                                    <label>CV/Resume/Profile</label>
                                                    <div class="ui left icon input swdh19">
                                                        <input class="prompt srch_explore" type="text" placeholder="Skills" name="skills" id="skills" value="{{ $user->skills }}" required readonly/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="ui search focus mt-30 lbel25">
                                                    <label>Name of Hightest Education School</label>
                                                    <div class="ui left icon input swdh19">
                                                        <input class="prompt srch_explore" type="text" placeholder="Name of Hightest Education School" name="school_name" id="school_name" required value="{{ $user->school_name }}" readonly />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="mt-30 lbel25">
                                                    <label>Degree</label>
                                                </div>
                                                <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="degree" required readonly>
                                                    <option value="">Select degree</option>
                                                    <option value="Basic Education" @if($user->degree == 'Basic Education') selected @endif>Basic Education (Primary and Junior Secondary School)</option>
                                                    <option value="SSCE" @if($user->degree == 'SSCE') selected @endif>Senior Secondary School Certificate (SSCE)</option>
                                                    <option value="NCE" @if($user->degree == 'NCE') selected @endif>National Certificate of Education (NCE)</option>
                                                    <option value="HND" @if($user->degree == 'HND') selected @endif>Higher National Diploma (HND)</option>
                                                    <option value="Bsc" @if($user->degree == 'Bsc') selected @endif>Bachelor's Degree</option>
                                                    <option value="MSc" @if($user->degree == 'MSc') selected @endif>Master's Degree</option>
                                                    <option value="PhD" @if($user->degree == 'PhD') selected @endif>Doctor of Philosophy (Ph.D.)</option>
                                                    <option value="Others" @if($user->degree == 'Others') selected @endif>Others</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-documents" role="tabpanel">
                                <div class="_htg451">
                                    <div class="tpc152">
                                        <div class="">
                                        <h3>Download Documents</h3>
                                    </div>
                                    <div class="section3126 mt-20">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ asset($user->cv) }}" download class="value_props50">
                                                    <div class="value_icon">
                                                        <i class="uil uil-wallet"></i>
                                                    </div>
                                                    <div class="value_content">
                                                        <h4>CV/Profile</h4>
                                                        <i class="uil uil-download-alt" style="font-size: 30px;"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{ asset($user->sample_video) }}" download class="value_props50">
                                                    <div class="value_icon">
                                                        <i class="uil uil-megaphone"></i>
                                                    </div>
                                                    <div class="value_content">
                                                        <h4>Sample video</h4>
                                                        <i class="uil uil-download-alt" style="font-size: 30px;"></i>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-payment" role="tabpanel">
                                <div class="_htg451">
                                    <div class="general_info10">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="ui search focus mt-30 lbel25">
                                                    <label>Account Name</label>
                                                    <div class="ui left icon input swdh19">
                                                        <input class="prompt srch_explore" type="text" placeholder="Account Name" name="account_name" id="account_name" value="{{ $user->account_name }}" required readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="ui search focus mt-30 lbel25">
                                                    <label>Account Number</label>
                                                    <div class="ui left icon input swdh19">
                                                        <input class="prompt srch_explore" type="number" placeholder="Account Number" name="account_number" id="account_number" value="{{ $user->account_number }}" required readonly/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="ui search focus mt-30 lbel25">
                                                    <label>Bank Name</label>
                                                    <div class="ui left icon input swdh19">
                                                        <input class="prompt srch_explore" type="text" placeholder="Bank Name" name="bank_name" id="bank_name" value="{{ $user->bank_name }}" required readonly/>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-earnings" role="tabpanel">
                                <div class="_htg451">
                                    <div class="general_info10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="earning_steps">
                                                    <p>Sales earnings, after {{ config("app.name") }} fees</p>
                                                    <h2>{!! naira() !!} {{ number_format($total_earns, 2) }}</h2>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="earning_steps">
                                                    <p>Your balance:</p>
                                                    <h2>{!! naira() !!} {{ number_format($wallet->balance, 2) }}</h2>
                                                    <a href="javascript:void(0)" class="subscribe-btn" data-toggle="modal" data-target="#withdrawal_model">Withdraw Amount</a>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="table-responsive mt-30">
                                                    <table class="table ucp-table earning__table">
                                                        <thead class="thead-s">
                                                            <tr>
                                                                <th scope="col">Date</th>
                                                                <th scope="col">Type</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Gross Earnings</th>
                                                                <th scope="col">Net Earnings</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($earnings as $row)
                                                            @php
                                                                if($row->type == "quiz"){
                                                                    $question = App\Models\Question::find($row->questionid);
                                                                    $name = $question->name;
                                                                    $price = naira() . number_format($question->price, 2);
                                                                }elseif($row->type== "course"){
                                                                    $course = App\Models\Course::find($row->courseid);
                                                                    $name = $course->title;
                                                                    $price = naira() . number_format(floatval($course->amount) - floatval($course->discount), 2);
                                                                }else{
                                                                    $name = "Withdrawal";
                                                                    $price = "--";
                                                                }
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $row->created_at->format("Y, m d") }}</td>
                                                                <td>{{ ucfirst($row->type) }}</td>
                                                                <td>{{ $name }}</td>
                                                                <td>{!! $price !!}</td>
                                                                <td>{!! naira() . number_format($row->amount, 2) !!}</td>
                                                            </tr>
                                                            @endforeach


                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-courses" role="tabpanel">
                                <div class="crse_content">
                                    <h3>My courses ({{  count($courses) }})</h3>
                                    <div class="_14d25">
                                        <div class="row">
                                            @foreach ($courses as $row)
                                            @php
                                                if(auth()->user()->type == 'student'){
                                                    $course = \App\Models\Course::find($row->courseid);
                                                    $user = \App\Models\User::find($course->instructor);
                                                    $row = $course;
                                                }else{
                                                    $user = \App\Models\User::find($row->instructor);
                                                }
                                            @endphp
                                                <div class="col-lg-3 col-md-4">
                                                    <div class="fcrse_1 mt-30">
                                                        <a href="{{ route('view.course', $row->id) }}" class="fcrse_img">
                                                            <img src="{{ asset($row->media_thumbnail) }}" style="width:100%;height:150px;object-fit:cover;" alt="" />
                                                            <div class="course-overlay">

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
            </div>
        </div>
    </div>

    @include("components.footer")
</div>

@endsection
