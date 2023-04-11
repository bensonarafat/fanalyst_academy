@extends('layouts.app')
@section('content')
@section('title', 'Result Score')

<div class="wrapper">
    <div class="faq1256">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="certi_form ">
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

                    <div class="">
                        <div class="">
                            @foreach ($quiz as $row)
                                <div class="ques_item">
                                    <div class="ques_title">
                                        <span>
                                            Question {{ $loop->iteration }}:-</span> {{ $row->question }}
                                        </span>
                                        <br/>
                                        @if(strtolower($row->answer_option) == "a")
                                        <span>
                                            <strong>Answer: </strong> {{ $row->a }}
                                        </span>
                                        @elseif(strtolower($row->answer_option) == "b")
                                        <span>
                                            <strong>Answer: </strong> {{ $row->b }}
                                        </span>
                                        @elseif(strtolower($row->answer_option) == "c")
                                        <span>
                                            <strong>Answer: </strong> {{ $row->c }}
                                        </span>
                                        @elseif(strtolower($row->answer_option) == "d")
                                        <span>
                                            <strong>Answer: </strong> {{ $row->d }}
                                        </span>
                                        @elseif(strtolower($row->answer_option) == "e")
                                        <span>
                                            <strong>Answer: </strong> {{ $row->e }}
                                        </span>
                                        @endif

                                        <div style="background:rgb(162, 208, 162);padding:10px;">
                                            <h4 style="color:white">Explanation</h4>
                                            <hr>
                                            <p style="color:white">
                                                {{ $row->explanation }}
                                            </p>

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
    @include("components.footer")
</div>
@endsection
