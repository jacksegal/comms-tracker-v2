<form method="POST" action="{{ $route }}">

    {{ csrf_field() }}

    @include('components.form._input-text', [
        'name' => 'label',
        'label' => 'Area',
        'model' => $area,
        'type' => 'text',
    ])

    @include('components.form._input-select-one', [
        'name' => 'basket',
        'label' => 'Basket',
        'options' => [
            'collection' => $baskets,
            'key' => 'id',
            'value' => 'label',
        ],
        'selected' => [
            'collection' => isset($area) ? $area : false,
            'key' => 'basket_id',
            'value' => 'id',
        ],
    ])

    @include('components.form._button_group', [
        'label' => $buttonLabel,
        'cancel' => '/areas',
    ])

</form>