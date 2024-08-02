
@if ($errors->has($field))
    @if(count(($errors->get($field)))>1)
        @foreach($errors->get($field) as $error)
            @if(is_array($error))
                @foreach($error as $er)
                    <span class="invalid-feedback d-block" role="alert">{{ $er }}</span>
                @endforeach
            @else
            <span class="invalid-feedback d-block" role="alert">{{ $error }}</span>
            @endif
        @endforeach
    @else
        <span class="invalid-feedback d-block" role="alert">{{ $errors->first($field) }}</span>
    @endif
@endif
