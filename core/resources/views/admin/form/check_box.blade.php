<div class="col-{{$attributes['col'] ?? '6'}} mb-1">
    <fieldset>
        <legend>
            {{$attributes['label']}}
            @if(!empty($attributes['required']) && $attributes['required'] == 1 )
                <span class="text-danger">*</span>
            @endif
        </legend>
        @foreach($options as $key => $value)

            <div class="form-check form-check-primary">
                <input
                    type="checkbox"
                    class="form-check-input"
                    name="{{$name}}"
                    value="{{$value}}"
                    id="{{$key}}"
{{--                    checked--}}
                />
                <label
                    class="form-check-label"
                    for="{{$key}}"
                >
                    {{$value}}
                </label>
            </div>
        @endforeach

    </fieldset>
</div>
