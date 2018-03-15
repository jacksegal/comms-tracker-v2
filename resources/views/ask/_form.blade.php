<form method="POST" action="{{ $route }}">

    {{ csrf_field() }}


    @include('components.form._input-text', [
        'name' => 'label',
        'label' => 'Ask',
        'model' => $ask,
        'type' => 'text',
    ])

    @include('components.form._input-text', [
        'name' => 'tag',
        'label' => 'Tag',
        'model' => $ask,
        'type' => 'text',
    ])

    @include('components.form._input-text', [
            'name' => 'color_font',
            'label' => 'Calendar Font Colour',
            'model' => $ask,
            'type' => 'color',
    ])

    @include('components.form._input-text', [
        'name' => 'color_background',
        'label' => 'Calendar Background Colour',
        'model' => $ask,
        'type' => 'color',
    ])

    @include('components.form._button_group', [
        'label' => $buttonLabel,
        'cancel' => '/asks',
    ])

</form>