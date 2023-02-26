@extends('layouts.app')
@section('title', 'Lectures')
@section('content')

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
                    {{-- error --}}
                    <div class="alert alert-danger alert-dismissible x-hidden js_display_error" role="alert">
                        <strong>Error!</strong> Opps Something went wrong
                        <div class="error_append"></div>
                    </div>
                    {{--  --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="course-main-tabs">
                                <div class="new-section mt-10">
                                    <div class="form_group">
                                        <label class="label25">Lecture Title*</label>
                                        <input class="form_input_1" type="text" name="title" id="title" placeholder="Title here" required />
                                    </div>
                                </div>
                                <div class="ui search focus lbel25 mt-30">
                                    <label>Description*</label>
                                    <div class="ui form swdh30">
                                        <div class="field">
                                            <textarea rows="3" name="description" class="" required id="description" placeholder="description here..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="lecture-video-dt mt-30">
                                    <span class="video-info">Select your preferred video type. (.mp4, YouTube etc.)</span>
                                    <div class="video-category">
                                        <label><input type="radio" name="mediaTypeRaido" id="mp4" value="mp4" checked="" /><span>HTML5(mp4)</span></label>
                                        <label><input type="radio" name="mediaTypeRaido" id="url" value="url" /><span>External URL</span></label>
                                        <label><input type="radio" name="mediaTypeRaido" id="youtube" value="youtube" /><span>YouTube</span></label>
                                        <div class="mp4 video-box" style="display: block;">
                                            <div class="new-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <label for="">Video (mp4)</label><br/>
                                                        <input type="file" accept="video/mp4,video/x-m4v,video/*" id="courseVideo" name="courseVideo"/>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="url video-box">
                                            <div class="new-section">
                                                <div class="ui search focus mt-30 lbel25">
                                                    <label>External URL*</label>
                                                    <div class="ui left icon input swdh19">
                                                        <input class="prompt srch_explore" type="text" placeholder="External Video URL" name="courseURL" id="courseURL" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="youtube video-box">
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
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <label for="">Thumbnail (jpg,png)</label> <br/>
                                            <input type="file" accept="image/*" id="courseThumbnail" required name="courseThumbnail"/>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="courseid" id="courseid" value="{{ $courseid }}">
                <input type="hidden" name="curriculumid" id="curriculumid" value="{{ $curriculumid }}">
                <button type="button" class="main-btn cancel" data-dismiss="modal">Close</button>
                <button type="button" class="js_submit_lecture main-btn">Add Lecture</button>
            </div>
        </div>
    </div>
</div>


<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-book-alt"></i>Lecture</h2>
                </div>
                <div class="col-md-12">
                    <div class="card_dash1">
                        <div class="card_dash_left1">
                            <i class="uil uil-book-alt"></i>
                            <h1>Jump Into Lecture Creation</h1>
                        </div>
                        <div class="card_dash_right1">
                            <button class="create_btn_dash" data-toggle="modal" data-target="#add_lecture_model">Create Lectures</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if(isset($_GET['redirect']))
                        @if($_GET['type'] == 'add')
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> New Lecture added
                            </div>
                        @endif
                        @if($_GET['type'] == 'update')
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Lecture updated
                            </div>
                        @endif
                    @endif
                    <div class="my_courses_tabs">
                        @include('components.alert')
                        <div class="table-responsive mt-30">
                            <table class="table ucp-table">
                                <thead class="thead-s">
                                    <tr>
                                        <th class="text-center" scope="col">SN</th>
                                        <th>Title</th>
                                        <th>Media Type</th>
                                        <th scope="col">Created Date</th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lectures as $row)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $row->title }}</td>
                                            <td>{{ $row->media_type }}</td>
                                            <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('edit.lecture', $row->id) }}" title="Edit" class="gray-s"><i class="uil uil-edit-alt"></i></a>
                                                <a href="{{ route('delete.lecture', $row->id) }}" title="Delete" class="gray-s"><i class="uil uil-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
        z-index: 9999999;

    }
    #loader-overlay .child {
        width: 400px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
<script>
    $('.js_submit_lecture').on('click', function(){
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

        if(courseVideo === undefined) courseVideo = null;
        var data = new FormData();
        data.append('courseVideo', courseVideo);
        data.append('courseThumbnail', courseThumbnail);
        data.append('title', $('#title').val());
        data.append('description', $('#description').val());
        data.append('courseMediaType', courseMediaType);
        data.append('courseURL', $('#courseURL').val());
        data.append('courseYoutube', $('#courseYoutube').val());
        data.append('courseid', $('#courseid').val());
        data.append('curriculumid', $('#curriculumid').val());

        const BASE_URL = "{{ url('/') }}";
        const REQUEST_URL = "<?=Request::url()?>";
        let CSRF = "{{ csrf_token() }}";

        $.ajax({
            url: BASE_URL + "/api/courses/curriculum/lecture/store",
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
                    window.location.href = BASE_URL + '/courses/curriculum/lecture/add/' + $('#curriculumid').val() + "?redirect=true&type=add";
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
    });
    function progressbar_process(percentage){
        let percent = Math.round(percentage * 100);
        $('.progress-bar').css('width', percent + '%');
        $('.progress-bar').text( percent + '%');
    }
</script>
@endsection
