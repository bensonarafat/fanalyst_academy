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
                                @php
                                    $answer =  \App\Models\Answer::where(["qid" => $row->qid, "topic" => $row->topic])->first();
                                @endphp
                                <div class="ques_item">
                                    <strong style="font-size:18px;">
                                        {{ $loop->iteration }}. {{ $row->question }}
                                    </strong>
                                    <div style="display:flex" style="font-size:16px;">

                                        <div class="maker">
                                           <span>@if(strtolower($answer->select) == "a" && strtolower($row->answer_option) != "a") <img src="{{ asset("assets/images/wrong.png") }}" style="width:20px;" alt=""> @endif</span> <span>@if(strtolower($row->answer_option) == "a") <img src="{{ asset("assets/images/correct.png") }}" style="width:20px;" alt=""> @endif</span> <br/>
                                           <span>@if(strtolower($answer->select) == "b" && strtolower($row->answer_option) != "b") <img src="{{ asset("assets/images/wrong.png") }}" style="width:20px;" alt=""> @endif</span>  <span>@if(strtolower($row->answer_option) == "b")<img src="{{ asset("assets/images/correct.png") }}"  style="width:20px;" alt=""> @endif </span> <br/>
                                           <span>@if(strtolower($answer->select) == "c" && strtolower($row->answer_option) != "c") <img src="{{ asset("assets/images/wrong.png") }}" style="width:20px;" alt=""> @endif</span>  <span>@if(strtolower($row->answer_option) == "c") <img src="{{ asset("assets/images/correct.png") }}"  style="width:20px;" alt=""> @endif </span> <br/>
                                           <span>@if(strtolower($answer->select) == "d" && strtolower($row->answer_option) != "d") <img src="{{ asset("assets/images/wrong.png") }}" style="width:20px;" alt=""> @endif</span>  <span>@if(strtolower($row->answer_option) == "d") <img src="{{ asset("assets/images/correct.png") }}"  style="width:20px;" alt="">@endif </span> <br/>
                                            @if($row->e)<span>@if(strtolower($answer->select) == "e" && strtolower($row->answer_option) != "e") <img src="{{ asset("assets/images/wrong.png") }}" style="width:20px;" alt=""> @endif</span>  <span>@if(strtolower($row->answer_option) == "e") <img src="{{ asset("assets/images/correct.png") }}"  style="width:20px;" alt=""> @endif </span>@endif
                                        </div>
                                        <div>
                                            <span>a. {{ $row->a }}</span> <br/>
                                            <span>b. {{ $row->b }}</span> <br/>
                                            <span>c. {{ $row->c }}</span> <br/>
                                            <span>d. {{ $row->d }}</span> <br/>
                                            @if($row->e) <span>e. {{ $row->e }}</span>@endif <br/>
                                        </div>
                                    </div>

                                    <p style="color:blue;margin-top:10px" >
                                        {{ $row->explanation }}
                                    </p>

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
