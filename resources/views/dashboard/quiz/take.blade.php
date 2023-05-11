@extends('layouts.app')
@section('content')
@section('title', 'Take Quiz')
<div class="wrapper @guest _bg4586 _new89 @endguest">
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
                        <div class="row">
                            @foreach ($questions as $row)
                            @php
                                $user = \App\Models\User::find($row->userid);
                            @endphp
                            <div class="col-6 col-sm-3">
                                <div class="fcrse_1 mt-30">
                                    <a href="{{ route("view.test", $row->id) }}" class="fcrse_img">
                                        <img src="{{ asset($row->image) }}" style="width:100%;height:150px;object-fit:cover;" alt="" />
                                    </a>
                                    <div class="fcrse_content">
                                        <a href="{{ route("view.test", $row->id) }}" class="crse14s">{{ $row->name }}</a>
                                        <div class="" style="display:flex;justify-content: space-between;">
                                            <p style="font-size:11px;">
                                                By {{ $user->fullname }}
                                            </p>
                                            <p style="font-size:11px;">
                                                {{ $row->time }} Minutes
                                            </p>
                                        </div>
                                        <div class="auth1lnkprce">
                                            <p class="cr1fot">
                                                @if($row->isfree)
                                                    Free
                                                @else
                                                    From {!! naira() . number_format($row->price, 2) !!}
                                                @endif
                                            </p>
                                            <div class="prce142">
                                                <i class="fa fa-star" style="color: #FFD700;font-size: 12px;"></i>
                                                <span style="font-size: 13px;">{{ $row->ratings }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        {{-- Topics here --}}
                        <div class="row">
                            @foreach ($topics as $row)
                            <div class="col-6 col-sm-3">
                                <div class="fcrse_1 mt-30">
                                    <a href="/quiz/take-quiz?query=true&id={{ $row->id }}" class="fcrse_img">
                                        <img src="{{ asset($row->image) }}" style="width:100%;height:150px;object-fit:cover;" alt="" />
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
