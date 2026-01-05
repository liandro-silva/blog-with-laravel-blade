@props([
    'type' => 'button',
    'href' => '',
    'class' => '',
])

@if($type === 'anchor' && $href)
    <a 
        href="{{ $href }}" 
        {{ $attributes->except(['href', 'type', 'class']) }}
        class="{{ $class }} bg-slate-900 text-white hover:bg-gray-800 active:bg-gray-900 transition-colors duration-300 px-4 py-2 rounded-md "
    >
        {{ $slot }}
    </a>
@else
    <button 
        type="button" 
        {{ $attributes->except(['type', 'class']) }}
        class="bg-slate-900 text-white hover:bg-gray-800 active:bg-gray-900 transition-colors duration-300 px-4 py-2 rounded-md {{ $class }}"
    >
        {{ $slot }}
    </button>
@endif
