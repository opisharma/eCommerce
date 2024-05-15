@extends('layouts.app')

@section('content')

<div class="content-body" style="min-height: 1116px">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('messages')}}">Messages</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{ asset('uploads/profile_photos') }}/{{ auth()->user()->profile_photo }}" class="img-fluid rounded-circle" alt="not found">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ auth()->user()->name }}</h4>
                                    <p>Name</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ auth()->user()->email }}</h4>
                                    <p>Email</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ auth()->user()->created_at->diffForHumans() }}</h4>
                                    <p>Account Created Date</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" id="name_change">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Name Change</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ url('change/name') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label  class="form-label">Name</label>
                                <input type="text"class="form-control border-dark" name="name" value="{{ auth()->user()->name }}">
                              </div>
                              <div class="mb-3">
                               <button type="submit" class="btn btn-sm btn-success">Change Name</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" id="profile_upload">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Upload Profile Photo</h4>
                    </div>
                    <div class="card-body">
                        @if (session('profile_success'))
                            <div class="alert alert-success">
                                {{ session('profile_success') }}
                            </div>
                        @endif
                        <form action="{{ url('change/photo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label  class="form-label">Profile Photo</label>
                                <input type="file"class="form-control" name="profile_photo">
                              </div>
                              <div class="mb-3">
                               <button type="submit" class="btn btn-sm btn-success">Upload</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12" id="change_password">
                
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Your Password</h4>
                    </div>
                    <div class="card-body">
                        @if (session('p_success'))
                            <div class="alert alert-success">
                                {{ session('p_success') }}
                            </div>
                        @endif
                        @if (session('unmatched_pass'))
                            <div class="alert alert-danger">
                                {{ session('unmatched_pass') }}
                            </div>
                        @endif
                        @if (session('unmatched_current_pass'))
                            <div class="alert alert-danger">
                                {{ session('unmatched_current_pass') }}
                            </div>
                        @endif
                        <form action="{{ url('change/password') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label  class="form-label">Current Password</label>
                                    <input type="password"class="form-control border-dark" name="current_password">
                                </div>
                                <div class="mb-3 col-4">
                                    <label  class="form-label">New Password</label>
                                    <input type="password"class="form-control border-dark" name="password">
                                </div>
                                <div class="mb-3 col-4">
                                    <label  class="form-label">Confirm New Password</label>
                                    <input type="password"class="form-control border-dark" name="password_confirmation">
                                </div>
                                <div class="mb-3">
                                   <button type="submit" class="btn btn-sm btn-success">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
