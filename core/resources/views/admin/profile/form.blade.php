@php
    $attributes=[
        'class'=>'',
        'label'=>trans('profile.name'),
        'placeholder'=>trans('profile.name'),
        'required'=>1,
        ];
@endphp
@include('admin.form.input',['type'=>'text','name'=>'name','value'=> $row->name ?? null,'attributes'=>$attributes])
@php
    $attributes=[
        'class'=>'',
        'label'=>trans('profile.email'),
        'placeholder'=>trans('profile.email'),
        'required'=>1,
        ];
@endphp
@include('admin.form.input',['type'=>'email','name'=>'email','value'=> $row->email ?? null,'attributes'=>$attributes])
@php
    $attributes=[
        'class'=>'',
        'label'=>trans('profile.password'),
        'placeholder'=>trans('profile.password'),
        'minlength'=>8,
        'maxlength'=>20,
        ];
@endphp
@include('admin.form.input',['type'=>'password','name'=>'password','value'=> '','attributes'=>$attributes])
@php
    $attributes=[
        'class'=>'',
        'label'=>trans('profile.password confirmation'),
        'placeholder'=>trans('profile.password confirmation'),
        'minlength'=>8,
        'maxlength'=>20,
        'required'=>0,
        ];
@endphp
@include('admin.form.input',['type'=>'password','name'=>'password_confirmation:','value'=> '','attributes'=>$attributes])
