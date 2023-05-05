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

                                            <div class="ui search focus mt-10 lbel25">
                                                <label>Image </label>
                                                <div class="ui left icon input swdh19">
                                                    <input class="prompt srch_explore" type="file" name="image" id="file" />
                                                    <input type="hidden" name="imagespan" value="{{ $topic->image }}">
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
