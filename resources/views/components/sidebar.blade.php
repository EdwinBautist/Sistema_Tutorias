<!--- Esta es el estilo de las palabras del primer dashboard -->
@props(['href' => '#'])
<li {{ $attributes }}>
    <a href="{{ $href }}"
        class="flex flex-col items-center justify-center px-2 py-1.5 text-white rounded-base hover:bg-neutral-tertiary hover:text-[#F2E205] group">{{ $icon ?? '' }} </span>
        <span class="mt-1   ">{{ $slot }}</span>  
    </a>
</li>

