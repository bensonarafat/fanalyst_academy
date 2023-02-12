@extends('layouts.app')
@section('title', 'Create Course')
@section('content')


<div class="modal fade" id="add_section_model" tabindex="-1" aria-labelledby="lectureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lectureModalLabel">New Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="new-section-block">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="new-section">
                                <div class="form_group">
                                    <label class="label25">Section Name*</label>
                                    <input class="form_input_1 section_name" type="text" placeholder="Section title here" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="main-btn cancel" data-dismiss="modal">Close</button>
                <button type="button" class="main-btn js_add_section" data-dismiss="modal">Add Section</button>
            </div>
        </div>
    </div>
</div>

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
                                <div class="nav nav-pills flex-column flex-sm-row nav-tabs" role="tablist">
                                    <a class="flex-sm-fill text-sm-center nav-link active" data-toggle="tab" href="#nav-basic" role="tab" aria-selected="true"><i class="fas fa-file-alt mr-2"></i>Basic</a>
                                    <a class="flex-sm-fill text-sm-center nav-link" data-toggle="tab" href="#nav-video" role="tab" aria-selected="false"><i class="fas fa-video mr-2"></i>Video</a>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="nav-basic" role="tabpanel">
                                        <div class="new-section mt-30">
                                            <div class="form_group">
                                                <label class="label25">Lecture Title*</label>
                                                <input class="form_input_1 js_lecture_title" type="text" placeholder="Title here" />
                                            </div>
                                        </div>
                                        <div class="ui search focus lbel25 mt-30">
                                            <label>Description*</label>
                                            <div class="ui form swdh30">
                                                <div class="field">
                                                    <textarea rows="3" name="description" class="js_lecture_description" id="" placeholder="description here..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-video" role="tabpanel">
                                        <div class="lecture-video-dt mt-30">
                                            <span class="video-info">Select your preferred video type. (.mp4, YouTube etc.)</span>
                                            <div class="video-category">
                                                <label><input type="radio" name="mediaTypeRaido" class="js_media_type" value="mp4" checked="" /><span>HTML5(mp4)</span></label>
                                                <label><input type="radio" name="mediaTypeRaido"  class="js_media_type" value="url" /><span>External URL</span></label>
                                                <label><input type="radio" name="mediaTypeRaido"  class="js_media_type" value="youtube" /><span>YouTube</span></label>
                                                <div class="mp4 video-box" style="display: block;">
                                                    <div class="new-section">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <label for="">Video (mp4)</label><br/>
                                                                <input type="file" name="" id="js_lecture_video" class="js_lecture_video"/>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <label for="">Thumbnail (jpg,png)</label> <br/>
                                                                <input type="file" name="" id="js_lecture_thumbnail" class="js_lecture_thumbnail"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="url video-box">
                                                    <div class="new-section">
                                                        <div class="ui search focus mt-30 lbel25">
                                                            <label>External URL*</label>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="text" placeholder="External Video URL" name="" id="" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="youtube video-box">
                                                    <div class="new-section">
                                                        <div class="ui search focus mt-30 lbel25">
                                                            <label>Youtube URL*</label>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="text" placeholder="Youtube Video URL" name="" id="" value="" />
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
            <div class="modal-footer">
                <button type="button" class="main-btn cancel" data-dismiss="modal">Close</button>
                <button type="button" class="main-btn js_add_new_sublist" data-dismiss="modal">Add Lecture</button>
            </div>
        </div>
    </div>
