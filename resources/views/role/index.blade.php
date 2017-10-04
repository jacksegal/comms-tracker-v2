@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Roles</div>

                    <div class="panel-body">
                        <table id="role_table" class="table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Role</th>
                                <th>Permissions</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->label }}</td>
                                    <td>
                                        @foreach($role->permissions as $permission)
                                            {{ $permission->label }},
                                        @endforeach

                                    </td>
                                    <td><a href="/role/{{$role->id}}">edit</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <a href="/role" class="btn btn-primary" role="button">Create New Role</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection