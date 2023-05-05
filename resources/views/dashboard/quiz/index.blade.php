@extends('layouts.app')
@section('content')
@section('title', 'Quiz')

<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            @if(auth()->user()->type == "admin")
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
            @endif
            <div class="row">
                <div class="col-md-12">
                    @include("components.alert")
                    <table class="table ucp-table">
                        <thead class="thead-s">
                            <tr>
                                <th scope="col">SN.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th class="text-center" scope="col">Created</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topics as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset($row->image) }}" alt="" style="width:50px;height:50px;object-fit:contain;"></td>
                                <td>{{ $row->name }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route("questions", $row->id) }}" title="Question" class="gray-s"><i class="uil uil-clipboard-alt"></i></a>
                                    @if(auth()->user()->type == "admin")
                                        <a href="{{ route("delete.topic", $row->id) }}" title="Delete" class="gray-s"><i class="uil uil-trash-alt"></i></a>
                                        <a href="{{ route("edit.topic", $row->id) }}" title="Edit" class="gray-s"><i class="uil uil-edit-alt"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include("components.footer")
</div>
@endsection
