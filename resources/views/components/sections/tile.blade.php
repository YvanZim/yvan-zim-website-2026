<div class="p-0 md:h-[42rem] lg:h-[58rem] xl:h-[62rem] overflow-hidden flex flex-wrap">

    <div class="w-full brand_blue md:block md:w-4/12 overflow-hidden">
        @for ($i = 1; $i < 4; $i++)
            <div class="w-6/12 float-left md:w-full md:m-0">
                <img src="https://assets.yvanzim.com/images/gallery/yvanZim{{ $i }}.jpg" alt="Yvan Zim | Past Clients" class="object-cover w-full" loading="lazy" alt="Yvan Zim | Magicien | Gallery"> 
            </div>
        @endfor
    </div>

    <div class="w-full brand_yellow md:w-4/12 overflow-hidden">
        @for ($i = 1; $i < 4; $i++)
            <div class="w-6/12 float-left md:w-full md:m-0">
                <img src="https://assets.yvanzim.com/images/gallery/yvanZim{{ $i + 4 }}.jpg" alt="Yvan Zim | Past Clients" class="object-cover w-full" loading="lazy" alt="Yvan Zim | Magicien | Gallery"> 
            </div>
        @endfor
    </div>

    <div class="w-full brand_blue md:w-4/12 overflow-hidden">
        @for ($i = 1; $i < 4; $i++)
            <div class="w-6/12 float-left md:w-full md:m-0">
                <img src="https://assets.yvanzim.com/images/gallery/yvanZim{{ $i + 8 }}.jpg" alt="Yvan Zim | Past Clients"  class="object-cover w-full" loading="lazy" alt="Yvan Zim | Magicien | Gallery "> 
            </div>
        @endfor
    </div>

</div>