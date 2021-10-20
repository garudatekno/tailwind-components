@props([
    'thead'=>'',
    'tbody'=>'',
    'theadId'=>'',
    'tbodyId'=>'',
])
@php
$headId='';
if($theadId != null){
    $headId = 'id='.$theadId.'' ;
}
$bodyId='';
if($tbodyId != null){
    $bodyId = 'id='.$tbodyId.'' ;
}
@endphp

<div class="align-middle inline-block min-w-full border border-t-0 border-gray-200">
  <table {{ $attributes->merge(['class'=>'min-w-full table-auto'])}} >
    <thead {{$headId}}> 
        <tr class=" hidden sm:table-row border-t border-gray-200 ">
          {{$thead}}
        </tr>
    </thead>
    <tbody {{$bodyId}} class="border-t border-gray-200 bg-white divide-y divide-gray-100">
      {{$tbody}}  
    </tbody>
  </table>
</div>
  