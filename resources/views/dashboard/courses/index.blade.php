@extends('layouts.app')
@section('title', 'Courses')
@section('content')

@if(auth()->user()->type == 'instructor' || auth()->user()->type == 'admin')
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
                                            <th class="text-center" scope="col">Category</th>
                                            <th class="text-center" scope="col">Status</th>
                                            <th class="text-center" scope="col">Purchases</th>
                                            <th class="text-center" scope="col">Enrolled</th>
                                            @if(auth()->user()->type == 'admin')<th>Approve</th>@endif
                                            <th class="text-center" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $row)
                                        @php
                                            $category = \App\Models\Category::find($row->category);
                                            $transactionCount = \App\Models\Transaction::where(['courseid' => $row->id, 'status' =>  'success'])->count();
                                            $enrolledCount = \App\Models\Enrolled::where(['courseid' => $row->id])->count();
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('view.course', $row->id) }}">{{ $row->title }}</a></td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</td>
                                            <td class="text-center"><a href="/category/cat/{{ $category->id }}">{{ $category->name }}</a></td>
                                            <td class="text-center"><b class="course_active">{{ ucfirst($row->status) }}</b></td>
                                            <td class="text-center"><b class="course_active">{{ $transactionCount }}</b></td>
                                            <td class="text-center"><b class="course_active">{{ $enrolledCount }}</b></td>
                                            <td>
                                                <form action="{{ route('update.course.status') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                                    <select name="status" id="status" class="form-control" onchange="this.form.submit()">
                                                        <option value="pending" @if($row->status == 'pending') selected @endif>Pending</option>
                                                        <option value="active" @if($row->status == 'active') selected @endif>Active</option>
                                                        <option value="declined" @if($row->status == 'declined') selected @endif>Declined</option>
                                                    </select>
                                                </form>
                                            </td>
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
        @include('components.footer')
    </div>
@else
<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-8">
                    <div class="section3125">
                        <div class="explore_search">
                            <div class="ui search focus">
                                <div class="ui left icon input swdh11">
                                    <input class="prompt srch_explore" type="text" placeholder="Search for Tuts Videos, Tutors, Tests and more.." />
                                    <i class="uil uil-search-alt icon icon2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="_14d25">
                        <div class="row">
                            @foreach ($courses as $row)
                            @php
                                $user = \App\Models\User::find($row->instructor);
                            @endphp
                            <div class="col-lg-3 col-md-4">
                                <div class="fcrse_1 mt-30">
                                    <a href="{{ route('view.course', $row->id) }}" class="fcrse_img">
                                        <img style="width:100%;height:150px;object-fit:cover;" src="{{ asset($row->media_thumbnail) }}" alt="" />
                                        <div class="course-overlay">

                                        </div>
                                    </a>
                                    <div class="fcrse_content">
                                        <div class="vdtodt">
                                            <span class="vdt14">{{ $row->likes }} likes</span>
                                            <span class="vdt14">{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</span>
                                        </div>
                                        <a href="{{ route('view.course', $row->id) }}" class="crse14s">{{ $row->title }}</a>
                                        <div class="auth1lnkprce">
                                            <p class="cr1fot">By <a href="#">{{ $user->fullname }}</a></p>
                                            <div class="prce142">
                                                @if(!$row->is_free)
                                                    FREE
                                                @else
                                                    {!! naira() . number_format($row->amount, 2) !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>
@endif
@endsection
