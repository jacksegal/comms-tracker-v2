@extends('layouts.model')

@section('model-content')

    @include('medium._form', [
        'route' => '/mediums/'.$medium->id,
        'buttonLabel' => 'Update Medium',
    ])

@endsection