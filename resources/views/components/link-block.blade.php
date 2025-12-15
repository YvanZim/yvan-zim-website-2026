<a href="{{ $link }}" class="h-20 bg-white mb-5 mx-5 rounded-lg border border-gray-200 flex items-center text-center" target="_blank">
    
    <div>
        <div class="p-2">
            @if(isset($image))
                <img src="{{ $image }}" alt="Yvan Zim Link" class="w-16 h-16 rounded-lg">
            @else 
                <div class="w-16 h-16 rounded-lg brand_blue border border-gray-200 text-3xl flex items-center justify-center">
                    <span class="material-icons text-gray-50 text-4xl">{{ $icon }}</span>
                </div>
            @endif
        </div>
    </div>

    <div class="flex-grow">
        {{ $title }}
    </div>

    <div class="text-right p-0">
        <span class="material-icons align-bottom inline-block text-md mx-0">
            chevron_right
        </span>
    </div>

</a>