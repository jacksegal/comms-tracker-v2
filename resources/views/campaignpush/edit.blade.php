@extends('layouts.model')

@section('model-content')

    @include('campaignpush._form', [
        'route' => '/campainpushes/'.$campaignPush->id,
        'buttonLabel' => 'Update Push',
    ])

@endsection