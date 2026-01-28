@php
    $currentPath = request()->path();
    $currentLang = App::getLocale();

    if ($currentLang === 'fr') {
        // Strip /fr prefix to get EN path
        $enPath = '/';
        $frPath = '/' . $currentPath;
        $stripped = preg_replace('#^fr/?#', '', $currentPath);
        if ($stripped !== '') {
            $enPath = '/' . $stripped;
        }
    } else {
        $enPath = '/' . $currentPath;
        $frPath = $currentPath === '/' || $currentPath === '' ? '/fr' : '/fr/' . $currentPath;
    }
@endphp

<div class="inline-block">
    <span onclick="toggleLangNav('{{$elmId}}')" class="cursor-pointer">
        {{ ucfirst($currentLang) }}<x-heroicon-o-chevron-down class="w-3 h-3 inline-block ml-0.5"/>
    </span>

    <div class="mt-0 pt-4 md:absolute brand_blue -ml-3 hidden z-20" id="langDropdown{{ $elmId }}">
        <ul class="md:text-left bg-white text-gray-700 border-gray-200 border">
            <li class="px-3 py-2"><a href="{{ $frPath }}">Fr</a></li>
            <li class="px-3 py-2"><a href="{{ $enPath }}">En</a></li>
        </ul>
    </div>
</div>

@pushOnce('scripts')
<script>
    function toggleLangNav(elmId){
        document.getElementById('langDropdown' + elmId).classList.toggle('hidden');
    }
</script>
@endPushOnce