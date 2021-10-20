{{-- template --}}
{{-- used with livewire model --}}
{{-- <x-input-leading
    type="email" 
    label="" 
    description="" 
    placeholder="" 
    leadingText=""
    model=""
/> --}}

@if($errors->has($model))
    @props([
        'input Id'=>'',
        'label'=>'',
        'inputType'=>'vertical',
        'type'=>'text',
        'description'=>'',
        'formColor'=>'red',
        'textColor'=>'red',
        'model'=>'',
        'required'=>'',
        'leadingText'=>'',
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
        'leadingText'=>'',
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
        <div class="{{$mt1}} relative  flex rounded-md shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 z-10 flex items-center pointer-events-none">
                <span class="text-gray-500 sm:text-sm">
                    {{$leadingText}}
                </span>
            </div>
            <input type="{{ $type }}" {{ $attributes->merge(['id'=>$inputId, 'name'=>$inputId, 'class' => 'focus:ring-'.$formColor.'-500 focus:border-'.$formColor.'-500 text-'.$textColor.'-900 block w-full pl-10 sm:text-sm border-'.$textColor.'-300 disabled:opacity-80 disabled:cursor-not-allowed disabled:bg-gray-200 rounded-md'])}}>
        </div>
    {!!$layout2!!}
        {!!$desc!!}
        @if($errors->has($model))
            <p class="mt-2 text-sm text-red-600">{{ $errors->first($model) }}</p>
        @endif
        {{ $slot }}
    {!!$layout3!!}

</div>




