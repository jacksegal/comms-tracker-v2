<form method="POST" action="{{ $route }}">

    {{ csrf_field() }}


    @include('components.form._input-text', [
        'name' => 'label',
        'label' => 'Basket',
        'model' => $basket,
        'type' => 'text',
    ])


    @include('components.form._button_group', [
        'label' => $buttonLabel,
        'cancel' => '/baskets',
    ])

</form>