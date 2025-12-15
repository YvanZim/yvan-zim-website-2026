@if( isset($url) )
    <a class="py-4 px-5 brand_yellow text-white inline-block uppercase" href="{{ $url }}"> 
        {{ $label ?? 'Contact' }}
    </a>
@elseif(str_contains($url, '#'))
    {{-- @click="scrollTo(urlProp)" --}}
    <button class="py-4 px-5 brand_yellow text-white inline-block uppercase" href="{{ $url }}"> 
        {{ $label ?? 'Contact' }}
    </button>
@else
    <button class="py-4 px-5 brand_yellow text-white inline-block uppercase" href="{{ $url }}"> 
        {{ $label ?? 'Contact' }}
    </button>
@endif
