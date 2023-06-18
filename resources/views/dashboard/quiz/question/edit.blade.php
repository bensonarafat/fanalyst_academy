@extends('layouts.app')
@section('content')
@section('title', 'Edit Question')

<div class="wrapper">
    <div class="sa4d25">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-analysis"></i> Edit Question</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @include("components.alert")
                    <form action="{{ route('update.question') }}" enctype="multipart/form-data" id="question-submittion" method="post">
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
                                                <div class="container">
                                                    <div class="general_info10">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-6">
                                                                <div class="mt-30 lbel25">
                                                                    <label> Name*</label>
                                                                </div>
                                                                <input class="form_input_1" type="text" title="name" name="name" id="name" value="{{ $question->name }}" placeholder="Name here" required />
                                                            </div>

                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="course_des_textarea mt-30 lbel25">
                                                                    <label>Description*</label>
                                                                    <div class="ui form swdh30">
                                                                        <div class="field">
                                                                            <textarea id="myeditorinstance" class="myeditorinstance" name="description">{{ $question->description }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="course_des_textarea mt-30 lbel25">
                                                                    <label>Time*</label>
                                                                </div>
                                                                <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="time" id="time" required>
                                                                    <option value="">Select time</option>
                                                                    <option value="5" @if(5 == $question->time) selected @endif>5 Minutes</option>
                                                                    <option value="10" @if(10 == $question->time) selected @endif>10 Minutes</option>
                                                                    <option value="15" @if(15 == $question->time) selected @endif>15 Minutes</option>
                                                                    <option value="20" @if(20 == $question->time) selected @endif>20 Minutes</option>
                                                                    <option value="25" @if(25 == $question->time) selected @endif>25 Minutes</option>
                                                                    <option value="30" @if(30 == $question->time) selected @endif>30 Minutes</option>
                                                                    <option value="35" @if(35 == $question->time) selected @endif>35 Minutes</option>
                                                                    <option value="40" @if(40 == $question->time) selected @endif>40 Minutes</option>
                                                                    <option value="45" @if(45 == $question->time) selected @endif>45 Minutes</option>
                                                                    <option value="50" @if(50 == $question->time) selected @endif>50 Minutes</option>
                                                                    <option value="55" @if(55 == $question->time) selected @endif>55 Minutes</option>
                                                                    <option value="60" @if(60 == $question->time) selected @endif>60 Minutes</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-12 col-md-6">
                                                                <div class="course_des_textarea mt-30 lbel25">
                                                                    <label class="isfree">Is Free*</label>
                                                                </div>
                                                                <select class="ui hj145 dropdown cntry152 prompt srch_explore isfree __changePrice" name="isfree" id="isfree" required>
                                                                    <option value="0" @if($question->isfree == "0") selected @endif>No</option>
                                                                    <option value="1" @if($question->isfree == "1") selected @endif>Yes</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-12 col-md-6 __removePrice">
                                                                <div class="course_des_textarea mt-30 lbel25">
                                                                    <label class="label25">Price *</label>
                                                                </div>
                                                                <input class="form_input_1" type="number" title="price" name="price" id="price" value="{{ $question->price }}"  placeholder="Price here"/>
                                                            </div>

                                                            <div class="col-lg-12 col-md-6">
                                                                <div class="mt-30 lbel25">
                                                                    <label>Category*</label>
                                                                </div>
                                                                <input class="form_input_1" type="text" readonly title="Category" name="topicname" id="topicname" value="{{ $topic->name }}" required />
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-tab-panel step-tab-media" id="tab_step2">
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title"><i class="uil uil-image"></i>Media</h3>
                                            </div>
                                            <div class="course__form">
                                                <div class="container">
                                                    <div class="general_info10">
                                                        <div class="ui search focus mt-10 lbel25">
                                                            <label>Image </label>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="file" required name="image" id="file" />
                                                                <input type="hidden" name="imagespan" value="{{ $topic->image }}">
                                                            </div>
                                                        </div>
                                                        <div class="ui search focus mt-10 lbel25">
                                                            <label>Question File <a href="https://fanalystacademy.org/sample/fanalyst_quiz_sample.xlsx">Download, fill and upload</a> <small> (optional, must be .xlmx)</small></label>
                                                            <div class="ui left icon input swdh19">
                                                                <input class="prompt srch_explore" type="file" name="file" id="file" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="step-tab-panel step-tab-end" id="tab_step3">
                                        <div class="tab-from-content">
                                            <div class="title-icon">

                                                <h3 class="title"><i class="uil uil-upload"></i>Submit</h3>
                                            </div>
                                        </div>
                                        <div class="publish-block">
                                            <i class="far fa-edit"></i>
                                            <p>Make sure you have preview all before you submit your question. <br/>Thank You</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="step-footer step-tab-pager">
                                    <input type="hidden" name="id" value="{{ $question->id }}">
                                    <input type="hidden" name="topicid" value="{{ $topic->id }}">
                                    <button data-direction="prev" class="btn btn-default steps_btn">PREVIOUS</button>
                                    <button data-direction="next" class="btn btn-default steps_btn">Next</button>
                                    <button data-direction="finish" style="submit" class="btn btn-default steps_btn">Update Question  </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>

<script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
<script src="{{ asset('assets/js/jquery-steps.min.js') }}"></script>
<script>
    $(".__changePrice").on("change", function(e){
        let _this = $(this);
        if(_this.find(":selected").val() == "1"){
            $('.__removePrice').css("display", "none");
        }else{
            $('.__removePrice').css("display", "block");
        }
    });

    $("#add-course-tab").steps({
        onFinish: function () {
            $('#question-submittion').submit();
        }
    });
</script>
@endsection
