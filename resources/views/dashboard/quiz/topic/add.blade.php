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
                                                            @php
                                                                $levels = App\Models\Category::where("parentid", $row->id)->get();
                                                            @endphp
                                                            <option value="{{ $row->id }}" data-json="{{ $levels }}">{{ $row->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Level*</label>
                                                    <div class="__levelreplace">
                                                        <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="level" id="level" required>
                                                            <option value="">Select level</option>
                                                        </select>
                                                    </div>
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

<script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
<script>
    $('#category').on("change", function(){
        let data = $( "#category option:selected" ).attr('data-json');
        let json = JSON.parse(data);
        let html = '<select class="form-control hj145 dropdown cntry152 prompt srch_explore" name="level" id="level" required>'
        json.forEach((item, index) => {
            html += `<option value=`+item.id+`>`+item.name+`</option>`;
        });

        html += '</select>';
        $('.__levelreplace').html(html);
    });
</script>
@endsection
