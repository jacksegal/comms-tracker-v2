<form method="POST" action="{{ $route }}">

    {{ csrf_field() }}

    @include('components.form._input-text', [
        'name' => 'label',
        'label' => 'Label',
        'model' => $role,
        'type' => 'text',
    ])

    @include('components.form._input-select-many', [
        'name' => 'permissions',
        'label' => 'Permissions',
        'options' => [
            'collection' => $permissions,
            'key' => 'id',
            'value' => 'label',
        ],
        'selected' => [
            'collection' => isset($role) ? $role->permissions : false,
            'key' => 'id',
            'value' => 'id',
        ],
    ])

    @include('components.form._button_group', [
        'label' => $buttonLabel,
        'cancel' => '/roles',
    ])

</form>