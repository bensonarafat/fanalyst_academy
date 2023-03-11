@extends('layouts.app')
@section('content')
@section('title', 'Quiz')

<form action="{{ route("store.quiz") }}" method="post">
    @csrf
    <div class="modal fade" id="add_lecture_model" tabindex="-1" aria-labelledby="lectureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lectureModalLabel">Add Lecture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="new-section-block">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="course-main-tabs">

                                    <div class="ui search focus lbel25 mt-10">
                                        <label>Question*</label>
                                        <div class="ui form swdh30">
                                            <div class="field">
                                                <textarea rows="3" name="question" class="" required id="question" placeholder="question here..."></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ui search focus mt-10 lbel25">
                                        <label>Option A*</label>
                                        <div class="ui left icon input swdh19">
                                            <input class="prompt srch_explore" type="text" placeholder="Option A" required name="a"  id="a" value="" />
                                        </div>
                                    </div>

                                    <div class="ui search focus mt-10 lbel25">
                                        <label>Option B*</label>
                                        <div class="ui left icon input swdh19">
                                            <input class="prompt srch_explore" type="text" placeholder="Option B here" required name="b" id="b" value="" />
                                        </div>
                                    </div>

                                    <div class="ui search focus mt-10 lbel25">
                                        <label>Option C*</label>
                                        <div class="ui left icon input swdh19">
                                            <input class="prompt srch_explore" type="text" placeholder="Option C here" required name="c" id="c" value="" />
                                        </div>
                                    </div>

                                    <div class="ui search focus mt-10 lbel25">
                                        <label>Option D*</label>
                                        <div class="ui left icon input swdh19">
                                            <input class="prompt srch_explore" type="text" placeholder="Option D here" required name="d" id="d" value="" />
                                        </div>
                                    </div>

                                    <div class="ui search focus mt-10 lbel25">
                                        <div class="mt-30 lbel25">
                                            <label>Answer*</label>
                                        </div>
                                        <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="answer" id="answer" required>
                                            <option value="">Select answer</option>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="topic" id="topic" value="{{ $topic->id }}">
                    <button type="button" class="main-btn cancel" data-dismiss="modal">Close</button>
                    <button type="submit" class="main-btn">Add Question</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-book-alt"></i>Questions</h2>
                </div>
                <div class="col-md-12">
                    <div class="card_dash1">
                        <div class="card_dash_left1">
                            <i class="uil uil-book-alt"></i>
                            <h1>Jump Into Questions Creation</h1>
                        </div>
                        <div class="card_dash_right1">
                            <button class="create_btn_dash" data-toggle="modal" data-target="#add_lecture_model">Create New Question</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include("components.alert")
                    <div class="my_courses_tabs">

                        <div class="table-responsive mt-30">
                            <table class="table ucp-table">
                                <thead class="thead-s">
                                    <tr>
                                        <th scope="col">SN.</th>
                                        <th>Topic</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Created</th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quiz as $row)
                                    @php
                                        $topic = \App\Models\Topic::where("id", $row->topic)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $topic->name }}</td>
                                        <td>{{ $row->question }}</td>
                                        <td>{{ $row->answer }}</td>
                                        <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route("edit.quiz", $row->id) }}" title="Edit" class="gray-s"><i class="uil uil-edit-alt"></i></a>
                                            <a href="{{ route("delete.quiz", $row->id) }}" title="Delete" class="gray-s"><i class="uil uil-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("components.footer")
</div>

@endsection
