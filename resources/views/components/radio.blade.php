{{-- <x-radio 
    label=""    // for input name
    for=""      // for value must be same with name on radio option
    model=""    // for generate error message
>
    <x-radio-option inputId="id0" value="0" name="" // name must be same with for value //>One</x-radio-option>
    <x-radio-option inputId="id1" value="1" name="" // name must be same with for value //>Two</x-radio-option>
</x-radio> --}}

@if($errors->has($model))
    @props([
        'inputId'=>'',
        'label'=>'',
        'model'=>'',
        'required'=>'',
    ])
@else   
    @props([
        'inputId'=>'',
        'label'=>'',
        'model'=>'',
        'required'=>'',
    ])
@endif

@php
    $asterisk='';
    if($required == 'true'){
        $asterisk = '*';
    }
@endphp

<div>
    <label {{ $attributes->merge(['class' => 'block font-semibold text-sm text-gray-700'])}} >{{$label}}<span class="text-red-500">{{$asterisk}}</span></label>
    <div class="flex items-center justify-start mt-4 space-x-4 ">
        {{ $slot }}
    </div>
    @if($errors->has($model))
        <p class="mt-2 text-sm text-red-600">{{ $errors->first($model) }}</p>
    @endif
</div>


