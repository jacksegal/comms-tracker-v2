@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">
                        <table id="user_table" class="table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->label }}</td>
                                    <td>{{ $user->active }}</td>
                                    <td><a href="/user/{{$user->id}}">edit</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <a href="/user" class="btn btn-primary" role="button">Create New User</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection