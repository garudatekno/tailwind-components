{{-- <x-card title="card title">
    card content
    <x-slot name="footer">
         card footer
    </x-slot>
</x-card> --}}

@props([
    'icon'=>'',
    'title'=>'',
    'footer'=>''
])
{{-- 
@php
   
    $cardFooter='';
    if($footer){
        $cardFooter = '
        <x-slot name="footer">
            '.$footer.'
        </x-slot>
        ';
    }
@endphp --}}


<x-card >
    <div class="flex items-center">
        <div class="flex items-center justify-evenly w-16 h-16 mx-auto bg-blue-700 bg-gradient-to-br from-blue-700 to-indigo-700  text-indigo-100 rounded-lg">
            {!!$icon!!}
        </div>
        <div class="ml-5 w-0 flex-1">
            <div>
                <h3 class="font-semibold text-lg text-gray-600">{{$title}}</h3>
                {{$slot}}
            </div>
        </div>
    </div>
    <x-slot name="footer">
        {{$footer}}
    </x-slot>
</x-card>