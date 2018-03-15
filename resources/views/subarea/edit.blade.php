@extends('layouts.model')

@section('model-content')

    @include('subarea._form', [
        'route' => '/subareas/'.$subArea->id,
        'buttonLabel' => 'Update Sub-Area',
    ])

@endsection