@extends('layouts.app')
@section('content')
@section('title', 'Take Quiz')
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="st_title"><i class="uil uil-book-alt"></i>Take Quiz</h2>
            </div>
        </div>
    </div>
    <div class="mb4d25">
        <div class="container">
            @include('components.alert')
            <div class="course__form">
                <div class="general_info10">
                    @if(isset($_GET['query']))
                    <div class="table-responsive mt-30">
                        <table class="table ucp-table">
                            <thead class="thead-s">
                                <tr>
                                    <th class="text-center" scope="col">No.</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>SubCategory</th>
                                    <th>User</th>
                                    <th>Price</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $row)
                                @php
                                    $category = App\Models\Category::where("id", $row->categoryid)->first();
                                    $subcategory = App\Models\Category::where("id", $row->subcategory)->first();
                                    $user = App\Models\User::find($row->userid);
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $subcategory->name }}</td>
                                    <td>{{ $user->fullname }}</td>
                                    <td>{!! naira() . number_format($row->price, 2) !!}</td>
                                    <td>{{ $row->time}} Minutes</td>
                                    <td>{{ \Carbon\Carbon::parse($row->created_at)->format("D M, y")}} </td>
                                    <td class="text-center">
                                        <a href="{{ route('start.test', $row->id) }}" title="Start" class="gray-s"><i class="uil uil-play"></i> Start </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        {{-- Topics here --}}
                        <div class="row">
                            @foreach ($topics as $row)
                            <div class="col-6 col-sm-3">
                                <div class="fcrse_1 mt-30">
                                    <a href="/quiz/take-quiz?query=true&id={{ $row->id }}" class="fcrse_img">
                                        <img src="{{ asset($row->image) }}" style="width:100%;height:150px;object-fit:cover;" alt="" />
                                        <div class="course-overlay">
                                            <span class="play_btn1"><i class="uil uil-play"></i></span>
                                        </div>
                                    </a>
                                    <div class="fcrse_content">
                                        <a href="/quiz/take-quiz?query=true&id={{ $row->id }}" class="crse14s">{{ $row->name }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>

<script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
<script>
    $('#category').on("change", function(){
        let data = $( "#category option:selected" ).attr('data-json');
        let json = JSON.parse(data);
        let html = '<select class="form-control hj145 dropdown cntry152 prompt srch_explore" name="level" id="level" required>'
        json.forEach((item, index) => {
            html += `<option value=`+item.id+`>`+item.name+`</option>`;
        });

        html += '</select>';
        $('.__levelreplace').html(html);
    });
</script>
@endsection
