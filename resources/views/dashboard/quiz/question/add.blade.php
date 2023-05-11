@extends('layouts.app')
@section('content')
@section('title', 'Add Question')


<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-book-alt"></i>Add Question</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="my_courses_tabs" style="background: white; padding:10px">
                        @include("components.alert")
                        <form action="{{ route("store.question") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="new-section-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="course-main-tabs">
                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Name*</label>
                                                    <input class="form_input_1" type="text" title="name" name="name" id="name" placeholder="Name here" required />
                                                </div>
                                            </div>
                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Category*</label>
                                                    <input class="form_input_1" type="text" readonly title="Category" name="topicname" id="topicname" value="{{ $topic->name }}" required />

                                                </div>
                                            </div>

                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Time*</label>
                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="time" id="time" required>
                                                        <option value="">Select time</option>
                                                        <option value="5">5 Minutes</option>
                                                        <option value="10">10 Minutes</option>
                                                        <option value="15">15 Minutes</option>
                                                        <option value="20">20 Minutes</option>
                                                        <option value="25">25 Minutes</option>
                                                        <option value="30">30 Minutes</option>
                                                        <option value="35">35 Minutes</option>
                                                        <option value="40">40 Minutes</option>
                                                        <option value="45">45 Minutes</option>
                                                        <option value="50">50 Minutes</option>
                                                        <option value="55">55 Minutes</option>
                                                        <option value="60">60 Minutes</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="isfree">Is Free*</label>
                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore isfree __changePrice" name="isfree" id="isfree" required>
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="new-section mt-10 __removePrice">
                                                <div class="form_group">
                                                    <label class="label25">Price *</label>
                                                    <input class="form_input_1" type="number" title="price" name="price" id="price" placeholder="Price here"/>
                                                </div>
                                            </div>
                                            <div class="ui search focus mt-10 lbel25">
                                                <label>Description*</label>
                                                <div class="ui form swdh30">
                                                    <div class="field">
                                                        <textarea id="myeditorinstance" class="myeditorinstance" name="description"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ui search focus mt-10 lbel25">
                                                <label>Image </label>
                                                <div class="ui left icon input swdh19">
                                                    <input class="prompt srch_explore" type="file" required name="image" id="file" />
                                                </div>
                                            </div>
                                            <div class="ui search focus mt-10 lbel25">
                                                <label>File <small> (optional, must be xlmx)</small></label>
                                                <div class="ui left icon input swdh19">
                                                    <input class="prompt srch_explore" type="file" name="file" id="file" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-20">
                                <input type="hidden" name="topicid" value="{{ $topic->id }}">
                                <button type="submit" class="main-btn js_update_lecture">Add Question </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>
<script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
<script>
    $(".__changePrice").on("change", function(e){
        let _this = $(this);
        if(_this.find(":selected").val() == "1"){
            $('.__removePrice').css("display", "none");
        }else{
            $('.__removePrice').css("display", "block");
        }
    });
</script>
@endsection
