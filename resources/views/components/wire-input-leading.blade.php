{{-- template --}}
{{-- used with livewire model --}}
{{-- <x-wire-input-leading
    type="email" 
    label="" 
    description="" 
    placeholder="" 
    leadingText=""
    model=""
    wireType=""
/> --}}

@if($errors->has($model))
    @props([
        'inputId'=>'',
        'inputType'=>'vertical',
        'label'=>'',
        'type'=>'text',
        'description'=>'',
        'formColor'=>'red',
        'textColor'=>'red',
        'wireType'=>'',
        'model'=>'',
        'required'=>'',
        'leadingText'=>'',
    ])
@else   
    @props([
        'inputId'=>'',
        'inputType'=>'vertical',
        'label'=>'',
        'type'=>'text',
        'description'=>'',
        'formColor'=>'indigo',
        'textColor'=>'gray',
        'wireType'=>'',
        'model'=>'',
        'required'=>'',
        'leadingText'=>'',
    ])
@endif

@php
    $asterisk='';
    if($required == 'true'){
        $asterisk = '*';
    }
    $layout1='';
    $layout2='';
    $layout3='';
    $mt1='mt-1';
    if($inputType == 'horizontal'){
        $layout1='<div class="grid"><div class="flex items-center space-x-2">';
        $layout2='</div>';
        $layout3='</div>';
        $mt1='';
    }
    $desc='';
    if($description){
        $desc =  '<p class="mt-2 text-sm text-gray-500" >'. $description .'</p>' ;
    }
    $title='';
    if($label){
        $title='<label for="'.$inputId.'" class="block  font-semibold text-sm text-gray-700">'.$label.'<span class="text-red-500">'.$asterisk.'</span></label>';
    }
@endphp


<div>
    {!!$layout1!!}
        {!!$title!!}
        {{-- <label for="{{$inputId}}" class="block text-sm font-semibold text-gray-700">{{$label}}<span class="text-red-500">{{$asterisk}}</label> --}}
        <div class="{{$mt1}} relative flex rounded-md shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="text-gray-500 sm:text-sm">
                    {{$leadingText}}
                </span>
            </div>
            <input type="{{ $type }}" wire:model{{$wireType?".$wireType":''}}={{$model}} {{ $attributes->merge(['id'=>$inputId, 'name'=>$inputId, 'class' => 'focus:ring-'.$formColor.'-500 focus:border-'.$formColor.'-500 text-'.$textColor.'-900 block w-full pl-10 sm:text-sm border-'.$textColor.'-300 disabled:opacity-80 disabled:cursor-not-allowed disabled:bg-gray-200 rounded-md'])}}>
        </div>
        {!!$desc!!}
    {!!$layout2!!}
        @if($errors->has($model))
            <p class="mt-2 text-sm text-red-600">{{ $errors->first($model) }}</p>
        @endif
        {{ $slot }}
    {!!$layout3!!}

</div>




