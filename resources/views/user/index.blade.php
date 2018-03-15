@extends('layouts.model')

@section('model-content')

    @include('components.model._index-table', [
        'label' => 'Users',
        'model' => 'user',
        'columns' => [
            ['header' => 'Email','row' => 'email'],
            ['header' => 'Role','nested' => true,'row1' => 'role','row2' => 'label', ],
            ['header' => 'Status','row' => 'active'],
        ],
        'rows' => $users,
    ])

@endsection