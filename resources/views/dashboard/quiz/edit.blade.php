@extends('layouts.app')
@section('content')
@section('title', 'Edit Quiz')


<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-book-alt"></i>Edit Quiz</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="my_courses_tabs" style="background: white; padding:10px">
                        @include("components.alert")
                        <form action="{{ route("update.quiz") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="new-section-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="course-main-tabs">
                                            <div class="ui search focus lbel25 mt-10">
                                                <label>Question*</label>
                                                <div class="ui form swdh30">
                                                    <div class="field">
                                                        <textarea rows="3" name="question" class="" required id="question" placeholder="question here...">{{ $quiz->question }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ui search focus mt-10 lbel25">
                                                <label>Option A*</label>
                                                <div class="ui left icon input swdh19">
                                                    <input class="prompt srch_explore" type="text" placeholder="Option A" required name="a"  id="a" value="{{ $quiz->a }}" />
                                                </div>
                                            </div>

                                            <div class="ui search focus mt-10 lbel25">
                                                <label>Option B*</label>
                                                <div class="ui left icon input swdh19">
                                                    <input class="prompt srch_explore" type="text" placeholder="Option B here" required name="b" id="b" value="{{ $quiz->b }}" />
                                                </div>
                                            </div>

                                            <div class="ui search focus mt-10 lbel25">
                                                <label>Option C*</label>
                                                <div class="ui left icon input swdh19">
                                                    <input class="prompt srch_explore" type="text" placeholder="Option C here" required name="c" id="c" value="{{ $quiz->c }}" />
                                                </div>
                                            </div>

                                            <div class="ui search focus mt-10 lbel25">
                                                <label>Option D</label>
                                                <div class="ui left icon input swdh19">
                                                    <input class="prompt srch_explore" type="text" placeholder="Option D here"  name="d" id="d" value="{{ $quiz->d }}" />
                                                </div>
                                            </div>

                                            <div class="ui search focus mt-10 lbel25">
                                                <label>Option E</label>
                                                <div class="ui left icon input swdh19">
                                                    <input class="prompt srch_explore" type="text" placeholder="Option E here" name="e" id="e" value="{{ $quiz->e }}" />
                                                </div>
                                            </div>

                                            <div class="ui search focus mt-10 lbel25">
                                                <div class="mt-30 lbel25">
                                                    <label>Answer*</label>
                                                </div>
                                                <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="answer" id="answer" required>
                                                    <option value="">Select answer</option>
                                                    <option value="a" @if($quiz->answer_option == "a") selected @endif>A</option>
                                                    <option value="b" @if($quiz->answer_option == "b") selected @endif>B</option>
                                                    <option value="c" @if($quiz->answer_option == "c") selected @endif>C</option>
                                                    <option value="d" @if($quiz->answer_option == "d") selected @endif>D</option>
                                                    <option value="e" @if($quiz->answer_option == "e") selected @endif>E</option>
                                                </select>
                                            </div>

                                            <div class="ui search focus lbel25 mt-10">
                                                <label>Explanation*</label>
                                                <div class="ui form swdh30">
                                                    <div class="field">
                                                        <textarea rows="3" name="explanation" class="" id="explanation" placeholder="Explanation here...">{{ $quiz->explanation }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-20">
                                <input type="hidden" name="id" value="{{ $quiz->id }}">
                                <button type="submit" class="main-btn">Update Question </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>


@endsection
