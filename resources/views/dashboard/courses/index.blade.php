@extends('layouts.app')
@section('title', 'Courses')
@section('content')

<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-book-alt"></i>Courses</h2>
                </div>
                <div class="col-md-12">
                    <div class="card_dash1">
                        <div class="card_dash_left1">
                            <i class="uil uil-book-alt"></i>
                            <h1>Jump Into Course Creation</h1>
                        </div>
                        <div class="card_dash_right1">
                            <button class="create_btn_dash" onclick="window.location.href = '/courses/create';">Create Your Course</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include('components.alert')
                    <div class="my_courses_tabs">

                        <div class="table-responsive mt-30">
                            <table class="table ucp-table">
                                <thead class="thead-s">
                                    <tr>
                                        <th class="text-center" scope="col">Item No.</th>
                                        <th>Title</th>
                                        <th class="text-center" scope="col">Publish Date</th>
                                        <th class="text-center" scope="col">Sales</th>
                                        <th class="text-center" scope="col">Category</th>
                                        <th class="text-center" scope="col">Status</th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $row)
                                    @php
                                        $category = \App\Models\Category::find($row->category);
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('view.course', $row->id) }}">{{ $row->title }}</a></td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</td>
                                        <td class="text-center">15</td>
                                        <td class="text-center"><a href="/category/cat/{{ $category->id }}">{{ $category->name }}</a></td>
                                        <td class="text-center"><b class="course_active">{{ ucfirst($row->status) }}</b></td>
                                        <td class="text-center">
                                            <a href="{{ route('edit.course', $row->id) }}" title="Edit" class="gray-s"><i class="uil uil-edit-alt"></i></a>
                                            <a href="{{ route('delete.course', $row->id) }}" title="Delete" class="gray-s"><i class="uil uil-trash-alt"></i></a>
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
    @include('components.other_footer')
</div>

@endsection
