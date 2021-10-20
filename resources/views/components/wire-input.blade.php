{{-- template --}}
{{-- used with livewire model --}}
{{-- <x-wire-input
    value=""
    label="" 
    description="" 
    placeholder="" 
    type="email" 
    autocomplete="off" 
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
        'shadow'=>'shadow-sm',
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
        'shadow'=>'shadow-sm',

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
        <div class="{{$mt1}} w-full sm:w-auto relative rounded-md {{$shadow}}">
            <input type="{{ $type }}" wire:model{{$wireType?".$wireType":''}}={{$model}} {{ $attributes->merge(['id'=>$inputId, 'name'=>$inputId,'class' => 'block w-full border-'.$textColor.'-300 text-'.$textColor.'-900 placeholder-gray-400 focus:outline-none focus:ring-'.$formColor.'-500 focus:border-'.$formColor.'-500 sm:text-sm rounded-md disabled:opacity-80 disabled:cursor-not-allowed disabled:bg-gray-200'])}}  >
        </div>
        {!!$desc!!}
    {!!$layout2!!}
        @if($errors->has($model))
            <p class="mt-2 text-sm text-red-600">{{ $errors->first($model) }}</p>
        @endif
        {{ $slot }}
    {!!$layout3!!}
</div>

{{-- <div>
    
    <label for="{{$inputId}}" class="block  font-semibold text-sm text-gray-700">{{$label}}<span class="text-red-500">{{$asterisk}}</span></label>
    <div class="mt-1 relative rounded-md shadow-sm">
      <input type="{{ $type }}" wire:model{{$wireType?".$wireType":''}}={{$model}} {{ $attributes->merge(['id'=>$inputId, 'name'=>$inputId,'class' => 'block w-full border-'.$textColor.'-300 text-'.$textColor.'-900 placeholder-gray-400 focus:outline-none focus:ring-'.$formColor.'-500 focus:border-'.$formColor.'-500 sm:text-sm rounded-md disabled:opacity-80 disabled:cursor-not-allowed disabled:bg-gray-200'])}}  >
    </div>
    <p class="mt-2 text-sm text-gray-500" >{{ $description }}</p>
    @if($errors->has($model))
        <p class="mt-2 text-sm text-red-600">{{ $errors->first($model) }}</p>
    @endif
    {{ $slot }}

</div> --}}


