@extends("layouts.app")
@section("content")
@section("title", "Home")

{{--
    Dashboard Index
--}}
@auth
    @include("dashboard.index")
@endauth

{{--
    Main Page
--}}
@guest
    @include("main")
@endguest

@endsection
