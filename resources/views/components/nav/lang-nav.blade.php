<div class="inline-block">
    <span onclick="toggleLangNav('{{$elmId}}')" class="cursor-pointer"> 
        {{ ucfirst(App::getLocale()) }}<span class="material-icons align-bottom inline-block text-sm mx-0">expand_more</span>
    </span> 

    <div class="mt-0 pt-4 md:absolute brand_blue -ml-3 hidden z-20" id="langDropdown{{ $elmId }}">
        <ul class="md:text-left bg-white text-gray-700 border-gray-200 border">
            <li class="px-3 py-2"><a href="/fr">Fr</a></li>
            <li class="px-3 py-2"><a href="/">En</a></li>
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