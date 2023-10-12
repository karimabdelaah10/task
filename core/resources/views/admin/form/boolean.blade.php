<div class="{{@$attributes['col_class']}}  col-12">'
    <div class="mb-1">
        <label class="form-label">
            {{ @$attributes['label'] }}
            <span class="{{ (@$attributes['required'])?'required':'' }} text-danger">{{ (@$attributes['required'])?'*':'' }} {{ (@$attributes['stared'])?'*':'' }}</span>
        </label>
        <div class="form-check my-50">
            @php
                $attributes['class'] ='form-check-input'
            @endphp
            {!! Form::radio($name,1,$value,$attributes) !!}

            <label class="form-check-label">{{__('app.Yes')}}</label>
        </div>
        <div class="form-check">
            {!! Form::radio($name,0,!$value,$attributes) !!}
            <label class="form-check-label" for="validationRadio4">{{__('app.No')}}</label>
        </div>
    </div>
</div>
