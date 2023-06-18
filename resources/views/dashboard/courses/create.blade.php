@extends('layouts.app')
@section('title', 'Create Course')
@section('content')


<div class="wrapper">
    <div class="sa4d25">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-analysis"></i> Create New Course</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">

                    <form action="{{ route('store.course') }}" enctype="multipart/form-data" id="course-submittion" method="post">
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
                                 {{-- error --}}
                                <div class="alert alert-danger alert-dismissible x-hidden js_display_error" role="alert">
                                    <strong>Error!</strong> Opps Something went wrong
                                    <div class="error_append"></div>
                                </div>
                                {{--  --}}
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
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="ui search focus mt-30 lbel25">
                                                                    <label>Course Title*</label>
                                                                    <div class="ui left icon input swdh19">
                                                                        <input class="prompt srch_explore" type="text" placeholder="Course title here" required name="title" data-purpose="edit-course-title" maxlength="60" id="title" value="" />
                                                                    </div>
                                                                    <div class="help-block">(Please make this a maximum of 100 characters and unique.)</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="ui search focus lbel25 mt-30">
                                                                    <label>Short Description*</label>
                                                                    <div class="ui form swdh30">
                                                                        <div class="field">
                                                                            <textarea rows="3" name="short_description" id="short_description" required placeholder="Short description here..."></textarea>
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
                                                                            <x-forms.tinymce-editor/>
                                                                            {{-- <textarea rows="3" name="description" id="description" required placeholder="description here..."></textarea> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12">
                                                                <div class="ui search focus lbel25 mt-30">
                                                                    <label>What will students learn in your course?*</label>
                                                                    <div class="ui form swdh30">
                                                                        <div class="field">
                                                                            <div>
                                                                                <textarea id="will_learn" class="myeditorinstance" name="will_learn" ></textarea>
                                                                            </div>
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
                                                                            <div>
                                                                                <textarea id="prerequisites" class="myeditorinstance" name="prerequisites" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="help-block">What knowledge, technology, tools required by users to start this course. (One per line).</div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-6">
                                                                <div class="mt-30 lbel25">
                                                                    <label>Category*</label>
                                                                </div>
                                                                <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="category" id="category" required>
                                                                    <option value="">Select category</option>
                                                                    @foreach ($categories as $row)
                                                                        @php
                                                                            $subcategories = App\Models\Category::where("parentid", $row->id)->get();
                                                                        @endphp
                                                                        <option value="{{ $row->id }}" data-json="{{ $subcategories }}">{{ $row->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-12 col-md-6">
                                                                <div class="mt-30 lbel25">
                                                                    <label>Sub Category*</label>
                                                                </div>
                                                                <div class="__subcategoryreplace">
                                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="subcategory" id="subcategory" required>
                                                                        <option value="">Select sub category</option>
                                                                    </select>
                                                                </div>
                                                            </div>
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
                                                    <label><input type="radio" id="mp4" name="courseMediaType" value="mp4" checked /><span>HTML5(mp4)</span></label>
                                                    <label><input type="radio" id="url" name="courseMediaType" value="url" /><span>External URL</span></label>
                                                    <label><input type="radio" id="youtube" name="courseMediaType" value="youtube" /><span>YouTube</span></label>
                                                    <div class="mp4 intro-box" style="display: block;">
                                                        <div class="row">
                                                            <div class="col-lg-5 col-md-12">
                                                                <label for="">Video (mp4)</label><br/>
                                                                <input type="file" accept="video/mp4,video/x-m4v,video/*" name="courseVideo" id="courseVideo" class="courseVideo"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="url intro-box">
                                                        <div class="new-section">
                                                            <div class="ui search focus mt-30 lbel25">
                                                                <label>External URL*</label>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="text" placeholder="External Video URL" name="courseURL" id="courseURL" value="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="youtube intro-box">
                                                        <div class="new-section">
                                                            <div class="ui search focus mt-30 lbel25">
                                                                <label>Youtube URL*</label>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="text" placeholder="Youtube Video URL" name="courseYoutube" id="courseYoutube" value="" />
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
                                                <div class="container">
                                                    <div class="price-block">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="course-main-tabs">
                                                                    <div class="price-require-dt">
                                                                        <div class="cogs-toggle mb-20">
                                                                            <label class="switch">
                                                                                <input type="checkbox" name="is_free" id="is_free" value="1" checked />
                                                                                <span></span>
                                                                            </label>
                                                                            <label for="is_free" class="lbl-quiz">Course is Paid</label>
                                                                        </div>
                                                                        <div class="cogs-toggle cogs-togglex  x-hidden">
                                                                            <label class="switch">
                                                                                <input type="checkbox" id="require_login" value="1" name="require_login" />
                                                                                <span></span>
                                                                            </label>
                                                                            <label for="require_login" class="lbl-quiz">Require Log In</label>
                                                                        </div>
                                                                        <div class="cogs-toggle cogs-togglex mt-3 x-hidden">
                                                                            <label class="switch">
                                                                                <input type="checkbox" id="require_enroll" value="1" name="require_enroll" />
                                                                                <span></span>
                                                                            </label>
                                                                            <label for="require_enroll" class="lbl-quiz">Require Enroll</label>
                                                                        </div>
                                                                        <p class="cogs-togglex x-hidden">
                                                                            If the course is free, if student require to enroll your course, if not required enroll, if students required sign in to your website to take this course.
                                                                        </p>
                                                                    </div>

                                                                    <div class="cogs-togglec">
                                                                        <div class="license_pricing mt-30">
                                                                            <label class="label25">Regular Price*</label>
                                                                            <div class="row">
                                                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                                                    <div class="loc_group">
                                                                                        <div class="ui left icon input swdh19">
                                                                                            <input class="prompt srch_explore" type="number" placeholder="&#8358;0" name="amount" id="amount" value="" />
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
                                                                                            <input class="prompt srch_explore" type="number" placeholder="&#8358;0" name="discount" id="discount" value="" />
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
                                    <button data-direction="finish" style="submit" class="btn btn-default steps_btn">Continue</button>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{ auth()->user()->id }}" id="instructor_id">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>


<div id="loader-overlay">
    <div class="child">
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">0%</div>
        </div>
    </div>
</div>

<style>
    #loader-overlay{
        display: none;
        width: 100%;
        height: 100vh;
        background: #0000008a;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 999;

    }
    #loader-overlay .child {
        width: 400px;
        /* Center vertically and horizontally */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
<script src="{{ asset('assets/js/jquery-steps.min.js') }}"></script>
<script>

    $('#category').on("change", function(){
        let data = $( "#category option:selected" ).attr('data-json');
        let json = JSON.parse(data);
        let html = '<select class="form-control hj145 dropdown cntry152 prompt srch_explore" name="subcategory" id="subcategory" required>'
        json.forEach((item, index) => {
            html += `<option value=`+item.id+`>`+item.name+`</option>`;
        });

        html += '</select>';
        $('.__subcategoryreplace').html(html);
    });
    $('#is_free').on('change', function(){
        if($(this).is(':checked')){
            $('.cogs-togglex').addClass('x-hidden');
            $('.cogs-togglec').removeClass('x-hidden');
        }else{
            $('.cogs-togglex').removeClass('x-hidden');
            $('.cogs-togglec').addClass('x-hidden');
        }
    });

    $("#add-course-tab").steps({
        onFinish: function () {
            // $('#course-submittion').submit();
            let courseVideo = $('#courseVideo').prop('files')[0];
            let courseThumbnail = $('#courseThumbnail').prop('files')[0];

            let courseMediaType = '';
            if($("#mp4").prop("checked")){
                    courseMediaType = 'mp4';
            }else if($("#url").prop("checked")){
                    courseMediaType = 'url';
            }else if($("#youtube").prop("checked")){
                    courseMediaType = 'youtube';
            }

            let is_free = ($("#is_free").prop("checked") == true ? '1' : '0');
            let require_login = ($("#require_login").prop("checked") == true ? '1' : '0');
            let require_enroll = ($("#require_enroll").prop("checked") == true ? '1' : '0');

            var content = tinymce.get("myeditorinstance").getContent();
            var will_learn_content = tinymce.get("will_learn").getContent();
            var prerequisites_content = tinymce.get("prerequisites").getContent();

            if(courseVideo === undefined) courseVideo = null;
            var data = new FormData();
            data.append('courseVideo', courseVideo);
            data.append('courseThumbnail', courseThumbnail);
            data.append('title', $('#title').val());
            data.append('short_description', $('#short_description').val());
            data.append('description', content);
            data.append('will_learn', will_learn_content);
            data.append('prerequisites', prerequisites_content);
            data.append('category', $('#category').val());
            data.append('subcategory', $('#subcategory').val());
            data.append('courseURL', $('#courseURL').val());
            data.append('courseYoutube', $('#courseYoutube').val());
            data.append('amount', $('#amount').val());
            data.append('discount', $('#discount').val());
            data.append('courseMediaType', courseMediaType);
            data.append('is_free', is_free);
            data.append('require_login', require_login);
            data.append('require_enroll', require_enroll);
            data.append('instructor_id', $('#instructor_id').val());

            const BASE_URL = "{{ url('/') }}";
            const REQUEST_URL = "<?=Request::url()?>";
            let CSRF = "{{ csrf_token() }}";


            $.ajax({
                url: BASE_URL + "/api/courses/create",
                method:"POST",
                data:data,
                contentType: false,
                cache: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': CSRF},
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();


                    // Upload progress
                    xhr.upload.addEventListener("progress", function(evt){
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            progressbar_process(percentComplete);
                        }
                }, false);


                return xhr;
                },
                beforeSend:function()
                {
                    $('.error_append').html('');
                    $('#loader-overlay').css('display', 'block');
                    $('.js_display_error').removeClass('y-hidden');
                    $('.js_display_error').addClass( 'x-hidden');
                },
                success:function(data){
                    $('#loader-overlay').css('display', 'none');
                    if(data.status){
                        window.location.href = BASE_URL + '/courses/course/' + data.data.id;
                    }else{
                        let html = `<ul>
                                        <li>${data.error}</li>
                                    </ul>`;
                        $('.error_append').html(html);
                        $('.js_display_error').addClass('y-hidden');
                        $('.js_display_error').removeClass('x-hidden');
                    }

                },
                error: err =>{
                    if(err.status == 422){
                        let obj =  err.responseJSON;
                        let html = `<ul>`;
                        Object.entries(obj).forEach((item, index) => {
                            html += `<li>${item[1][0]}</li>`;
                        })
                        html += `</ul>`;

                        $('.error_append').html(html);
                    }else{
                        let html = `<ul>
                                        <li>There seem to be an error try again letter</li>
                                    </ul>`;
                        $('.error_append').html(html);
                    }
                    $('.js_display_error').addClass('y-hidden');
                    $('.js_display_error').removeClass('x-hidden');
                    $('#loader-overlay').css('display', 'none');
                    $('.progress-bar').css('width', '0%');
                    $('.progress-bar').text('0%');
                }
            });
        },
        });

        function progressbar_process(percentage){
            let percent = Math.round(percentage * 100);
            $('.progress-bar').css('width', percent + '%');
            $('.progress-bar').text( percent + '%');
        }
</script>
@endsection
