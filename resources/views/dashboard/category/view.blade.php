@extends('layouts.app')
@section('title', $category->name)
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
                            @endphp
                            <div class="col-lg-3 col-md-4">
                                <div class="fcrse_1 mt-30">
                                    <a href="{{ route('view.course', $row->id) }}" class="fcrse_img">
                                        <img style="width:100%;height:150px;object-fit:cover;" src="{{ asset($row->media_thumbnail) }}" alt="" />
                                        <div class="course-overlay">

                                        </div>
                                    </a>
                                    <div class="fcrse_content">
                                        <div class="vdtodt">
                                            <span class="vdt14">{{ $row->likes }} likes</span>
                                            <span class="vdt14">{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</span>
                                        </div>
                                        <a href="{{ route('view.course', $row->id) }}" class="crse14s">{{ $row->title }}</a>
                                        <div class="auth1lnkprce">
                                            <p class="cr1fot">By <a href="#">{{ $user->fullname }}</a></p>
                                            <div class="prce142">{!! naira() . number_format($row->amount, 2) !!}</div>
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
