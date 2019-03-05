@extends('layouts.model')

@section('model-content')

    @include('campaignpush._form', [
        'route' => '/campaignpushes',
        'buttonLabel' => 'Create Push',
    ])

@endsection