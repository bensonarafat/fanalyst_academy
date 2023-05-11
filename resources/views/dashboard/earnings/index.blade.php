@extends('layouts.app')
@section('title', 'Earnings')
@section('content')

<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-dollar-sign"></i> Earning</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="earning_steps">
                        <p>Sales earnings, after {{ config("app.name") }} fees</p>
                        <h2>{!! naira() !!} {{ number_format($total_earns, 2) }}</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="earning_steps">
                        <p>Your balance:</p>
                        <h2>{!! naira() !!} {{ number_format($wallet->balance, 2) }}</h2>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="table-responsive mt-30">
                        <table class="table ucp-table earning__table">
                            <thead class="thead-s">
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Earning</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($earnings as $row)
                                @php
                                    if($row->type == "quiz"){
                                        $question = App\Models\Question::find($row->questionid);
                                        $name = $question->name;
                                    }else{
                                        $course = App\Models\Course::find($row->courseid);
                                        $name = $course->title;
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $row->created_at->format("Y, m d") }}</td>
                                    <td>{{ ucfirst($row->type) }}</td>
                                    <td>{{ $name }}</td>
                                    <td>{!! naira() . number_format($row->amount, 2) !!}</td>
                                </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("components.footer")
</div>
@endsection
