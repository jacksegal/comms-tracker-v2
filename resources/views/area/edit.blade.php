@extends('layouts.model')

@section('model-content')

    @include('area._form', [
        'route' => '/areas/'.$area->id,
        'buttonLabel' => 'Update Area',
    ])

@endsection