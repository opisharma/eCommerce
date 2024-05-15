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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-inline">
                        All messages
                        <button class="btn">
                                 <span class="badge text-white bg-primary">Total: {{ $contacts->count() }}</span>
                        </button>
                        <button class="btn">
                                 <span class="badge text-white bg-primary">Read: {{ $contacts->where('status', 'read')->count() }}</span>
                        </button>
                        <button class="btn">
                                 <span class="badge text-white bg-primary">Unread: {{ $contacts->where('status', 'unread')->count() }}</span>
                        </button>
                    </div>

                    <div class="card-body">
                       <table class="table table-bordered" id="message_table">
                           <thead>
                               <tr>
                                   <th>SL no</th>
                                   <th>Sender Name</th>
                                   <th>Sender E-mail</th>
                                   <th>Sender Message</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @forelse ($contacts as $contact)

                               <tr>
                                    <td scope="row">
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td> {{ $contact->name }} </td>
                                    <td> {{ $contact->email }} </td>
                                    <td> {{ $contact->message }} </td>
                                    <td> {{ $contact->status }} </td>
                                    <td>
                                        <button value="{{ url('delete/message') }}/{{ $contact->id }}" class="btn btn-sm btn-danger float-start delete_btn">Delete</button>
                                        @if ($contact->status == 'unread')
                                        <a href="{{ url('read/message') }}/{{ $contact->id }}" class="btn btn-sm btn-info float-end mt-2">Read</a>
                                        @endif

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
            $('#message_table').DataTable();
        });
    </script>
@endsection

