@extends('layouts.main')
@section('title',  $user->fullname)
@section('content')
@section('description', $user->fullname)
@section('image', asset('assets/images/logo.png') )


<div class="wrapper _bg4586 _new89">

    <div class="container">


        <div class="row">
            @foreach ($courses as $row)
                    @php
                    $user = \App\Models\User::find($row->instructor);
                @endphp
                <div class="col-6 col-sm-3">
                    <div class="fcrse_1 mt-30">
                        <a href="{{ route('view.course', $row->id) }}" class="fcrse_img">
                            <img src="{{ asset($row->media_thumbnail) }}" style="width:100%;height:150px;object-fit:cover;" alt="" />
                            <div class="course-overlay">
                                <span class="play_btn1"><i class="uil uil-play"></i></span>
                            </div>
                        </a>
                        <div class="fcrse_content">
                            <a href="{{ route('view.course', $row->id) }}" class="crse14s">{{ $row->title }}</a>
                            <p style="font-size:11px;">
                                By {{ $user->fullname }}
                            </p>
                            <div class="auth1lnkprce">
                                <p class="cr1fot">
                                    @if(!$row->is_free)
                                        Free
                                    @else
                                        From {!! naira() . number_format($row->amount, 2) !!}
                                    @endif

                                </p>
                                <div class="prce142">
                                    <i class="fa fa-star" style="color: #FFD700;font-size: 12px;"></i>
                                    <span style="font-size: 13px;">{{ $row->ratings }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('components.footer')
</div>

<style>
    #my-video{
        width: 100% !important;
    }
</style>
@endsection
