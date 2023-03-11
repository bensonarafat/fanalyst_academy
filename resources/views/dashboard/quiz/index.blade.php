@extends('layouts.app')
@section('content')
@section('title', 'Quiz')

<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-book-alt"></i>Quiz</h2>
                </div>
                <div class="col-md-12">
                    <div class="card_dash1">
                        <div class="card_dash_left1">
                            <i class="uil uil-book-alt"></i>
                            <h1>Jump Into Quiz Creation</h1>
                        </div>
                        <div class="card_dash_right1">
                            <button class="create_btn_dash" onclick="window.location.href = '{{ route('add.topic') }}';">Create New Topic</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include("components.alert")
                    <div class="my_courses_tabs">
                        <ul class="nav nav-pills my_crse_nav" id="pills-tab" role="tablist">
                            @foreach ($categories as $row)
                            <li class="nav-item">
                                <a class="nav-link @if($loop->iteration == 1) active @endif" id="pills-{{ $row->id }}-tab" data-toggle="pill" href="#pills-{{ $row->id }}" role="tab" aria-controls="pills-{{ $row->id }}" aria-selected="@if($loop->iteration == 1) true @else false @endif">
                                    {{ $row->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @foreach ($categories as $row)
                            @php
                                $topics = \App\Models\Topic::where("category_id", $row->id)->latest()->get();
                            @endphp
                            <div class="tab-pane fade @if($loop->iteration == 1) show active @endif" id="pills-{{ $row->id }}" role="tabpanel">
                                <div class="table-responsive mt-30">
                                    <table class="table ucp-table">
                                        <thead class="thead-s">
                                            <tr>
                                                <th scope="col">SN.</th>
                                                <th>Name</th>
                                                <th class="text-center" scope="col">Level</th>
                                                <th class="text-center" scope="col">Time</th>
                                                <th class="text-center" scope="col">Created</th>
                                                <th class="text-center" scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($topics as $x)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $x->name }}</td>
                                                <td class="text-center">Level {{ $x->level }}</td>
                                                <td class="text-center">{{ $x->time }} Minute</td>
                                                <td class="text-center">{{ \Carbon\Carbon::parse($x->created_at)->format('d M, Y') }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route("add.quiz", $x->id) }}" title="Quiz" class="gray-s"><i class="uil uil-clipboard-alt"></i></a>
                                                    <a href="{{ route("edit.topic", $x->id) }}" title="Edit" class="gray-s"><i class="uil uil-edit-alt"></i></a>
                                                    <a href="{{ route("delete.topic", $x->id) }}" title="Delete" class="gray-s"><i class="uil uil-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
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
