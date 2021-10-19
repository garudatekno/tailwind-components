{{-- template --}}
{{-- 
<x-button-link 
  href=""
  type=""
  target=""
  hasColor="indigo" // gray, red, yellow, green, blue, indigo, purple, pink 
  hasSize="xs || sm || lg || xl" // for customize button size, default value md
  isBordered //for outlined style
  isRounded //for full rounded corner
  isSecondary //for secondary color
>save</x-button-link> 
--}}

@props([
  'hasColor' => 'indigo',
  'hasSize' => 'md',
  // 'hasIcon' => '',
  'isBordered' => 'false',
  'isRounded' => 'false',
  'isSecondary' => '',
  // 'iconPosition' => 'left',

])

@php
// button round
$radius='rounded-md';
if($isRounded == 'true'){
  $radius='rounded-full';
} 

// button size raw
$size=$hasSize;

// button size
$hasSize = [
  'xs' => 'px-3 py-1.5 text-xs '.$radius,
  'sm' => 'px-3 py-2 text-sm leading-4 '.$radius,
  'md' => 'px-4 py-2 text-sm '.$radius,
  'lg' => 'px-5 py-2 text-base '.$radius,
  'xl' => 'px-6 py-3 text-base '.$radius,
][$hasSize ?? 'md'];

// var_dump($hasColor);exit;
$textColor='text-white';

// button outline
$bgBrd='bg';
$textHover='';
if($isBordered == 'true'){
  $bgBrd='border';
  $textColor='text-'.$hasColor.'-700';
  $textHover='hover:text-'.$hasColor.'-100';
}

// button hover
$variantColor='600';
$variantHover='700';
$variantFocus='500';
if($isSecondary == 'true'){
  $variantColor='100';
  $variantHover='200';
  $variantFocus='500';
  $textColor='text-'.$hasColor.'-700';
}

$hasColorStyle= $bgBrd.'-'.$hasColor.'-'.$variantColor;
$btnHoverStyle= 'bg-'.$hasColor.'-'.$variantHover;
$btnFocusStyle= 'ring-'.$hasColor.'-'.$variantFocus;
if($hasColor=='white'){
  $hasColorStyle= $bgBrd.'-white';
  $btnHoverStyle= 'bg-gray-50';
  $btnFocusStyle= 'ring-gray-300';
  $textColor='text-gray-700';
  if($isBordered=='true'){ 
    $textColor='text-white';
  }
}


$content=$slot;
// if($hasIcon != null){
//   $icon = '<div class="'.$iconSize.'"> '. $hasIcon .'</div>';
//   // button icon layout
//   $content= $icon . $slot;
//   if($iconPosition == 'right'){
//     $content= $slot . $icon ;
//   }
// }

@endphp


<a {{ $attributes->merge(['class' => 'inline-flex cursor-pointer items-center border border-transparent font-semibold shadow-sm '.$textColor.' '.$textHover.' bg-transparent '.$hasColorStyle.' hover:'.$btnHoverStyle.' focus:outline-none focus:ring-2 focus:ring-offset-2 focus:'.$btnFocusStyle.' '.$hasSize])}}> 
  {!!$content!!}
</a>