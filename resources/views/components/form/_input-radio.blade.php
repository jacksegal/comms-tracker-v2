<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}  {{ isset($class) ? $class : null }}">
    <label for="input-{{$name}}">{{ $label }}</label>


    @foreach($options as $option)
        <div class="radio">
          <label>

            @if (isset($model->{$name}) && $model->{$name} == $option['key'])
                <input checked type="radio" name="{{ $name }}" value="{{ $option['key'] }}">
            @elseif ($loop->first)
                <input checked type="radio" name="{{ $name }}" value="{{ $option['key'] }}">
            @else
                <input type="radio" name="{{ $name }}" value="{{ $option['key'] }}">
            @endif

            {{ $option['value'] }}
          </label>
        </div>
    @endforeach

    @if ($errors->has($name))
        <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>