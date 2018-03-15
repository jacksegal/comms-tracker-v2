<form method="POST" action="{{ $route }}">

    {{ csrf_field() }}

    @include('components.form._input-text', [
        'name' => 'email',
        'label' => 'Email Address',
        'model' => $user,
        'type' => 'email',
    ])

    @include('components.form._input-select-one', [
        'name' => 'role',
        'label' => 'Role',
        'options' => [
            'collection' => $roles,
            'key' => 'id',
            'value' => 'label',
        ],
        'selected' => [
            'collection' => isset($user) ? $user : false,
            'key' => 'role_id',
            'value' => 'id',
        ],
    ])

    @if($displayActive)
        <div class="checkbox">
            <label>
                <input name="active" type="checkbox" {{ $user->active ? 'checked' : '' }}> Active
            </label>
        </div>
    @endif

    @include('components.form._button_group', [
        'label' => $buttonLabel,
        'cancel' => '/users',
    ])

</form>