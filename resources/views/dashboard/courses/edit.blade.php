@extends('layouts.app')
@section('title','Edit Course')
@section('content')


<div class="wrapper">
    <div class="sa4d25">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-analysis"></i> Update Course</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @include('components.alert')
                    <form action="{{ route('update.course') }}" enctype="multipart/form-data" id="course-submittion" method="post">
                        @csrf
                        <div class="course_tabs_1">
                            <div id="add-course-tab" class="step-app add-course-tab2">
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
                                            <span class="step-name">Media</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_step3">
                                            <span class="number"></span>
                                            <span class="step-name">Price</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_step4">
                                            <span class="number"></span>
                                            <span class="step-name">Continue</span>
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
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="ui search focus mt-30 lbel25">
                                                                <label>Course Title*</label>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="text" placeholder="Course title here" required name="title" data-purpose="edit-course-title" maxlength="60" id="main[title]" value="{{ $course->title }}" />
                                                                </div>
                                                                <div class="help-block">(Please make this a maximum of 100 characters and unique.)</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="ui search focus lbel25 mt-30">
                                                                <label>Short Description*</label>
                                                                <div class="ui form swdh30">
                                                                    <div class="field">
                                                                        <textarea rows="3" name="short_description" id="" required placeholder="Short description here...">{{ $course->short_description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="help-block">220 words</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="course_des_textarea mt-30 lbel25">
                                                                <label>Course Description*</label>
                                                                <div class="ui form swdh30">
                                                                    <div class="field">
                                                                        <textarea id="myeditorinstance" name="description" required>{{ $course->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="ui search focus lbel25 mt-30">
                                                                <label>What will students learn in your course?*</label>
                                                                <div class="ui form swdh30">
                                                                    <div class="field">
                                                                        <textarea rows="3" name="will_learn" id="will_learn" required placeholder="">{{ $course->will_learn }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="help-block">Student will gain this skills, knowledge after completing this course. (One per line).</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="ui search focus lbel25 mt-30">
                                                                <label>Requirements*</label>
                                                                <div class="ui form swdh30">
                                                                    <div class="field">
                                                                        <textarea rows="3" name="prerequisites" id="prerequisites" required placeholder="">{{ $course->prerequisites }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="help-block">What knowledge, technology, tools required by users to start this course. (One per line).</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-6">
                                                            <div class="mt-30 lbel25">
                                                                <label>Course Category*</label>
                                                            </div>
                                                            <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="category" required>
                                                                <option value="">Select category</option>
                                                                @foreach ($categories as $row)
                                                                    <option value="{{ $row->id }}" @if($row->id == $course->category) selected @endif>{{ $row->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-tab-panel step-tab-location" id="tab_step2">
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title"><i class="uil uil-image"></i>Media</h3>
                                            </div>
                                            <div class="lecture-video-dt mb-30">
                                                <span class="video-info">Intro Course overview provider type. (.mp4, YouTube)</span>
                                                <div class="video-category">
                                                    <label><input type="radio" name="courseMediaType" value="mp4" checked /><span>HTML5(mp4)</span></label>
                                                    <label><input type="radio" name="courseMediaType" value="url" /><span>External URL</span></label>
                                                    <label><input type="radio" name="courseMediaType" value="youtube" /><span>YouTube</span></label>
                                                    <div class="mp4 intro-box" style="display: block;">
                                                        <div class="row">
                                                            <div class="col-lg-5 col-md-12">
                                                                <label for="">Video (mp4)</label><br/>
                                                                <input type="file" accept="video/mp4,video/x-m4v,video/*" name="courseVideo" id="courseVideo" class="courseVideo"/>
                                                                <input type="hidden" name="courseVideoSpan" value="{{ $course->media_video }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="url intro-box">
                                                        <div class="new-section">
                                                            <div class="ui search focus mt-30 lbel25">
                                                                <label>External URL*</label>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="text" placeholder="External Video URL" name="courseURL" id="courseURL" value="{{ $course->media_video }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="youtube intro-box">
                                                        <div class="new-section">
                                                            <div class="ui search focus mt-30 lbel25">
                                                                <label>Youtube URL*</label>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="text" placeholder="Youtube Video URL" name="courseYoutube" id="courseYoutube" value="{{ $course->media_video }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="thumbnail-into">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-6">
                                                        <label class="label25 text-left">Course thumbnail*</label>
                                                        <div class="thumb-item">
                                                            <label for="">Thumbnail (jpg,png)</label> <br/>
                                                            <input type="file" accept="image/*" name="courseThumbnail" id="courseThumbnail" class="courseThumbnail"/>
                                                            <input type="hidden" name="courseThumbnailSpan" value="{{ $course->media_thumbnail }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-tab-panel step-tab-amenities" id="tab_step3">
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title"><i class="uil uil-usd-square"></i>Price</h3>
                                            </div>
                                            <div class="course__form">
                                                <div class="price-block">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="course-main-tabs">
                                                                <div class="price-require-dt">
                                                                    <div class="cogs-toggle mb-20">
                                                                        <label class="switch">
                                                                            <input type="checkbox" name="is_free" id="is_free" value="" @if($course->is_free) checked @endif />
                                                                            <span></span>
                                                                        </label>
                                                                        <label for="require_login" class="lbl-quiz">Course is Paid</label>
                                                                    </div>
                                                                    <div class="cogs-toggle cogs-togglex @if($course->is_free) x-hidden @else @endif">
                                                                        <label class="switch">
                                                                            <input type="checkbox" id="require_login"  @if($course->require_login) checked @endif  value="" name="require_login" />
                                                                            <span></span>
                                                                        </label>
                                                                        <label for="require_login" class="lbl-quiz">Require Log In</label>
                                                                    </div>
                                                                    <div class="cogs-toggle cogs-togglex mt-3 @if($course->is_free) x-hidden @else @endif">
                                                                        <label class="switch">
                                                                            <input type="checkbox" id="require_enroll" @if($course->require_enroll) checked @endif value="" name="require_enroll" />
                                                                            <span></span>
                                                                        </label>
                                                                        <label for="require_enroll" class="lbl-quiz">Require Enroll</label>
                                                                    </div>
                                                                    <p class="cogs-togglex @if($course->is_free) @else x-hidden @endif">
                                                                        If the course is free, if student require to enroll your course, if not required enroll, if students required sign in to your website to take this course.
                                                                    </p>
                                                                </div>

                                                                <div class="cogs-togglec @if($course->is_free) @else x-hidden @endif">
                                                                    <div class="license_pricing mt-30">
                                                                        <label class="label25">Regular Price*</label>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                                                <div class="loc_group">
                                                                                    <div class="ui left icon input swdh19">
                                                                                        <input class="prompt srch_explore" type="number" placeholder="&#8358;0" name="amount" id="amount" vale="{{ $course->amount }}" />
                                                                                    </div>
                                                                                    <span class="slry-dt">&#8358;</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="license_pricing mt-30 mb-30">
                                                                        <label class="label25">Discount Price</label>
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                                                <div class="loc_group">
                                                                                    <div class="ui left icon input swdh19">
                                                                                        <input class="prompt srch_explore" type="number" placeholder="&#8358;0" name="discount" id="discount" value="{{ $course->discount }}" />
                                                                                    </div>
                                                                                    <span class="slry-dt">&#8358;</span>
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
                                    <div class="step-tab-panel step-tab-location" id="tab_step4">
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title"><i class="uil uil-upload"></i>Submit</h3>
                                            </div>
                                        </div>
                                        <div class="publish-block">
                                            <i class="far fa-edit"></i>
                                            <p>Your course is in a draft state. You will move to a next section to create curriculum. Students cannot view, purchase or enroll in this course. For students that are already enrolled, this course will not appear on their student Dashboard.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-footer step-tab-pager">
                                    <button data-direction="prev" class="btn btn-default steps_btn">PREVIOUS</button>
                                    <button data-direction="next" class="btn btn-default steps_btn">Next</button>
                                    <input type="hidden" name="id" value="{{ $course->id }}">
                                    <button data-direction="finish" style="submit" class="btn btn-default steps_btn">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.main_footer')
</div>

<script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
<script>
    $('#is_free').on('change', function(){
        if($(this).is(':checked')){
            $('.cogs-togglex').addClass('x-hidden');
            $('.cogs-togglec').removeClass('x-hidden');
        }else{
            $('.cogs-togglex').removeClass('x-hidden');
            $('.cogs-togglec').addClass('x-hidden');
        }
    });
</script>

@endsection
