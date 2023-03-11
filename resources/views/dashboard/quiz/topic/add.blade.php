@extends('layouts.app')
@section('content')
@section('title', 'Add Topic')


<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-book-alt"></i>Add Topic</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="my_courses_tabs" style="background: white; padding:10px">
                        @include("components.alert")
                        <form action="{{ route("store.topic") }}" method="post" enctype="multipart/form-data">
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
                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="category" id="category" required>
                                                        <option value="">Select category</option>
                                                        @foreach ($categories as $row)
                                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Level*</label>
                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="level" id="level" required>
                                                        <option value="">Select level</option>
                                                        <option value="1">Level 1</option>
                                                        <option value="2">Level 2</option>
                                                        <option value="3">Level 3</option>
                                                        <option value="4">Level 4</option>
                                                    </select>
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
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-20">
                                <button type="submit" class="main-btn js_update_lecture">Add Topic </button>
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
