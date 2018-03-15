@extends('layouts.model')

@section('model-content')

    @include('medium._form', [
            'route' => '/mediums',
            'buttonLabel' => 'Create Medium',
    ])

@endsection