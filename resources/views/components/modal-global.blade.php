{{-- <x-modal>

    <x-slot name="buttonOpen">
      <x-button @click="showModal = true">Open Modal</x-button>
    </x-slot>

    // title not required
    <x-slot name="title">Laporan Jurnal</x-slot>
  
    <x-slot name="body">
  
      // Content 
  
    </x-slot>
  
    // footer additional
    <x-slot name="footer">
      <x-button-link href="#" hasColor="green" >Other Button</x-button-link>
    </x-slot>
  
</x-modal> --}}

@props([
    'title'=>'',
    'body'=>'',
    'footer'=>'',
    'buttonOpen'=>'',
    'size'=>'4xl',
    'xdata' => '',
])


@php
    $size = [
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        '3xl' => 'max-w-3xl',
        '4xl' => 'max-w-4xl',
        '5xl' => 'max-w-5xl',
        '6xl' => 'max-w-6xl',
        '7xl' => 'max-w-7xl',
    ][$size ?? 'md'];
    
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
@endphp



{{-- <div x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
    {{$buttonOpen}} 
 </div> --}}
<div x-show="{{$xdata}}" @click.away="{{$xdata}} = false" class="fixed inset-0  z-40 hidden" :class="{ 'block': {{$xdata}}, 'hidden':  !{{$xdata}} }">
    <div class="fixed inset-0">
      <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
    </div>
    <div class="relative  flex items-center mx-auto h-screen pt-5 pb-4 {{$size}}">

      <div class="relative shadow rounded bg-white sm:rounded-md sm:overflow-hidden w-full">
          {!!$cardHeader!!}
          <div class="px-4 py-5 sm:p-6 ">
              {{$body}}
              {{$slot}}
          </div>
          <div class="px-4 py-3 flex items-center space-x-2 justify-end bg-gray-100 text-right sm:px-6 " >
              {{$footer}} 
              <x-button type="button" @click="{{$xdata}} = !{{$xdata}}" hasColor="pink">Close</x-button>
          </div>
      </div>

    </div>
</div>