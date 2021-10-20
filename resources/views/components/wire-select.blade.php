{{-- template --}}
{{-- used with livewire model --}}
{{-- <x-wire-select 
    label="" 
    description="" 
    placeholder="" 
    autocomplete="off" 
    value=""
    model=""
    wireType=""
> 
    // option list
</x-select>
--}}

@if($errors->has($model))
    @props([
        'inputId'=>'',
        'inputType'=>'vertical',
        'label'=>'',
        'description'=>'',
        'formColor'=>'red',
        'textColor'=>'red',
        'wireType'=>'',
        'model'=>'',
        'required'=>'',
        // 'useWire'=>'',
    ])
@else   
    @props([
        'inputId'=>'',
        'inputType'=>'vertical',
        'label'=>'',
        'description'=>'',
        'formColor'=>'indigo',
        'textColor'=>'gray',
        'wireType'=>'',
        'model'=>'',
        'required'=>'',
        // 'useWire'=>'',
    ])
@endif

@php
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
        <div>
            <div class="{{$mt1}} sm:col-span-2">
                <select wire:model{{$wireType?".$wireType":''}}={{$model}}  {{ $attributes->merge(['id'=>$inputId, 'name'=>$inputId, 'class' => 'block focus:ring-'.$formColor.'-500 focus:border-'.$formColor.'-500 w-full shadow-sm text-'.$textColor.'-900  sm:text-sm border-'.$textColor.'-300 rounded-md'])}}>
                    {{ $slot }}
                </select>
            </div>
            {!!$desc!!}
        </div>
    {!!$layout2!!}
    @if($errors->has($model))
    <p class="mt-2 text-sm text-red-600">{{ $errors->first($model) }}</p>
    @endif
    {!!$layout3!!}
</div>



