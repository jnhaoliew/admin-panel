@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display:flex; justify-content: space-between; align-items: center">
                    <div>
                        {{ __('User list') }}
                    </div>
                    <a href="{{ route('user-add') }}" class="btn btn-primary" style="">Add</a>
                </div>

                <div class="card-body">
                    <div>
                    <table style="width:100%">
                        <tr style="font-weight: bold;border-bottom: 1px solid #ddd;">
                            <td style="padding-bottom: 5px;">ID</td>
                            <td style="padding-bottom: 5px;">Name</td>
                            <td style="padding-bottom: 5px;">Email</td>
                            <td style="padding-bottom: 5px;">Role</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role_name}}</td>
                            <td style="text-align-last: center;"><a class="btn btn-secondary" href="{{ route('user-edit', $user->id) }}">Edit</a></td>
                            <td style="text-align-last: center; padding:5px;"><a class="btn btn-danger" href="{{ route('user-delete', $user->id) }}">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
