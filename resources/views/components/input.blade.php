{{-- <x-input 
    label=""            // for input name
    inputId=""          // for add for, id, name
    model=""            // for generate error message
    description=""      // for add some info below input form
    value=""            // for add value on edit form
    placeholder=""      // add some intuction of this form
    type="email"        // type of form
    autocomplete="off" 
    required
    autofocus
/> --}}

@if($errors->has($model))
    @props([
        'inputId'=>'',
        'label'=>'',
        'type'=>'text',
        'inputType'=>'vertical',
        'description'=>'',
        'formColor'=>'red',
        'textColor'=>'red',
        'model'=>'',
        'required'=>'',
        'shadow'=>'shadow-sm',
    ])
@else   
    @props([
        'inputId'=>'',
        'label'=>'',
        'type'=>'text',
        'inputType'=>'vertical',
        'description'=>'',
        'formColor'=>'indigo',
        'textColor'=>'gray',
        'model'=>'',
        'required'=>'',
        'shadow'=>'shadow-sm',
    ])
@endif

@php
    $layout1='<div class="mb-2">';
    $layout2='';
    $layout3='</div>';
    $mt1='mt-1';
    if($inputType == 'horizontal'){
        $layout1='<div class="grid"><div class="sm:flex sm:items-center sm:space-x-2 ">';
        $layout2='</div>';
        $layout3='</div>';
        $mt1='';
    }
    $desc='';
    if($description){
        $desc='<p class="mt-2 text-sm text-gray-500" >'.$description.'</p>';
    }
    $asterisk='';
    if($required == 'true'){
        $asterisk = '*';
    }
    $title='';
    if($label){
        $title='<label for="'.$inputId.'" class="block  font-semibold text-sm text-gray-700">'.$label.'<span class="text-red-500">'.$asterisk.'</span></label>';
    }
@endphp

<div>
    {!!$layout1!!}
        {!!$title!!}
        <div class="{{$mt1}} relative rounded-md {{$shadow}}">
            <input type="{{ $type }}"  {{ $attributes->merge(['id'=>$inputId, 'name'=>$inputId, 'class' => 'block w-full border-'.$textColor.'-300 text-'.$textColor.'-900 placeholder-gray-400 focus:outline-none focus:ring-'.$formColor.'-500 focus:border-'.$formColor.'-500 sm:text-sm rounded-md disabled:opacity-80 disabled:cursor-not-allowed disabled:bg-gray-200'])}}  >
        </div>
    {!!$layout2!!}
        {!!$desc!!}
        @if($errors->has($model))
            <p class="mt-2 text-sm text-red-600">{{ $errors->first($model) }}</p>
        @endif
        {{ $slot }}
    {!!$layout3!!}
</div>


