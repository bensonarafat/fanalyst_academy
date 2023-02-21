@extends('layouts.main')
@section('title', 'Explore')
@section('content')
@section('description', 'Our online platform offers a flexible and convenient way to learn, with a variety of finance certification exams, including ACCA, CFA, ICAN, and FRM, as well as courses in personal finance, and corporate finance.')
@section('url', config('app.url') . '/courses-section' )
@section('image', asset('assets/images/logo.png') )


<div class="wrapper _bg4586 _new89">
    <div class="_215b15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title125">
                        <div class="titleleft">
                            <div class="ttl121">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Explore</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="title126">
                        <h2>@yield('title')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="faq1256">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="fcrse_3 frc123">
                        <ul class="ttrm15">
                            <li><a href="/explore-view" class="tt_item active">Corporate Finance </a></li>
                            <li><a href="/explore-view?explore=personal" class="tt_item">Personal Finance </a></li>
                            <li><a href="/explore-view?explore=frm" class="tt_item">FRM <sup>®</sup></a></li>
                            <li><a href="/explore-view?explore=ican" class="tt_item">ICAN <sup>®</sup></a></li>
                            <li><a href="/explore-view?explore=cfa" class="tt_item">CFA <sup>®</sup></a></li>
                            <li><a href="/explore-view?explore=acca" class="tt_item">ACCA <sup>®</sup></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                   @if(isset($_GET['explore']))
                    @if($_GET['explore'] == 'personal')
                        @include('explore.personal')
                    @elseif($_GET['explore'] == 'frm')
                        @include('explore.frm')
                    @elseif($_GET['explore'] == 'ican')
                        @include('explore.ican')
                    @elseif($_GET['explore'] == 'cfa')
                        @include('explore.cfa')
                    @elseif($_GET['explore'] == 'acca')
                        @include('explore.acca')
                    @else
                        @include('explore.corporate')
                    @endif
                   @else
                    @include('explore.corporate')
                   @endif
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>
@endsection
