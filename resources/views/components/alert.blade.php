@props(['type' => 'success', 'message' => ''])

@php
    $classes = $type === 'success'
        ? 'bg-green-100 text-green-800 border-green-400'
        : 'bg-red-100 text-red-800 border-red-400';
@endphp

<div {{ $attributes->merge(['class' => "border-l-4 p-4 mb-4 rounded {$classes}"]) }}>
    {{ $message }}
</div>
