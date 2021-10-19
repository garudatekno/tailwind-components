{{-- template --}}
{{-- <x-input-addon-with-leading
    type="email" 
    label="" 
    description="" 
    placeholder="" 
    AddonText=""
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
        'addonText'=>'',
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
        'addonText'=>'',
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
        <div class="{{$mt1}}  flex rounded-md shadow-sm">
            <div class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2  z-10 border border-{{$textColor}}-300 text-sm font-semibold rounded-l-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-{{$formColor}}-500 focus:border-{{$formColor}}-500">
            <span>{{$addonText}}</span>
            </div>
            <div class="relative flex items-stretch flex-grow focus-within:z-10">
                <div class="absolute inset-y-0 left-0 pl-3  z-10 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">
                        {{$leadingText}}
                    </span>
                </div>
                <input type="{{ $type }}"  {{ $attributes->merge(['id'=>$inputId, 'name'=>$inputId, 'class' => 'focus:ring-'.$formColor.'-500 focus:border-'.$formColor.'-500 text-'.$textColor.'-900 block w-full rounded-none rounded-r-md sm:text-sm placeholder-gray-400 border-'.$textColor.'-300 disabled:opacity-80 disabled:cursor-not-allowed disabled:bg-gray-200'])}}  >
            </div>
        </div>
    {!!$layout2!!}
        <p class="mt-2 text-sm text-gray-500" >{{ $description }}</p>
        @if($errors->has($model))
            <p class="mt-2 text-sm text-red-600">{{ $errors->first($model) }}</p>
        @endif
        {{ $slot }}
    {!!$layout3!!}
</div>




