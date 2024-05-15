@extends('layouts.master')

@section('content')

   <div class="container mt-4">
       <div class="row">
           <div class="col-12">
               <div class="card">
                   <div class="card-header">
                        Contact Form
                   </div>
                   <div class="card-body">
                       {{-- @if ($errors->any())

                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </div>

                       @endif --}}
                       @if (session('success_message'))

                            <div class="alert alert-success">
                                    {{session('success_message')}}
                            </div>

                       @endif
                      <form action="{{ url('contact/post') }}" method="POST">
                          @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">E-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Mesasge</label>
                            <textarea id="" class="form-control @error('message') is-invalid @enderror" rows="3"  name="message" >{{ old('message') }}</textarea>
                            @error('message')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success">Submit</button>
                        </div>
                      </form>
                   </div>
               </div>
           </div>
       </div>
   </div>

@endsection
