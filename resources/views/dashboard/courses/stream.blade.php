@extends('layouts.app')
@section('title', $course->title)
@section('content')

<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="section3125">
                        <div class="live1452">
                            <iframe src="https://www.youtube.com/embed/EEIk7gwjgIM?autoplay=1" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.other_footer')
</div>

@endsection
