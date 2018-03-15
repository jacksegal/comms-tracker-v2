@extends('layouts.model')

@section('model-content')

    @include('components.model._show-table', [
        'rows' => $rows,
    ])

@endsection