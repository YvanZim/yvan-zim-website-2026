<a href="{{ $link }}" class="h-20 bg-white mb-5 mx-5 rounded-lg border border-gray-200 flex items-center text-center" target="_blank">
    
    <div>
        <div class="p-2">
            @if(isset($image))
                <img src="{{ $image }}" alt="Yvan Zim Link" class="w-16 h-16 rounded-lg">
            @else 
                <div class="w-16 h-16 rounded-lg brand_blue border border-gray-200 flex items-center justify-center">
                    <x-heroicon-o-link class="w-8 h-8 text-gray-50"/>
                </div>
            @endif
        </div>
    </div>

    <div class="flex-grow">
        {{ $title }}
    </div>

    <div class="text-right p-0">
        <x-heroicon-o-chevron-right class="w-4 h-4 inline-block"/>
    </div>

</a>