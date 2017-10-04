@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Role</div>

                    <div class="panel-body">

                        @include('role._form', [
                            'action' => 'Create',
                            'route' => '/role',
                            'buttonLabel' => 'Create Role',
                        ])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection