@extends('layouts.app')
@section('title', $lecture->title)
@section('content')


<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-book-alt"></i>Edit Lecture</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="my_courses_tabs" style="background: white; padding:10px">
                        @include('components.alert')
                        <form action="{{ route('update.lecture') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="new-section-block">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="course-main-tabs">
                                            <div class="new-section mt-10">
                                                <div class="form_group">
                                                    <label class="label25">Lecture Title*</label>
                                                    <input class="form_input_1" type="text" name="title" value="{{ $lecture->title }}" placeholder="Title here" required />
                                                </div>
                                            </div>
                                            <div class="ui search focus lbel25 mt-30">
                                                <label>Description*</label>
                                                <div class="ui form swdh30">
                                                    <div class="field">
                                                        <textarea rows="3" name="description" class="" required id="" placeholder="description here...">{{ $lecture->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="lecture-video-dt mt-30">
                                                <span class="video-info">Select your preferred video type. (.mp4, YouTube etc.)</span>
                                                <div class="video-category">
                                                    <label><input type="radio" name="mediaTypeRaido" value="mp4" @if($lecture->media_type == 'mp4') checked @endif/><span>HTML5(mp4)</span></label>
                                                    <label><input type="radio" name="mediaTypeRaido" value="url" @if($lecture->media_type == 'url') checked @endif /><span>External URL</span></label>
                                                    <label><input type="radio" name="mediaTypeRaido" value="youtube" @if($lecture->media_type == 'youtube') checked @endif/><span>YouTube</span></label>
                                                    <div class="mp4 video-box" style="display: block;">
                                                        <div class="new-section">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6">
                                                                    <label for="">Video (mp4)</label><br/>
                                                                    <input type="file" accept="video/mp4,video/x-m4v,video/*" name="courseVideo"/>
                                                                    <input type="hidden" name="courseVideoSpan" value="{{ $lecture->media_video }}">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <label for="">Thumbnail (jpg,png)</label> <br/>
                                                                    <input type="file" accept="image/*" name="courseThumbnail"/>
                                                                    <input type="hidden" name="courseThumbnailSpan" value="{{ $lecture->media_thumbnail }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="url video-box">
                                                        <div class="new-section">
                                                            <div class="ui search focus mt-30 lbel25">
                                                                <label>External URL*</label>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="text" placeholder="External Video URL" name="courseURL" id="" value="{{ $lecture->media_video }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="youtube video-box">
                                                        <div class="new-section">
                                                            <div class="ui search focus mt-30 lbel25">
                                                                <label>Youtube URL*</label>
                                                                <div class="ui left icon input swdh19">
                                                                    <input class="prompt srch_explore" type="text" placeholder="Youtube Video URL" name="courseYoutube" id="" value="{{ $lecture->media_video }}" />
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

                            <div class="mt-20">
                                <input type="hidden" name="id" value="{{ $lecture->id }}">
                                <button type="submit" class="main-btn">Update Lecture</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.other_footer')
</div>

@endsection
