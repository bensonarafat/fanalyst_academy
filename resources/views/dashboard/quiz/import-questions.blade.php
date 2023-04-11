@extends('layouts.app')
@section('content')
@section('title', 'Import Question')


<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-book-alt"></i>Import Question</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="my_courses_tabs" style="background: white; padding:10px">
                        @include("components.alert")
                        <form action="{{ route("store.import.questions") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="new-section-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="course-main-tabs">

                                            <div class="ui search focus mt-10 lbel25">
                                                <div class="mt-30 lbel25">
                                                    <label>Topic*</label>
                                                </div>
                                                <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="topic" id="topic" required>
                                                    <option value="">Select topic</option>
                                                    @foreach ($topics as $topic)
                                                    @php
                                                        $category = App\Models\Category::where("id", $topic->category_id)->first();
                                                        $level = App\Models\Category::where("id", $topic->level)->first();
                                                    @endphp
                                                        <option value="{{ $topic->id }}">{{ $topic->name }} - {{ $category->name }} - {{ $level->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="ui search focus mt-10 lbel25">
                                                <label>File* <small>(must be csv)</small></label>
                                                <div class="ui left icon input swdh19">
                                                    <input class="prompt srch_explore" type="file"  required name="file" id="file" />
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-20">
                                <button type="submit" class="main-btn">Import Questions </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>


@endsection
