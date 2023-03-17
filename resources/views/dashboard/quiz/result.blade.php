@extends('layouts.app')
@section('content')
@section('title', 'Result Quiz')

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="st_title"><i class="uil uil-book-alt"></i>View Result</h2>
            </div>
        </div>
    </div>
    <div class="mb4d25">
        <div class="container">
            @include('components.alert')
            <div class="course__form">
                <div class="general_info10">

                    <div class="table-responsive mt-30">
                        <table class="table ucp-table">
                            <thead class="thead-s">
                                <tr>
                                    <th class="text-center" scope="col">No.</th>
                                    <th>Category</th>
                                    <th>Level</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($answers as $row)
                                @php
                                    $ans = App\Models\Answer::where("ref",$row->ref)->first();
                                    $topic = App\Models\Topic::where("id",$ans->topic)->first();
                                    $category = App\Models\Category::where("id", $topic->category_id)->first();
                                    $level = App\Models\Category::where("id", $topic->level)->first();
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $level->name }}</td>
                                    <td>{{ $topic->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($ans->created_at)->format('d M, Y')  }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('result.score', $row->ref) }}" title="Result" class="gray-s"><i class="uil uil-eye"></i> View </a>
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
    @include('components.footer')
</div>

@endsection
