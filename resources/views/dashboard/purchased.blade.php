@extends('layouts.app')
@section('title', 'Thank You')
@section('content')

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cmtk_group">
                    @if($status == 'success')
                    <div class="cmtk_dt">
                        <h1 class="thnk_coming_title">Thank You</h1>
                        <h4 class="thnk_title1">Your Order is Confirmed!</h4>
                    </div>
                    <div style="margin:15px;text-align:center">
                        <a href="{{ route("explore") }}" class="upload_btn" title="Explore">Explore More</a>
                    </div>
                    @else
                    <div class="cmtk_dt">
                        <h1 class="thnk_coming_title">Ooops, payment error</h1>
                        <h4 class="thnk_title1">There was an error, making payment for this course</h4>
                    </div>
                    <div style="margin:15px;text-align:center">
                        <a href="{{ route("cart") }}" class="upload_btn" title="Try Again">Try Again</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