</div>


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
                                            <span class="step-name">Curriculum</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_step3">
                                            <span class="number"></span>
                                            <span class="step-name">Media</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_step4">
                                            <span class="number"></span>
                                            <span class="step-name">Price</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_step5">
                                            <span class="number"></span>
                                            <span class="step-name">Publish</span>
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
                                                                    <input class="prompt srch_explore" type="text" placeholder="Course title here" required name="title" data-purpose="edit-course-title" maxlength="60" id="main[title]" value="" />
                                                                </div>
                                                                <div class="help-block">(Please make this a maximum of 100 characters and unique.)</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="ui search focus lbel25 mt-30">
                                                                <label>Short Description*</label>
                                                                <div class="ui form swdh30">
                                                                    <div class="field">
                                                                        <textarea rows="3" name="description" id="" required placeholder="Item description here..."></textarea>
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
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="ui search focus lbel25 mt-30">
                                                                <label>What will students learn in your course?*</label>
                                                                <div class="ui form swdh30">
                                                                    <div class="field">
                                                                        <textarea rows="3" name="will_learn" id="will_learn" required placeholder=""></textarea>
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
                                                                        <textarea rows="3" name="prerequisites" id="prerequisites" required placeholder=""></textarea>
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
                                                                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-tab-panel step-tab-gallery" id="tab_step2">
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title"><i class="uil uil-notebooks"></i>Curriculum</h3>
                                            </div>
                                            <div class="curriculum-section">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="curriculum-add-item">
                                                            <h4 class="section-title mt-0"><i class="fas fa-th-list mr-2"></i>Curriculum</h4>
                                                            <button class="main-btn color btn-hover ml-left add-section-title" data-toggle="modal" data-target="#add_section_model">New Section</button>
                                                        </div>
                                                        <div class="append_section">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-tab-panel step-tab-location" id="tab_step3">
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
                                                                <input type="file" name="" id="courseVideo" class="courseVideo" name="courseVideo"/>
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
                                                            <input type="file" name="courseThumbnail" id="courseThumbnail" class="courseThumbnail"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-tab-panel step-tab-amenities" id="tab_step4">
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title"><i class="uil uil-usd-square"></i>Price</h3>
                                            </div>
                                            <div class="course__form">
                                                <div class="price-block">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="course-main-tabs">
                                                                <div class="nav nav-pills flex-column flex-sm-row nav-tabs" role="tablist">
                                                                    <a class="flex-sm-fill text-sm-center nav-link active" data-toggle="tab" href="#nav-free" role="tab" aria-selected="true"><i class="fas fa-tag mr-2"></i>Free</a>
                                                                    <a class="flex-sm-fill text-sm-center nav-link" data-toggle="tab" href="#nav-paid" role="tab" aria-selected="false"><i class="fas fa-cart-arrow-down mr-2"></i>Paid</a>
                                                                </div>
                                                                <div class="tab-content">
                                                                    <div class="tab-pane fade show active" id="nav-free" role="tabpanel">
                                                                        <div class="price-require-dt">
                                                                            <div class="cogs-toggle center_d">
                                                                                <label class="switch">
                                                                                    <input type="checkbox" id="require_login" value="" />
                                                                                    <span></span>
                                                                                </label>
                                                                                <label for="require_login" class="lbl-quiz">Require Log In</label>
                                                                            </div>
                                                                            <div class="cogs-toggle center_d mt-3">
                                                                                <label class="switch">
                                                                                    <input type="checkbox" id="require_enroll" value="" />
                                                                                    <span></span>
                                                                                </label>
                                                                                <label for="require_enroll" class="lbl-quiz">Require Enroll</label>
                                                                            </div>
                                                                            <p>
                                                                                If the course is free, if student require to enroll your course, if not required enroll, if students required sign in to your website to take this course.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane" id="nav-paid" role="tabpanel">
                                                                        <div class="license_pricing mt-30">
                                                                            <label class="label25">Regular Price*</label>
                                                                            <div class="row">
                                                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                                                    <div class="loc_group">
                                                                                        <div class="ui left icon input swdh19">
                                                                                            <input class="prompt srch_explore" type="number" placeholder="&#8358;0" name="" id="" value="" />
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
                                                                                            <input class="prompt srch_explore" type="number" placeholder="&#8358;0" name="" id="" value="" />
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
                                    <div class="step-tab-panel step-tab-location" id="tab_step5">
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title"><i class="uil uil-upload"></i>Submit</h3>
                                            </div>
                                        </div>
                                        <div class="publish-block">
                                            <i class="far fa-edit"></i>
                                            <p>Your course is in a draft state. Students cannot view, purchase or enroll in this course. For students that are already enrolled, this course will not appear on their student Dashboard.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-footer step-tab-pager">
                                    <button data-direction="prev" class="btn btn-default steps_btn">PREVIOUS</button>
                                    <button data-direction="next" class="btn btn-default steps_btn">Next</button>
                                    <button data-direction="finish" style="submit" class="btn btn-default steps_btn">Submit for Review</button>
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

    const genRand = (len) => {
    return Math.random().toString(36).substring(2,len+2);
    }
    let key  = null;
    $('.js_add_section').on('click', function(){
        let section_name = $('.section_name').val();
        if(section_name != ""){
            let key =  genRand(8);
            const append_section = `
                                <div class="added-section-item mb-30" id="${key}">
                                    <div class="section-header">
                                        <h4><i class="fas fa-bars mr-2"></i><span class="js_section_name">${section_name}</span></h4>
                                        <div class="section-edit-options">
                                            <button class="btn-152" type="button" data-toggle="collapse" data-target="#edit-section"><i class="fas fa-edit"></i></button>
                                            <button class="btn-152 js_remove_section" type="button"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    <div id="edit-section" class="collapse">
                                        <div class="new-section smt-25">
                                            <div class="form_group">
                                                <div class="ui search focus mt-30 lbel25">
                                                    <label>Section Name*</label>
                                                    <div class="ui left icon input swdh19">
                                                        <input class="prompt srch_explore js_curriculum_title" type="text" placeholder="" name="curriculum_title[]" maxlength="60" id="curriculum_title" value="${section_name}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="share-submit-btns pl-0">
                                                <button class="main-btn color btn-hover js_curriculum_button"><i class="fas fa-save mr-2"></i>Update Section</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-group-list append_sublist">

                                    </div>
                                    <div class="section-add-item-wrap p-3">
                                        <button class="add_lecture" data-key="${key}" data-toggle="modal" data-target="#add_lecture_model"><i class="far fa-plus-square mr-2"></i>Lecture</button>
                                    </div>
                                </div>
                                `;

            $('.append_section').append(append_section);
        }
    });

    $('body').on('click', '.js_remove_section', function(){
        let parent = $(this);
        let grand = parent.parent();
        let great = grand.parent();
        let xgreat = great.parent();
        xgreat.remove();
    })

    $('body').on('click', '.js_curriculum_button', function(){
        let _this = $(this);
        let parent = _this.parent();
        let grand = parent.parent();
        let txt = grand.find('.js_curriculum_title');
        let editval = txt.val();
        let xg = grand.parent();
        let xxg = xg.parent();
        let js_section_name = xxg.find('.js_section_name');
        console.log(js_section_name);

        js_section_name.text(editval);
        $('.collapse').removeClass('show');

    });

    $('body').on('click', '.js_add_new_sublist', function(){
        let append_sublist = $('#'+key).find('.append_sublist');
        let lecture_title = $('.js_lecture_title').val();
        let lecture_description = $('.js_lecture_description').val();
        let lecture_media_type = $('input[name="mediaTypeRaido"]:checked').val();

        console.log(lecture_media_type);
        if(lecture_title != ""){
            const list =
                        `
                        <input type="hidden" value="${lecture_title}" name="lecture_title[]"/>
                        <input type="hidden" value="${lecture_description}" name="lecture_description[]"/>
                        <input type="hidden" value="${lecture_media_type}" name="media_type"/>
                        <input type="file" style="display:none;" name="media_video[]" class="media_video"/>
                        <input type="file" style="display:none;" name="media_thumbnail[]" class="media_thumbnail"/>
                        <div class="section-list-item">
                            <div class="section-item-title">
                                <i class="fas fa-file-alt mr-2"></i>
                                <span class="section-item-title-text">${lecture_title}</span>
                            </div>
                            <button type="button" class="section-item-tools js_remove_sublist"><i class="fas fa-trash-alt"></i></button>
                        </div>`;
            append_sublist.append(list);
            let media_video = $('#'+key).find('.media_video');
            let media_thumbnail = $('#'+key).find('.media_thumbnail');
            media_video[0].files = $(".js_lecture_video")[0].files;
            media_thumbnail[0].files = $(".js_lecture_thumbnail")[0].files;
            $('.js_lecture_title').val("")
        }
    });

    $('body').on('click', '.add_lecture', function(){
        let _this = $(this);
        key = _this.attr('data-key');

    });


    $('body').on('click', '.js_remove_sublist', function(){
        let _this = $(this);
        let parent = _this.parent();
        parent.remove();
    })
</script>
@endsection
