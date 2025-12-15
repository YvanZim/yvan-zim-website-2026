<div class="nav_height brand_blue px-5 py-2 md:flex z-10">

    <!--  -->
    <div class="flex md:flex-grow">

        <div class="w-7/12 sm:w-6/12 md:4/12 lg:w-4/12 xl:w-/12"> 

            <div class="flex h-full items-center text-center">

                <a @if( App::getLocale() == 'en') href="/" @else href='/{{ App::getLocale() }}' @endif class="block w-10/12">
                    <img src="https://assets.yvanzim.com/images/yvanzim_logo.png" alt="Yvan Zim" class="object-contain">
                </a>
                
                <div class="w-2/12 text-center ml-5 text-white hidden md:inline-block">
                    <x-nav.lang-nav elmId="desktop" />
                </div>

            </div>

        </div>

        <div class="w-5/12 sm:w-6/12 lg:hidden text-right text-white p-0 m-0 ">
            <div class="flex h-full justify-end" onclick="dropdownToggle('TopNav')"> 
                <button class="menu_icon p-0 m-0"> 
                    <span class="material-icons-outlined align-bottom inline-block text-2xl sm:text-3xl mx-0 ease-in-out"> menu </span>
                </button>
                <button class="hidden menu_icon p-0 m-0"> 
                    <span class="material-icons-outlined align-bottom inline-block text-2xl sm:text-3xl mx-0 ease-in-out"> close </span>
                </button>
            </div>
        </div>

    </div>

    <div class="hidden lg:block lg:w-6/12 justify-end text-white" id="TopNav">
        <ul class="lg:flex h-full items-center justify-end text-center"> 
            @foreach($globalTopMenu as $index => $item)
                <li  class="py-4 lg:pr-10 lg:py-0 m-0"> 
                    @if( is_array($item) )
                        <div class="inline-block">
                            <span  class="cursor-pointer" onclick="dropdownToggle('{{ $index }}Dropdown')"> 
                                {{ $index }}<span class="material-icons align-bottom inline-block text-sm mx-0">expand_more</span>
                            </span> 
                            <div class="mt-0 pt-4 lg:absolute brand_blue hidden -ml-3" id="{{ $index }}Dropdown">
                                <ul class="lg:text-left bg-white text-gray-700 border-gray-200 border">
                                    @foreach($item as $subindex => $subItem)
                                        <li class="px-3 py-2"> 
                                            <a href="{{ $subItem }}">{{ $subindex }}</a> 
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    @else 
                        <a href="{{ $item }}">{{ $index }}</a>
                    @endif
                </li>
            @endforeach

            <li class="py-4 md:pr-10 md:py-0 m-0 inline-block md:hidden"> 
                <x-nav.lang-nav elmId="mobile"/>
            </li>

        </ul>
    </div>

</div>

@pushOnce('scripts')
<script>
    function dropdownToggle(elmId){
        if(document.getElementById(elmId)){
            document.getElementById(elmId).classList.toggle('hidden');
            if(elmId == 'TopNav'){
                let icons = document.getElementsByClassName('menu_icon')
                for(let i = 0; i < icons.length; i++){
                    icons[i].classList.toggle('hidden');
                }
            }
        }
    }
</script>
@endPushOnce