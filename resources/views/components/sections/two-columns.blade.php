<div class="md:h-[calc(100vh-100px)]">
    
    <div class="main_height flex flex-wrap h-full items-center md:mt-0 p-0 bg-white">

        <div class="h-96 w-full md:w-6/12 lg:w-7/12 xl:w-8/12 md:h-full bg_show_image" style="background:url('{{ $section->image }}')">
            &nbsp;
        </div>

        <div class="w-full p-8 mt-0 md:flex md:w-6/12 lg:w-5/12  md:h-full  xl:w-4/12 xl:px-16 bg-white items-center">
            <div class="pt-0 mt-0">
                <x-utils.titles.dynamic :section="$section"/>
                {!! $section->content !!}    
            </div>
        </div>
    
    </div>

</div>