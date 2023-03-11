@extends('layouts.app')
@section('content')
@section('title', 'Take Quiz')
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="st_title"><i class="uil uil-book-alt"></i>Search Quiz</h2>
            </div>
        </div>
    </div>
    <div class="mb4d25">
        <div class="container">
            @include('components.alert')
            <div class="course__form">
                <div class="general_info10">
                    @if(isset($_GET['q']))
                    <div class="table-responsive mt-30">
                        <table class="table ucp-table">
                            <thead class="thead-s">
                                <tr>
                                    <th class="text-center" scope="col">No.</th>
                                    <th>Category</th>
                                    <th>Level</th>
                                    <th>Name</th>
                                    <th>Time</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topics as $row)
                                @php
                                    $category = App\Models\Category::where("id", $row->category_id)->first();
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>Level {{ $row->level }}</td>
                                    <td>{{ $row->time}} Minutes</td>
                                    <td class="text-center">
                                        <a href="{{ route('start.test', $row->id) }}" title="Start" class="gray-s"><i class="uil uil-play"></i> Start </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <form action="" method="get">
                            <div class="new-section mt-10">
                                <div class="form_group">
                                    <label class="label25">Category*</label>
                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="category" id="category" required>
                                        <option value="">Select category</option>
                                        @foreach ($categories as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="new-section mt-10">
                                <div class="form_group">
                                    <label class="label25">Level*</label>
                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="level" id="level" required>
                                        <option value="">Select level</option>
                                        <option value="1">Level 1</option>
                                        <option value="2">Level 2</option>
                                        <option value="3">Level 3</option>
                                        <option value="4">Level 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-20">
                                <input type="hidden" name="q" value="true">
                                <button type="submit" class="main-btn js_update_lecture">Search </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>
@endsection
