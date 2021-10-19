@props([
  'title' => '',
  'hasBorder'=> '',
])
@php
    $classBorder='';
    if($hasBorder == true){
      $classBorder='border';
    }
    $tdTitle='';
    $titleLayout='';
    if($title){
      $tdTitle='<span class="block sm:hidden font-semibold text-xs  text-gray-400 whitespace-normal">'.$title.'</span>';
      $titleLayout='block grid grid-cols-2 sm:table-cell'; 
    }
@endphp

<td {{ $attributes->merge(['class'=>$titleLayout.' px-4 py-3 text-sm text-gray-500 '.$classBorder])}} >
  {!!$tdTitle!!}
  {{$slot}}
</td>