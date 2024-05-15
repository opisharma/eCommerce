@extends('layouts.app')

@section('content')

<div class="content-body" style="min-height: 1116px">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('category')}}">Category</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('edit')}}">{{$category->category_name }}</a></li>
            </ol>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-inline">
                        Edit Category - {{$category->category_name }}
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="basic-form">
                            <form method="POST" action="{{ url('category/update') }}/{{$category->id }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Category Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$category->category_name }}" name="category_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Current Category Photo</label>
                                   <img width="100" height="80" src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}" alt="">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">New Category Photo</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="category_photo">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">Is Top Category</div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input id="check_box_top" class="form-check-input" type="checkbox" name="is_top_category" {{ ($category->is_top_category == 'yes')?'checked':'' }}>
                                            <label for="check_box_top" class="form-check-label">
                                                Yes
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-sm btn-primary">Edit Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


