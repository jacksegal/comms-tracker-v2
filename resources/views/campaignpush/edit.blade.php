@extends('layouts.model')

@section('model-content')

    @include('campaignpush._form', [
        'route' => '/campaignpushs/'.$campaignPush->id,
        'buttonLabel' => 'Update Push',
    ])

@endsection