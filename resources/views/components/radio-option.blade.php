{{-- <x-radio-option 
    inputId="id1" 
    value="1" name="" // name must be same with for value //
>
    Two
</x-radio-option> --}}


@props([
    'inputId'=>'',
])

<div>
    <input type="radio"   {{ $attributes->merge(['id'=>$inputId, 'name'=>$inputId]) }} >
    <label for="{{$inputId}}" class="text-sm text-gray-600 pl-1">{{$slot}}</label>
</div>
