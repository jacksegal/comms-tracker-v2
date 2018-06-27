<form method="POST" action="{{ $route }}">

    {{ csrf_field() }}


    {{-- Basket --}}
    @include('components.form._input-text', [
        'name' => 'label',
        'label' => 'Basket',
        'model' => $basket,
        'type' => 'text',
    ])

    {{-- Tag --}}
    @include('components.form._input-text', [
        'name' => 'tag',
        'label' => 'Tag',
        'model' => $basket,
        'type' => 'text',
    ])

    {{-- Submit --}}
    @include('components.form._button_group', [
        'label' => $buttonLabel,
        'cancel' => '/baskets',
    ])

</form>