@extends('layouts.app')
@section('content')
@section('title', 'Test')

<div class="wrapper">
    <div class="_215b15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title126">
                        <h2>{{ $question->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="faq1256">
        <div class="container">
            <div class="initloader text-center">
                <img src="https://i.pinimg.com/originals/45/12/4d/45124d126d0f0b6d8f5c4d635d466246.gif" width="200" alt="">
            </div>

            <div class="row question__content" style="display:none">
                <div class="col-lg-4 col-md-6">
                    <div class="certi_form rght1528">
                        <div class="test_timer_bg">
                            <ul class="test_timer_left">
                                <li>
                                    <div class="timer_time">
                                        <h4 class="question__total"></h4>
                                        <p>Questions</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="timer_time">
                                        <h4 id="timer">{{ $question->time }}:00</h4>
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
                        <div class="all_questions_wrapper">
                            <div class="certi_form">
                                <div class="all_ques_lest"></div>
                                <input type="hidden" name="qid" value="{{ $question->id }}">
                                <input type="hidden" name="topic" value="{{ $question->topicid }}">
                                <input type="hidden" name="currentshow" class="currentshow" value="1">
                                <input type="hidden" name="currentshow" class="totalquestions" value="0">
                                <div style="display:flex;justify-content:space-between">
                                    <button class="test_previous_btn test_submit_btn" style="display:none" type="button">Previous</button>
                                    <button class="test_next_btn test_submit_btn" type="button">Next</button>
                                </div>
                            </div>
                        </div>

                        <div class="submit_quiz_wrapper" style="display: none">
                            <div class="text-center" style="margin-top:50px;">
                                <h2>Quiz completed</h2>
                                <p>You can submit your test now or go back to review</p>
                            </div>
                            <div  style="display:flex;justify-content:space-evenly">
                                <button class="go__back test_submit_btn " type="button">Back</button>
                                <button class="test_submit_btn" type="submit">Submit Test</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

            <div class="text-center no__question" style="display:none">
                <h1>No Question Uploaded yet</h1>
            </div>

        </div>
    </div>
    @include("components.footer")
</div>

<script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
<script>

    let index = 1;
    $('.go__back').on('click', function(){
        let current = $('.currentshow').val();
        $('.ques_item').css('display','none');
        $('.currentshow').val(parseInt(current)-1);
        let currentval = parseInt(current) - 1;
        $('.current__question_index'+currentval).css('display','block');
        $('.submit_quiz_wrapper').css("display", 'none');
        $('.all_questions_wrapper').css("display", 'block');
    })
    $('.test_next_btn').on('click', function(){
        let current = $('.currentshow').val();
        $('.ques_item').css('display','none');
        $('.currentshow').val(parseInt(current)+1);
        let currentval = parseInt(current) + 1;
        $('.current__question_index'+currentval).css('display','block');
        if(currentval > 1){
            $('.test_previous_btn').css("display", "block");
        }
        if(currentval > parseInt($('.totalquestions').val())){
           $('.submit_quiz_wrapper').css("display", 'block');
           $('.all_questions_wrapper').css("display", 'none');
        }
    });
    $('.test_previous_btn').on('click', function(){
        let current = $('.currentshow').val();
        $('.ques_item').css('display','none');
        $('.currentshow').val(parseInt(current)-1);
        let currentval = parseInt(current) - 1;
        $('.current__question_index'+currentval).css('display','block');
        if(currentval == 1){
            $('.test_previous_btn').css("display", "none");
        }
    });

    $(document).ready(function(){
        $('.initloader').css("display",'block');
        let loading = false;
        const BASE_URL = "{{ url('/') }}";
        const REQUEST_URL = "<?=Request::url()?>";
        let CSRF = "{{ csrf_token() }}";
        let id = "{{ $id }}"
        let quiz = [];

        let questions = ``;
       $.ajax({
            url: BASE_URL + `/api/quiz/get/${id}`,
            method:"GET",
            contentType: false,
            cache: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': CSRF},
            success: resp => {
                $('.initloader').css("display", 'none');
                quiz = resp.data;
                if(quiz.length == 0){
                    $('.no__question').css("display", 'block');
                }else{
                    $('.question__content').css("display", 'flex');
                    $('.question__total').text(quiz.length);
                    $('.totalquestions').val(quiz.length);
                    quiz.forEach((e) => {
                        let style = "style='display:none'";
                        if(index == 1){
                            style = "style='display:block'";
                        }


                        let __d = ``
                        if(e.d){
                            __d = `
                                    <div class="field">
                                        <div class="ui radio checkbox">
                                            <input id="d`+e.id+`" type="radio" name="option`+e.id+`" value="d" tabindex="0" class="hidden _changeoption" />
                                            <label for="d`+e.id+`">`+e.d+`</label>
                                        </div>
                                    </div>
                                `;
                        }

                        let __e = ``
                        if(e.e){
                            __e = `
                                    <div class="field">
                                        <div class="ui radio checkbox">
                                            <input id="e`+e.id+`" type="radio" name="option`+e.id+`" value="e" tabindex="0" class="hidden _changeoption" />
                                            <label for="e`+e.id+`">`+e.e+`</label>
                                        </div>
                                    </div>
                                `;
                        }
                        questions += `
                                <div class="ques_item current__question_index`+index+`" `+style+`>
                                    <div class="ques_title">
                                        <span>Question `+index+` :-</span>
                                        `+e.question+`
                                    </div>
                                    <div class="ui form">
                                        <div class="grouped fields">
                                            <input type="hidden" name="question[]" value="`+e.id+`" class="question">
                                            <input type="hidden" name="answer[]" value="" class="__answer">
                                            <input type="hidden" name="select[]" value="" class="__select">
                                            <input type="hidden" name="answer_option[]" value="`+e.answer_option+`" class="answer_option">
                                            <div class="field">
                                                <div class="ui radio checkbox">
                                                    <input id="a`+e.id+`" type="radio" name="option`+e.id+`" value="a" tabindex="0" class="hidden _changeoption" />
                                                    <label for="a`+e.id+`">`+e.a+`</label>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="ui radio checkbox">
                                                    <input id="b`+e.id+`" type="radio" name="option`+e.id+`" value="b" tabindex="0" class="hidden _changeoption" />
                                                    <label for="b`+e.id+`">`+e.b+`</label>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="ui radio checkbox">
                                                    <input id="c`+e.id+`" type="radio" name="option`+e.id+`" value="c" tabindex="0" class="hidden _changeoption" />
                                                    <label for="c`+e.id+`">`+e.c+`</label>
                                                </div>
                                            </div>
                                            `+__d+`
                                            `+ __e +`
                                        </div>
                                    </div>
                                </div>
                                    `;
                        index++;
                    })

                    $('.all_ques_lest').html(questions);
                }


            },
            error: err => {
                $('.initloader').css("display", 'none');

                alert("Error");
            }
       })
    })
    $('body').on('change', '._changeoption', function(){
        let _this = $(this);
        let parent = _this.parent();
        let grandparent = parent.parent();
        let greatparent = grandparent.parent();
        let question = greatparent.find('.question');
        let answer_option = greatparent.find('.answer_option');
        let answer = greatparent.find('.__answer');
        let select = greatparent.find('.__select');

        if(_this.is(":checked")){
            select.val(_this.val().toLowerCase());
            if(answer_option.val().toLowerCase() == _this.val() ){
                answer.val(1);
            }else{
                answer.val(0);
            }
        }
    })
</script>
@endsection
