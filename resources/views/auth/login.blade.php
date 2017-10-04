@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>

                    <div class="panel-body">
                        <a href="{{ url('/login/google') }}" role="button" class="btn btn-danger">
                            <i class="fa fa-google" aria-hidden="true" style="padding-right: 10px;"></i>
                            Login with Google
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection