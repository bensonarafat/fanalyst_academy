@extends('layouts.app')
@section('content')
@section('title', 'Result Score')

<div class="wrapper">
    <div class="faq1256">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="certi_form rght1528">
                        <div class="test_result_bg">
                            <ul class="test_result_left">
                                <li>
                                    <div class="result_dt">
                                        <i class="uil uil-check right_ans"></i>
                                        <p>Right<span>( {{ count($right) }})</span></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="result_dt">
                                        <i class="uil uil-times wrong_ans"></i>
                                        <p>Wrong<span>( {{ count($wrong) }})</span></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="result_dt">
                                        <h4>{{  count($right) }}</h4>
                                        <p>Out of {{ count($answers) }}</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="result_content">
                                <h2>Congratulation! {{ auth()->user()->fullname }}</h2>
                                <p>You have completed your online test</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("components.footer")
</div>
@endsection
