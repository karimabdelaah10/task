<div class="{{@$attributes['col_class']}}  col-12">
    <div class="mb-1">
        <label class="form-label" for="{{$name}}">
            {{ @$attributes['label'] }}

            <span class="{{ (@$attributes['required'])?'required':'' }} text-danger">{{ (@$attributes['required'])?'*':'' }} {{ (@$attributes['stared'])?'*':'' }}</span>
        </label>
        {!! Form::$type($name,isset($value) ? $value : $row->$name ?? '',$attributes)!!}
    </div>
</div>
