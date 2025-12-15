<div onclick="toggleAccordion('{{$tabId}}')">

    <div role="button" class="p-4 mb-2 brand_yellow text-white"> 
        {{-- <vue-feather v-if="isClosed" type="plus-circle" size="18" class="p-0 inline-block -mb-1"></vue-feather>
        <vue-feather v-else type="minus-circle" size="18" class="p-0 inline-block -mb-1 "></vue-feather> --}}
        <span class="material-icons-outlined inline-block text-base align-top pr-2"> add_circle </span>{{ $title }}
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