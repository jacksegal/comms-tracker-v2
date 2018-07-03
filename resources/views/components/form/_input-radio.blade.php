<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}  {{ isset($class) ? $class : null }}">
    <label for="input-{{$name}}">{{ $label }}</label>


    @foreach($options as $option)
        <div class="radio">
          <label>
            <input @if ($loop->first) checked @endif type="radio" name="{{ $name }}" value="{{ $option['key'] }}">
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