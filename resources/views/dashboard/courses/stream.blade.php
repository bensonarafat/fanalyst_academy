@extends('layouts.app')
@section('title', $lecture->title)
@section('content')

<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="section3125">
                        <div class="live1452">
                            @if($lecture->media_type == 'mp4')
                                <video id="my-video" class="video-js" controls preload="auto" width="640" height="264" poster="{{ asset($lecture->media_thumbnail) }}" data-setup="{}">
                                    <source src="{{ asset($lecture->media_video) }}" type="video/mp4" />
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                </video>
                            @elseif($lecture->media_type == 'youtube')
                                <iframe src="{{ $lecture->media_video }}" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @elseif($lecture->media_type == 'url')
                                <video id="my-video" class="video-js" controls preload="auto" width="640" height="264" poster="{{ asset($lecture->media_thumbnail) }}" data-setup="{}">
                                    <source src="{{ $lecture->media_video }}" type="video/mp4" />
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                </video>
                            @endif
                        </div>
                        <div class="user_dt5">
                            <div class="user_dt_left">
                                <div class="live_user_dt">
                                    <div class="user_img5">
                                        <a href="#"><img src="@if($instructor->photo) {{ asset($instructor->photo) }} @else {{ asset('assets/images/left-imgs/img-1.jpg') }} @endif" alt="" /></a>
                                    </div>
                                    <div class="user_cntnt">
                                        <h4>{{ $instructor->fullname }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="user_dt_right">
                                <ul>
                                    <li>
                                        <a href="#" class="lkcm152"><i class="uil uil-eye"></i><span>{{ $course->enrolled }}</span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="lkcm152"><i class="uil uil-thumbs-up"></i><span>{{ $course->likes }}</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <p>{{ $lecture->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>

<style>
    #my-video{
        width: 100% !important;
        height: 350px !important;
    }
</style>

@endsection
