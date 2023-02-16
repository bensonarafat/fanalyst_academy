@extends('layouts.app')
@section('title', 'Explore')
@section('content')

<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-8">
                    <div class="section3125">
                        <div class="explore_search">
                            <div class="ui search focus">
                                <div class="ui left icon input swdh11">
                                    <input class="prompt srch_explore" type="text" placeholder="Search for Tuts Videos, Tutors, Tests and more.." />
                                    <i class="uil uil-search-alt icon icon2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="_14d25">
                        <div class="row">
                            @foreach ($courses as $row)
                            @php
                                $user = \App\Models\User::find($row->instructor);
                                // $rate = \App\Models\Rating::where('courseid', $row->id)->avg('vote');
                            @endphp
                            <div class="col-lg-3 col-md-4">
                                <div class="fcrse_1 mt-30">
                                    <a href="{{ route('view.course', $row->id) }}" class="fcrse_img">
                                        <img src="{{ asset($row->media_thumbnail) }}" style="width:100%;height:150px;object-fit:cover;" alt="" />
                                        <div class="course-overlay">
                                            <span class="play_btn1"><i class="uil uil-play"></i></span>
                                        </div>
                                    </a>
                                    <div class="fcrse_content">
                                        <div class="vdtodt">
                                            <span class="vdt14">{{ $row->likes }} likes</span>
                                            <span class="vdt14">{{ \Carbon\Carbon::parse($row->created_at)->diffForhumans(); }}</span>
                                        </div>
                                        <a href="{{ route('view.course', $row->id) }}" class="crse14s">{{ $row->title }}</a>
                                        <div class="auth1lnkprce">
                                            <p class="cr1fot">By <a href="{{ route('view.user', $user->id) }}">{{ $user->fullname }}</a></p>
                                            <div class="prce142">
                                                @if(!$row->is_free)
                                                    FREE
                                                @else
                                                    {!! naira() . number_format($row->amount, 2) !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>

@endsection
