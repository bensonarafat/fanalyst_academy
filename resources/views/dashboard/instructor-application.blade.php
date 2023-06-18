@extends('layouts.app')
@section('title', 'Instructor Application')
@section('content')



<div class="wrapper">
    <div class="sa4d25">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-analysis"></i> Instructor Application</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if(auth()->user()->instructor_status == "unapplied")
                    <form action="{{ route('store.instructor.application') }}" enctype="multipart/form-data" method="post" id="instructor-application">
                        @csrf

                        @include("components.alert")

                        <div class="course_tabs_1">
                            <div id="add-course-tab" class="step-app add-instructor-tab">
                                <ul class="step-steps">
                                    <li class="active">
                                        <a href="#tab_step1">
                                            <span class="number"></span>
                                            <span class="step-name">Basic</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_step2">
                                            <span class="number"></span>
                                            <span class="step-name">Professional Information</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#tab_step4">
                                            <span class="number"></span>
                                            <span class="step-name">Documents</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_step5">
                                            <span class="number"></span>
                                            <span class="step-name">Complete</span>
                                        </a>
                                    </li>

                                </ul>
                                <div class="step-content">
                                    <div class="step-tab-panel step-tab-info active" id="tab_step1">
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title"><i class="uil uil-info-circle"></i>Basic Information</h3>
                                            </div>
                                            <div class="course__form">
                                                <div class="container">
                                                    <div class="general_info10">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>Full Name</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore" type="text" placeholder="Full Name" name="fullname" maxlength="60" id="fullname" value="{{ auth()->user()->fullname }}" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>Telephone</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore" type="tel" placeholder="Telephone" name="mobile" id="mobile" value="{{ auth()->user()->mobile }}" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="mt-30 lbel25">
                                                                    <label>Gender</label>
                                                                </div>
                                                                <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="gender" required>
                                                                    <option value="">Select gender</option>
                                                                    <option value="male" @if(auth()->user()->gender == 'male') selected @endif>Male</option>
                                                                    <option value="female" @if(auth()->user()->gender == 'female') selected @endif>Female</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>Photo</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore" type="file" name="photo" id="photo" />
                                                                        <input type="hidden" name="photospan" value="{{ auth()->user()->photo }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="mt-30 lbel25">
                                                                    <label>Date of Birth</label>
                                                                </div>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="date" placeholder="Date of Birth" name="dob" id="dob" value="{{ auth()->user()->dob }}" required/>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="mt-30 lbel25">
                                                                    <label>Email</label>
                                                                </div>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="email" readonly placeholder="email" name="email" id="email" value="{{ auth()->user()->email }}" required/>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="mt-30 lbel25">
                                                                    <label>Address</label>
                                                                </div>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="address" placeholder="address" name="address" id="address" value="{{ auth()->user()->address }}" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-tab-panel step-tab-gallery" id="tab_step2">
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title"><i class="uil uil-notebooks"></i>Professional Information</h3>
                                            </div>
                                            <div class="course__form">
                                                <div class="container">
                                                    <div class="general_info10">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>Job Title</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore" type="text" placeholder="Title" name="job_title" id="Job title" value="{{ auth()->user()->job_title }}" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>CV/Resume/Profile</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore" type="file" name="cv" id="cv" />
                                                                        <input type="hidden" name="cvspan" value="{{ auth()->user()->cv }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>Name of Hightest Education School</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore" type="text" placeholder="Name of Hightest Education School" name="school_name" id="school_name" required value="{{ auth()->user()->school_name }}" />
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="mt-30 lbel25">
                                                                    <label>Degree</label>
                                                                </div>
                                                                <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="degree" required>
                                                                    <option value="">Select degree</option>
                                                                    <option value="Basic Education" @if(auth()->user()->degree == 'Basic Education') selected @endif>Basic Education (Primary and Junior Secondary School)</option>
                                                                    <option value="SSCE" @if(auth()->user()->degree == 'SSCE') selected @endif>Senior Secondary School Certificate (SSCE)</option>
                                                                    <option value="NCE" @if(auth()->user()->degree == 'NCE') selected @endif>National Certificate of Education (NCE)</option>
                                                                    <option value="HND" @if(auth()->user()->degree == 'HND') selected @endif>Higher National Diploma (HND)</option>
                                                                    <option value="Bsc" @if(auth()->user()->degree == 'Bsc') selected @endif>Bachelor's Degree</option>
                                                                    <option value="MSc" @if(auth()->user()->degree == 'MSc') selected @endif>Master's Degree</option>
                                                                    <option value="PhD" @if(auth()->user()->degree == 'PhD') selected @endif>Doctor of Philosophy (Ph.D.)</option>
                                                                    <option value="Others" @if(auth()->user()->degree == 'Others') selected @endif>Others</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="ui search focus lbel25 mt-30">
                                                                    <label>About me</label>
                                                                    <div class="ui form swdh30">
                                                                        <div class="field">
                                                                            <textarea rows="3" name="about_me" id="" required placeholder="">{{ auth()->user()->about_me }}</textarea>
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

                                    <div class="step-tab-panel step-tab-location" id="tab_step4">
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title"><i class="uil uil-upload"></i>Documents</h3>
                                            </div>
                                        </div>
                                        <div class="course__form">
                                            <div class="container">
                                                <div class="general_info10">
                                                    <div class="row">

                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="ui search focus mt-30 lbel25">
                                                                <label>Sample Lecture Video <i><span>(max size 20mb)</span></i></label>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="file" name="sample_video" id="sample_video" />
                                                                    <input type="hidden" name="sample_videospan" value="{{ auth()->user()->sample_video }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-tab-panel step-tab-location" id="tab_step5">
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title"><i class="uil uil-upload"></i>Submit</h3>
                                            </div>
                                        </div>
                                        <div class="publish-block">
                                            <i class="uil uil-upload"></i>
                                            <p>
                                                Thank you for your application. Please review carefully before submission.<br/>  We will respond within 24 hours.
                                            </p>
                                        </div>
                                        <div class="ui form mt-30 checkbox_sign">
                                            <div class="inline field">
                                                <div class="ui checkbox mncheck">
                                                    <input type="checkbox" tabindex="0" class="hidden" name="agree" checked required/>
                                                    <label>By clicking the “I agree” button, you acknowledge that you have read and agree to this</label> <a href="{{ route("instructor.agreement") }}">terms and conditions.</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-footer step-tab-pager">
                                    <button data-direction="prev" class="btn btn-default steps_btn">PREVIOUS</button>
                                    <button data-direction="next" class="btn btn-default steps_btn">Next</button>
                                    <button data-direction="finish" class="btn btn-default steps_btn">Submit for Review</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @else
                    <div class="fcrse_3">
                        <div class="cater_ttle">
                            <h4>Application Status</h4>
                        </div>
                        <div class="live_text">
                            <div class="live_icon"><i class="uil uil-kayak"></i></div>
                            <div class="live-content">
                                @if(auth()->user()->instructor_status == "pending")
                                    <p>Your application is under review. We will approve immediately if it pass all our terms and conditions. But contact us if exceed 48 hours</p>
                                @else
                                    <p>After carefully reviewing your application. It seem there have been some issue with your application. Contact us for more details.</p>
                                @endif
                                <button class="live_link" onclick="window.location.href = 'mailto:support@fanalystacademy.org';">Contact Us</button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include("components.footer")
</div>
@endsection
