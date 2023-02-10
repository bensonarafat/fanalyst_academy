@extends("layouts.app")
@section("content")
@section("title", "Home")

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
