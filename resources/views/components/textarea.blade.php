{{-- template --}}
{{-- used with livewire model --}}
{{-- <x-textarea 
    type="email" 
    row="5" 
    value=""
    label="" 
    description="" 
    placeholder="" 
    model=""
/> --}}

@if($errors->has($model))
    @props([
        'inputId'=>'',
        'label'=>'',
        'type'=>'text',
        'description'=>'',
        'formColor'=>'red',
        'textColor'=>'red',
        'model'=>'',
        'required'=>'',
    ])
@else   
    @props([
        'inputId'=>'',
        'label'=>'',
        'type'=>'text',
        'description'=>'',
        'formColor'=>'indigo',
        'textColor'=>'gray',
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
    
    <label for="{{$inputId}}" class="block  font-semibold text-sm text-gray-700">{{$label}}<span class="text-red-500">{{$asterisk}}</span></label>
    <div class="mt-1 relative rounded-md shadow-sm">
      <textarea {{ $attributes->merge(['id'=>$inputId, 'name'=>$inputId, 'type'=>$type, 'class' => 'block w-full pr-10 border-'.$textColor.'-300 text-'.$textColor.'-900 placeholder-gray-400 focus:outline-none focus:ring-'.$formColor.'-500 focus:border-'.$formColor.'-500 sm:text-sm rounded-md disabled:opacity-80 disabled:cursor-not-allowed disabled:bg-gray-200'])}}  >{{ $slot }}</textarea>
    </div>
    <p class="mt-2 text-sm text-gray-500" >{{ $description }}</p>
    @if($errors->has($model))
        <p class="mt-2 text-sm text-red-600">{{ $errors->first($model) }}</p>
    @endif
    

</div>

