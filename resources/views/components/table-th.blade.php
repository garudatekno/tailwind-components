@props([
  'hasBorder'=> '',
])
@php
    $classBorder='';
    if($hasBorder){
      $classBorder='border border-'.$hasBorder.'-400';
    }
@endphp

<th {{ $attributes->merge(['class'=>'px-4 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider '.$classBorder])}}>
  <span class="">{{$slot}}</span>
</th>
