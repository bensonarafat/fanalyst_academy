@extends('layouts.app')
@section('title', 'Edit Category')
@section('content')

<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"> Category</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="top_countries mt-50">
                        <div class="top_countries_title">
                            <h2>Edit Category</h2>

                        </div>
                        <div class="p-2">
                            <form action="{{ route('update.category') }}" method="post">
                                @include("components.alert")
                                @csrf
                                <div class="col-lg-12 col-md-12">
                                    <div class="ui search focus mt-30 lbel25">
                                        <label>Name</label>
                                        <div class="ui left icon input swdh19">
                                            <input class="prompt srch_explore" type="text" placeholder="Name" name="name" data-purpose="edit-course-title" maxlength="60" id="name" value="{{ $category->name }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="ui search focus lbel25 mt-30">
                                        <label>Description</label>
                                        <div class="ui form swdh30">
                                            <div class="field">
                                                <textarea rows="3" name="description" id="" placeholder="description here...">{{ $category->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2">
                                    <input type="hidden" name="id" value="{{ $category->id }}">
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
