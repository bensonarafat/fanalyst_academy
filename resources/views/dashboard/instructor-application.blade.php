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
                    <form action="{{ route('store.instructor.application') }}" enctype="multipart/form-data" method="post" id="instructor-application">
                        @csrf

                        @include("components.alert")

                        <div class="course_tabs_1">
                            <div id="add-instructor-tab" class="step-app">
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
                                        <a href="#tab_step3">
                                            <span class="number"></span>
                                            <span class="step-name">Payment Information</span>
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
                                                                    <input class="prompt srch_explore" type="file" name="photo" id="photo" required />
                                                                    <input type="hidden" name="photospan" value="{{ auth()->user()->photo }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mt-30 lbel25">
                                                                <label>Town</label>
                                                            </div>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="text" placeholder="Town" name="town" id="town" value="{{ auth()->user()->town }}" />
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
                                                                <label>City</label>
                                                            </div>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="text" placeholder="City" name="city" id="city" value="{{ auth()->user()->city }}" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mt-30 lbel25">
                                                                <label>Facebook URL</label>
                                                            </div>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="text" placeholder="Facebook URL" name="facebook_url" id="facebook_url" value="{{ auth()->user()->facebook_url }}" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mt-30 lbel25">
                                                                <label>Twitter URL</label>
                                                            </div>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="text" placeholder="Twitter URL" name="twitter_url" id="twitter_url" value="{{ auth()->user()->twitter_url }}" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mt-30 lbel25">
                                                                <label>Youtube URL</label>
                                                            </div>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="text" placeholder="Youtube URL" name="youtube_url" id="youtube_url" value="{{ auth()->user()->youtube_url }}" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mt-30 lbel25">
                                                                <label>Linkedin URL</label>
                                                            </div>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="text" placeholder="Linkedin URL" name="linkedin_url" id="linkedin_url" value="{{ auth()->user()->linkedin_url }}" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="ui search focus lbel25 mt-30">
                                                                <label>Address</label>
                                                                <div class="ui form swdh30">
                                                                    <div class="field">
                                                                        <textarea rows="3" name="address" id="address" required placeholder="">{{ auth()->user()->address }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                    <div class="step-tab-panel step-tab-gallery" id="tab_step2">
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title"><i class="uil uil-notebooks"></i>Professional Information</h3>
                                            </div>
                                            <div class="course__form">
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
                                                                <label>List your skills</label>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="text" placeholder="Skills" name="skills" id="skills" value="{{ auth()->user()->skills }}" required />
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
                                                            <div class="mt-30 lbel25">
                                                                <label>Current Employment title</label>
                                                            </div>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="text" placeholder="Current Employment title" name="employment_title" id="employment_title" value="{{ auth()->user()->employment_title }}" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mt-30 lbel25">
                                                                <label>Current Employment Company</label>
                                                            </div>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="text" placeholder="Current Employment Company" name="employment_company" id="employment_company" value="{{ auth()->user()->employment_company }}" required/>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-tab-panel step-tab-amenities" id="tab_step3">
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title"><i class="uil uil-usd-square"></i>Payment Information</h3>
                                            </div>
                                            <div class="course__form">
                                                <div class="general_info10">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="ui search focus mt-30 lbel25">
                                                                <label>Account Name</label>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="text" placeholder="Account Name" name="account_name" id="account_name" value="{{ auth()->user()->account_name }}" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="ui search focus mt-30 lbel25">
                                                                <label>Account Number</label>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="number" placeholder="Account Number" name="account_number" id="account_number" value="{{ auth()->user()->account_number }}" required/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="ui search focus mt-30 lbel25">
                                                                <label>Bank Name</label>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="text" placeholder="Bank Name" name="bank_name" id="bank_name" value="{{ auth()->user()->bank_name }}" required/>
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
                                            <div class="general_info10">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="ui search focus mt-30 lbel25">
                                                            <label>CV</label>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="file" name="cv" id="cv" />
                                                                <input type="hidden" name="cvspan" value="{{ auth()->user()->cv }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="ui search focus mt-30 lbel25">
                                                            <label>Certificate</label>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="file" name="certificate" id="certificate" />
                                                                <input type="hidden" name="certificatespan" value="{{ auth()->user()->certificate }}">
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
                                            <p>Please, make sure to review your application before submittion<br/> We will preview your documents and get back to you with 24 hours</p>
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
                </div>
            </div>
        </div>
    </div>
    @include("components.other_footer")
</div>
@endsection
