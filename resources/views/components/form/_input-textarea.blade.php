<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="input-{{$name}}">{{ $label }}</label>
    <textarea placeholder="{{ $label }}" id="input-{{$name}}"
              name={{ $name }}
                      class="form-control"
              rows="3">{{ old($name, isset($model->{$name}) ? $model->{$name} : null) }}</textarea>
    @if ($errors->has($name))
        <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>