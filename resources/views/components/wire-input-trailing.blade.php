{{-- template --}}
{{-- used with livewire model --}}
{{-- <x-wire-input-trailing
    type="email" 
    label="" 
    description="" 
    placeholder="" 
    trailingText=""
    model=""
    wireType=""
/> --}}

@if($errors->has($model))
    @props([
        'inputId'=>'',
        'label'=>'',
        'type'=>'text',
        'description'=>'',
        'formColor'=>'red',
        'textColor'=>'red',
        'wireType'=>'',
        'model'=>'',
        'required'=>'',
        'trailingText'=>'',
    ])
@else   
    @props([
        'inputId'=>'',
        'label'=>'',
        'type'=>'text',
        'description'=>'',
        'formColor'=>'indigo',
        'textColor'=>'gray',
        'wireType'=>'',
        'model'=>'',
        'required'=>'',
        'trailingText'=>'',
    ])
@endif

@php
    $asterisk='';
    if($required == 'true'){
        $asterisk = '*';
    }
@endphp



<div>
    <label for="{{$inputId}}" class="block text-sm font-semibold text-gray-700">{{$label}}<span class="text-red-500">{{$asterisk}}</label>
    <div class="mt-1 flex rounded-md shadow-sm">
      <div class="relative flex items-stretch flex-grow focus-within:z-10">
        <input type="{{ $type }}" wire:model{{$wireType?".$wireType":''}}={{$model}} {{ $attributes->merge(['id'=>$inputId, 'name'=>$inputId, 'class' => 'focus:ring-'.$formColor.'-500 focus:border-'.$formColor.'-500 text-'.$textColor.'-900 block w-full rounded-none rounded-l-md sm:text-sm placeholder-gray-400 border-'.$textColor.'-300 disabled:opacity-80 disabled:cursor-not-allowed disabled:bg-gray-200'])}}  >
        </div>
      <div class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-{{$textColor}}-300 text-sm font-semibold rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-{{$formColor}}-500 focus:border-{{$formColor}}-500">
        <span>{{$trailingText}}</span>
      </div>
    </div>
    <p class="mt-2 text-sm text-gray-500" >{{ $description }}</p>
    @if($errors->has($model))
        <p class="mt-2 text-sm text-red-600">{{ $errors->first($model) }}</p>
    @endif
    {{ $slot }}
</div>




