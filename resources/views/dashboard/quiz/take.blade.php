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
                                    $level = App\Models\Category::find($row->level);
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $level->name }}</td>
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
                                            @php
                                                $levels = App\Models\Category::where("parentid", $row->id)->get();
                                            @endphp
                                            <option value="{{ $row->id }}" data-json="{{ $levels }}" >{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="new-section mt-10">
                                <div class="form_group">
                                    <label class="label25">Level*</label>
                                    <div class="__levelreplace">
                                        <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="level" id="level" required>
                                            <option value="">Select level</option>
                                        </select>
                                    </div>
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
