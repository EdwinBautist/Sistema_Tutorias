<!--- Este es el estilo de las palabras del segundo dashboard --> 
@props(['href' => '#'])
<li {{ $attributes }}>
    <a href="{{ $href }}"
        class="flex items-center px-2 py-1.5 text-white rounded-base hover:bg-neutral-tertiary hover:text-[#F2E205] group">
        {{ $icon ?? '' }}
        <span class="ms-3">{{ $slot }}</span>
    </a>
</li>
