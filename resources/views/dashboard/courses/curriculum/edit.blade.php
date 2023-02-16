@extends('layouts.app')
@section('content')
@section('title', 'Edit Curriculum')
<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"> Curriculum</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="top_countries mt-50">
                        <div class="top_countries_title">
                            <h2>Edit curriculum</h2>
                        </div>

                        <div class="p-2">
                            <form action="{{ route('update.curriculum') }}" method="post">
                                @include("components.alert")
                                @csrf
                                <div class="col-lg-12 col-md-12">
                                    <div class="ui search focus mt-30 lbel25">
                                        <label>Name</label>
                                        <div class="ui left icon input swdh19">
                                            <input class="prompt srch_explore" type="text" placeholder="Name" name="name" data-purpose="edit-course-title" maxlength="60" id="name" value="{{ $curriculum->name }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <input type="hidden" name="id" value="{{ $curriculum->id }}">
                                    <button data-direction="next" class="btn btn-default steps_btn">Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("components.footer")
</div>
@endsection
