@extends('layouts.model')

@section('model-content')

    @include('components.model._index-table', [
        'label' => 'Push',
        'model' => 'campaignpush',
        'columns' => [
            [
            	'header' => 'Push',
            	'row' => 'label'
            ],
            [
            	'header' => 'Sub-Area',
            	'nested' => true,
            	'row1' => 'subArea',
            	'row2' => 'label', 
            ],
            [
                'header' => 'Tag',
                'row' => 'tag'
            ],
        ],
        'rows' => $campaignPushes,
    ])

@endsection