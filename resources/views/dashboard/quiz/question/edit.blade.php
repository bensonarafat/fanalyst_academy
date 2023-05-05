@extends('layouts.app')
@section('content')
@section('title', 'Edit Question')


<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-book-alt"></i>Edit Question</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="my_courses_tabs" style="background: white; padding:10px">
                        @include("components.alert")
                        <form action="{{ route("update.question") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="new-section-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="course-main-tabs">
                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Name*</label>
                                                    <input class="form_input_1" type="text" title="name" name="name" id="name" value="{{ $question->name }}" placeholder="Name here" required />
                                                </div>
                                            </div>
                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Category*</label>
                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="categoryid" id="category" required>
                                                        <option value="">Select category</option>
                                                        @foreach ($categories as $row)
                                                            @php
                                                                $subcategories = App\Models\Category::where("parentid", $row->id)->get();
                                                            @endphp
                                                            <option value="{{ $row->id }}" data-json="{{ $subcategories }}" @if($row->id == $question->categoryid) selected @endif>{{ $row->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Sub Category*</label>
                                                    <div class="__levelreplace">
                                                        <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="subcategory" id="level" required>
                                                            <option value="">Select Sub category</option>
                                                            <option value="{{ $subcategory->id }}" selected>{{ $subcategory->name }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Time*</label>
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
                                            </div>

                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Price *</label>
                                                    <input class="form_input_1" type="number" title="price" name="price" id="price" value="{{ $question->price }}" placeholder="Price here" required />
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
                                <input type="hidden" name="id" value="{{ $question->id }}">
                                <input type="hidden" name="topicid" value="{{ $id }}">
                                <button type="submit" class="main-btn js_update_lecture">Update Question </button>
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
        let html = '<select class="form-control hj145 dropdown cntry152 prompt srch_explore" name="categoryid" id="level" required>'
        json.forEach((item, index) => {
            html += `<option value=`+item.id+`>`+item.name+`</option>`;
        });

        html += '</select>';
        $('.__levelreplace').html(html);
    });
</script>
@endsection
