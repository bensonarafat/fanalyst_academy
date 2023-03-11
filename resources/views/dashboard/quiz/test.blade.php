@extends('layouts.app')
@section('content')
@section('title', 'Test')

<div class="wrapper">
    <div class="_215b15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title126">
                        <h2>{{ $topic->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="faq1256">
        <div class="container">
            @if(count($quiz) != 0)
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="certi_form rght1528">
                        <div class="test_timer_bg">
                            <ul class="test_timer_left">
                                <li>
                                    <div class="timer_time">
                                        <h4>{{ count($quiz) }}</h4>
                                        <p>Questions</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="timer_time">
                                        <h4 id="timer">{{ $topic->time }}:00</h4>
                                        <p>Minutes</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    @include("components.alert")
                    <form action="{{ route("submit.quiz") }}" method="post">
                        @csrf
                        <div class="certi_form">
                            <div class="all_ques_lest">
                                @foreach ($quiz as $row)
                                    <div class="ques_item">
                                        <div class="ques_title">
                                            <span>Question {{ $loop->iteration }} :-</span>
                                           {{ $row->question }}
                                        </div>
                                        <div class="ui form">
                                            <div class="grouped fields">
                                                <input type="hidden" name="question[]" value="{{ $row->id }}" class="question">
                                                <input type="hidden" name="answer[]" value="" class="__answer">
                                                <input type="hidden" name="select[]" value="" class="__select">
                                                <input type="hidden" name="answer_option[]" value="{{ $row->answer_option }}" class="answer_option">
                                                <div class="field fltr-radio">
                                                    <div class="ui radio checkbox">
                                                        <input type="radio" name="option{{ $row->id }}" value="a" tabindex="0" class="hidden _changeoption" />
                                                        <label>{{ $row->a }}</label>
                                                    </div>
                                                </div>
                                                <div class="field">
                                                    <div class="ui radio checkbox">
                                                        <input type="radio" name="option{{ $row->id }}" value="b" tabindex="0" class="hidden _changeoption" />
                                                        <label>{{ $row->b }}</label>
                                                    </div>
                                                </div>
                                                <div class="field">
                                                    <div class="ui radio checkbox">
                                                        <input type="radio" name="option{{ $row->id }}" value="c" tabindex="0" class="hidden _changeoption" />
                                                        <label>{{ $row->c }}</label>
                                                    </div>
                                                </div>
                                                <div class="field fltr-radio">
                                                    <div class="ui radio checkbox">
                                                        <input type="radio" name="option{{ $row->id }}" value="d" tabindex="0" class="hidden _changeoption" />
                                                        <label>{{ $row->d }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                            <input type="hidden" name="topic" value="{{ $row->topic }}">
                            <button class="test_submit_btn" type="submit">Submit Test</button>
                        </div>
                    </form>

                </div>
            </div>
            @else
                <div class="text-center">
                    <h1>No Question Uploaded yet</h1>
                </div>
            @endif
        </div>
    </div>
    @include("components.footer")
</div>
<script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
<script>
    $('._changeoption').on("change", function(){
        let _this = $(this);
        let parent = _this.parent();
        let grandparent = parent.parent();
        let greatparent = grandparent.parent();
        let question = greatparent.find('.question');
        let answer_option = greatparent.find('.answer_option');
        let answer = greatparent.find('.__answer');
        let select = greatparent.find('.__select');
        if(_this.is(":checked")){
            if(answer_option.val() == _this.val() ){
                console.log(answer_option.val());
                select.val(answer_option.val());
                answer.val(1);
            }else{
                answer.val(0);
            }
        }
    })
</script>
@endsection
