@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                            <p>Name: {{ auth()->user()->name}}</p>
                            <p>e-mail: {{ auth()->user()->email}}</p>
                            <p>Created at: {{ auth()->user()->created_at}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

