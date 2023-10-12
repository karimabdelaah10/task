@foreach(config("translatable.locales") as $lang)
    @php
        $attributes=[
            'class'=>'form-control',
            'col_class'=>'col-md-6',
            'label'=>__(\App\Modules\BaseApp\Enums\BaseAppEnums::COUNTRY_MODULE_PREFIX . '.name').' '.$lang,
            'placeholder'=>__(\App\Modules\BaseApp\Enums\BaseAppEnums::COUNTRY_MODULE_PREFIX . '.name').' '.$lang,
            'required'=>1,
            ];
    @endphp
    @include('admin.form.input',['type'=>'text','name'=>'name:'.$lang,'value'=> $row->name[$lang] ?? null,'attributes'=>$attributes])
@endforeach
@foreach(config("translatable.locales") as $lang)
    @php
        $attributes=[
            'class'=>'form-control',
            'col_class'=>'col-md-6',
            'label'=>__(\App\Modules\BaseApp\Enums\BaseAppEnums::COUNTRY_MODULE_PREFIX . '.currency_code').' '.$lang,
            'placeholder'=>__(\App\Modules\BaseApp\Enums\BaseAppEnums::COUNTRY_MODULE_PREFIX . '.currency_code_placeholder' , [], $lang),
            'required'=>1,
            ];
    @endphp
    @include('admin.form.input',['type'=>'text','name'=>'currency_code:'.$lang,'value'=> $row->currency_code[$lang] ?? null,'attributes'=>$attributes])
@endforeach
@php
    $attributes=[
        'class'=>'form-control',
        'col_class'=>'col-md-6',
        'label'=>__(\App\Modules\BaseApp\Enums\BaseAppEnums::COUNTRY_MODULE_PREFIX . '.country_code'),
        'placeholder'=>__(\App\Modules\BaseApp\Enums\BaseAppEnums::COUNTRY_MODULE_PREFIX . '.country_code_placeholder'),
        'required'=>1,
        'minlength'=>2,
        'maxlength'=>3,
        ];
@endphp
@include('admin.form.input',['type'=>'text','name'=>'country_code','value'=> $row->country_code ?? null,'attributes'=>$attributes])

@php
    $attributes=[
        'col_class'=>'col-md-6',
        'label'=>__(\App\Modules\BaseApp\Enums\BaseAppEnums::COUNTRY_MODULE_PREFIX . '.is_active'),
        'required'=>1
        ];
@endphp
@include('admin.form.boolean',['name'=>'is_active','value'=>$row->is_active ?? 1 ,$attributes])

@php
    $attributes=[
        'id'=>'flag',
        'col_class'=>'col-md-6',
        'class'=>'form-control',
        'label'=>__(\App\Modules\BaseApp\Enums\BaseAppEnums::COUNTRY_MODULE_PREFIX . '.flag'),
        'required' => !$row->id,
        'help'=> 'accepted types, "jpg,png,jpeg" max size 2MB'
        ];
@endphp
@include('admin.form.file',['name'=>'flag', 'id'=>'flag' ,'value'=>$row->flag ?? null ,'attributes'=>$attributes])
