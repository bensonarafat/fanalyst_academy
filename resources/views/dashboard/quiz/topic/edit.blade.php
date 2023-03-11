@extends('layouts.app')
@section('content')
@section('title', 'Edit Topic')


<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-book-alt"></i>Edit Topic</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="my_courses_tabs" style="background: white; padding:10px">
                        @include("components.alert")
                        <form action="{{ route("update.topic") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="new-section-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="course-main-tabs">
                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Name*</label>
                                                    <input class="form_input_1" type="text" title="name" name="name" id="name" value="{{ $topic->name }}" placeholder="Name here" required />
                                                </div>
                                            </div>
                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Category*</label>
                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="category" id="category" required>
                                                        <option value="">Select category</option>
                                                        @foreach ($categories as $row)
                                                            <option value="{{ $row->id }}" @if($row->id == $topic->category_id) selected @endif>{{ $row->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Level*</label>
                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="level" id="level" required>
                                                        <option value="">Select level</option>
                                                        <option value="1"  @if(1 == $topic->level) selected @endif>Level 1</option>
                                                        <option value="2" @if(2 == $topic->level) selected @endif>Level 2</option>
                                                        <option value="3" @if(3 == $topic->level) selected @endif>Level 3</option>
                                                        <option value="4" @if(4 == $topic->level) selected @endif>Level 4</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Time*</label>
                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="time" id="time" required>
                                                        <option value="">Select time</option>
                                                        <option value="5" @if(5 == $topic->time) selected @endif>5 Minutes</option>
                                                        <option value="10" @if(10 == $topic->time) selected @endif>10 Minutes</option>
                                                        <option value="15" @if(15 == $topic->time) selected @endif>15 Minutes</option>
                                                        <option value="20" @if(20 == $topic->time) selected @endif>20 Minutes</option>
                                                        <option value="25" @if(25 == $topic->time) selected @endif>25 Minutes</option>
                                                        <option value="30" @if(30 == $topic->time) selected @endif>30 Minutes</option>
                                                        <option value="35" @if(35 == $topic->time) selected @endif>35 Minutes</option>
                                                        <option value="40" @if(40 == $topic->time) selected @endif>40 Minutes</option>
                                                        <option value="45" @if(45 == $topic->time) selected @endif>45 Minutes</option>
                                                        <option value="50" @if(50 == $topic->time) selected @endif>50 Minutes</option>
                                                        <option value="55" @if(55 == $topic->time) selected @endif>55 Minutes</option>
                                                        <option value="60" @if(60 == $topic->time) selected @endif>60 Minutes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-20">
                                <input type="hidden" name="id" value="{{ $topic->id }}">
                                <button type="submit" class="main-btn js_update_lecture">Update Topic </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>

@endsection
