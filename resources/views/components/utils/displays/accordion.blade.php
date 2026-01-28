<div onclick="toggleAccordion('{{$tabId}}')">

    <div role="button" class="p-4 mb-2 brand_yellow text-white"> 
        {{-- <vue-feather v-if="isClosed" type="plus-circle" size="18" class="p-0 inline-block -mb-1"></vue-feather>
        <vue-feather v-else type="minus-circle" size="18" class="p-0 inline-block -mb-1 "></vue-feather> --}}
        <x-heroicon-o-plus-circle class="w-5 h-5 inline-block align-top mr-2"/>{{ $title }}
    </div>

    <div class="display-block hidden transition-all duration-300 ease-in-out" id="{{ $tabId }}">      
        {{ $slot }}
    </div>

</div>

@pushOnce('scripts')
<script>
    function toggleAccordion($tabId){
        document.getElementById($tabId).classList.toggle('hidden');
    }
</script>
@endPushOnce