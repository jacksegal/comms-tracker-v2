<form method="POST" action="{{ $route }}">

    {{ csrf_field() }}

    @include('components.form._input-text', [
        'name' => 'label',
        'label' => 'Sub-Area',
        'model' => $subArea,
        'type' => 'text',
    ])

    @include('components.form._input-select-one', [
        'name' => 'area',
        'label' => 'Area',
        'options' => [
            'collection' => $areas,
            'key' => 'id',
            'value' => 'label',
        ],
        'selected' => [
            'collection' => isset($subArea) ? $subArea : false,
            'key' => 'area_id',
            'value' => 'id',
        ],
    ])

    @include('components.form._button_group', [
        'label' => $buttonLabel,
        'cancel' => '/subareas',
    ])

</form>