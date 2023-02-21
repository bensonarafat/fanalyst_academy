@extends("layouts.app")
@section("content")
@section("title", 'Home ' . config('app.name'))
@section('description', 'Fanalyst Academy is a dynamic and innovative provider of finance education and training. With a passion for empowering individuals and organizations to reach their full financial potential, we offer a range of tuition services and resources to help our students achieve their career and financial goals.')
@section('url', config('app.url') )
@section('image', asset('assets/images/logo.png') )
{{--
    Dashboard Index
--}}
@auth
    @if(auth()->user()->type == "admin" || auth()->user()->type == "instructor")
        @include("dashboard.instructor")
    @else
        @include("dashboard.student")
    @endif
@endauth

{{--
    Main Page
--}}
@guest
    @include("main")
@endguest

@endsection
