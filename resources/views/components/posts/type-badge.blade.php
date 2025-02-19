@props(['type'])
@php
$isActive = request('type') == $type->slug;
@endphp
<a wire:navigate href="{{ route('posts.index', ['type' => $type->slug]) }}"
class="{{ $isActive
    ? 'bg-[#D4EBF8] text-black'
    : 'bg-gray-300
        text-black' }}
rounded-xl px-3 py-1 text-base">
{{ $type->title }}</a>