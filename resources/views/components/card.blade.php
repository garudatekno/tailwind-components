{{-- <x-card title="card title">
    card content
    <x-slot name="footer">
         card footer
    </x-slot>
</x-card> --}}

@props([
    'title'=>'',
    'footer'=>'',
    'hasFlex'=>'false'
])

@php
    $cardHeader='';
    if($title){
        $cardHeader = '
        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-semibold text-gray-900">
            '.$title.'
            </h3>
        </div>
        ';
    }
    $cardFooter='';
    if($footer){
        $cardFooter = '
        <div class="px-4 py-3 flex items-center space-x-2 justify-end bg-gray-100 text-right sm:px-6 " >
            '.$footer.'
        </div>
        ';
    }
    $flex='';
    if($hasFlex=='true'){
        $flex='flex w-full';
    }
@endphp


<div {{ $attributes->merge(['class' => 'shadow rounded bg-white sm:rounded-md '.$flex]) }}>
    {!!$cardHeader!!}
    <div class="px-4 py-5 sm:p-6 {{ $flex }}">
        {{$slot}}
    </div>
    {!!$cardFooter!!}
</div>