@extends('layouts.app')

@section('content')

<div class="content-body" style="min-height: 1116px">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('category')}}">Category</a></li>
            </ol>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header d-inline">
                        All Categories
                        {{-- <button class="btn">
                                 <span class="badge text-white bg-primary">Total: {{ $contacts->count() }}</span>
                        </button>
                        <button class="btn">
                                 <span class="badge text-white bg-primary">Read: {{ $contacts->where('status', 'read')->count() }}</span>
                        </button>
                        <button class="btn">
                                 <span class="badge text-white bg-primary">Unread: {{ $contacts->where('status', 'unread')->count() }}</span>
                        </button> --}}
                    </div>

                    <div class="card-body">
                       <table class="table table-bordered" id="message_table">
                           <thead>
                               <tr>
                                   <th>SL no</th>
                                   <th>Category Name</th>
                                   <th>Category Photo</th>
                                   <th>Is Top Category</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @forelse ($categories as $category)

                               <tr>
                                    <td scope="row">
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td> {{ $category->category_name }} </td>
                                    <td>
                                        <img width="70" src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}" alt="">
                                    </td>
                                    <td> {{ $category->is_top_category }} </td>
                                    <td>
                                        <button value="{{ url('delete/category') }}/{{ $category->id }}" class="btn btn-sm btn-danger delete_btn">Delete</button>
                                        <a href="{{ url('category/edit') }}/{{ $category->id }}" class="btn btn-sm btn-info mt-1">Edit</a>
                                    </td>
                                </tr>

                               @empty
                                <tr class="text-center text-danger">
                                    <td colspan="50">Empty</td>
                                </tr>
                               @endforelse

                           </tbody>
                       </table>

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header d-inline">
                        Add Category

                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="basic-form">
                            <form method="POST" action="{{ url('category/insert') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Category Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-dark" placeholder="Category Name" name="category_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Category Photo</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="category_photo">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">Is Top Category</div>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input id="check_box_top" class="form-check-input" type="checkbox" name="is_top_category">
                                            <label for="check_box_top" class="form-check-label">
                                                Yes
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-sm btn-primary">Add Category</button>
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

@section('footer_scripts')
    <script>
        $(document).ready(function (){
            $('.delete_btn').click(function(){
                var link = $(this).val();
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                }
                })
            });
        });
    </script>
@endsection

