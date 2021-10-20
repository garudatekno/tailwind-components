{{-- template --}}
{{-- used with livewire model --}}
{{-- <x-input-trailing
    type="email" 
    label="" 
    description="" 
    placeholder="" 
    trailingText=""
    model=""
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
        'trailingText'=>'',
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
        'trailingText'=>'',
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
        <div class="{{$mt1}} flex rounded-md shadow-sm">
            <div class="relative flex items-stretch flex-grow focus-within:z-10">
                <input type="{{ $type }}"  {{ $attributes->merge(['id'=>$inputId, 'name'=>$inputId, 'class' => 'focus:ring-'.$formColor.'-500 focus:border-'.$formColor.'-500 text-'.$textColor.'-900 block w-full rounded-none rounded-l-md sm:text-sm placeholder-gray-400 border-'.$textColor.'-300 disabled:opacity-80 disabled:cursor-not-allowed disabled:bg-gray-200'])}}  >
            </div>
            <div class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 z-10 border border-{{$textColor}}-300 text-sm font-semibold rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-{{$formColor}}-500 focus:border-{{$formColor}}-500">
                <span>{{$trailingText}}</span>
            </div>
        </div>
    {!!$layout2!!}
        {!!$desc!!}
        <p class="mt-2 text-sm text-gray-500" >{{ $description }}</p>
        @if($errors->has($model))
            <p class="mt-2 text-sm text-red-600">{{ $errors->first($model) }}</p>
        @endif
        {{ $slot }}
    {!!$layout3!!}
</div>




