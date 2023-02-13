@extends('layouts.app')
@section('title', 'Lectures')
@section('content')


<form action="{{ route('store.lecture') }}" method="post" enctype="multipart/form-data">
    @csrf
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
                                    <div class="new-section mt-10">
                                        <div class="form_group">
                                            <label class="label25">Lecture Title*</label>
                                            <input class="form_input_1" type="text" name="title" placeholder="Title here" required />
                                        </div>
                                    </div>
                                    <div class="ui search focus lbel25 mt-30">
                                        <label>Description*</label>
                                        <div class="ui form swdh30">
                                            <div class="field">
                                                <textarea rows="3" name="description" class="" required id="" placeholder="description here..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lecture-video-dt mt-30">
                                        <span class="video-info">Select your preferred video type. (.mp4, YouTube etc.)</span>
                                        <div class="video-category">
                                            <label><input type="radio" name="mediaTypeRaido" value="mp4" checked="" /><span>HTML5(mp4)</span></label>
                                            <label><input type="radio" name="mediaTypeRaido" value="url" /><span>External URL</span></label>
                                            <label><input type="radio" name="mediaTypeRaido" value="youtube" /><span>YouTube</span></label>
                                            <div class="mp4 video-box" style="display: block;">
                                                <div class="new-section">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <label for="">Video (mp4)</label><br/>
                                                            <input type="file" accept="video/mp4,video/x-m4v,video/*" name="courseVideo"/>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <label for="">Thumbnail (jpg,png)</label> <br/>
                                                            <input type="file" accept="image/*" name="courseThumbnail"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="url video-box">
                                                <div class="new-section">
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label>External URL*</label>
                                                        <div class="ui left icon input swdh19">
                                                            <input class="prompt srch_explore" type="text" placeholder="External Video URL" name="courseURL" id="" value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="youtube video-box">
                                                <div class="new-section">
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label>Youtube URL*</label>
                                                        <div class="ui left icon input swdh19">
                                                            <input class="prompt srch_explore" type="text" placeholder="Youtube Video URL" name="courseYoutube" id="" value="" />
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
                    <input type="hidden" name="courseid" value="{{ $courseid }}">
                    <input type="hidden" name="curriculumid" value="{{ $curriculumid }}">
                    <button type="button" class="main-btn cancel" data-dismiss="modal">Close</button>
                    <button type="submit" class="main-btn">Add Lecture</button>
                </div>
            </div>
        </div>
    </div>
</form>

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
    @include('components.other_footer')
</div>
@endsection
