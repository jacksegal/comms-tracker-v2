@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create User</div>

                    <div class="panel-body">

                        @include('user._form', [
                            'route' => '/user',
                            'buttonLabel' => 'Create User',
                            'displayActive' => false,
                        ])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection