<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="input-{{$name}}">{{ $label }}</label>
    <input {{ isset($required) ? $required : null }}  type="{{ $type }}" value="{{ old($name, isset($model->{$name}) ? $model->{$name} : null) }}" name={{ $name }}
            class="form-control" id="input-{{$name}}"
           placeholder="{{ $label }}">
    @if ($errors->has($name))
        <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
    @endif
</div>