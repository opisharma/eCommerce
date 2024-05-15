@extends('layouts.app')

@section('content')

<div class="content-body" style="min-height: 1116px">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('product')}}">Product</a></li>
            </ol>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
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
                               {{-- @forelse ($categories as $category)

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
                               @endforelse --}}

                           </tbody>
                       </table>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-inline">
                        Add Category

                    </div>

                    <div class="card-body">
                        @if (session('product_add'))
                            <div class="alert alert-success">
                                {{ session('product_add') }}
                            </div>
                        @endif
                        @if (session('regular_price_error'))
                            <div class="alert alert-danger">
                                {{ session('regular_price_error') }}
                            </div>
                        @endif
                        <div class="basic-form">
                            <form method="POST" action="{{ url('product/insert') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Category Name</label>
                                    <div class="col-sm-8">
                                        <select name="category_id" class="form-control">
                                            <option value="">--Select One Category--</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category -> id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Product Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-dark"  name="product_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Product Short Description</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control border-dark" name="product_short_description" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Product Long Description</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control border-dark" name="product_long_description" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Product Regular Price</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control border-dark" name="product_regular_price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Product Discounted Price</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control border-dark" name="product_discounted_price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Product Additional Information</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control border-dark" name="product_additional_information" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Product Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control border-dark" name="product_quantity">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Product Thumbnail Photo</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control border-dark" name="product_thumbnail_photo">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-sm btn-primary">Add Product</button>
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
{{--
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
@endsection --}}

