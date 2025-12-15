<div class="md:h-[calc(100vh-100px)]">
    
    <div class="main_height flex flex-wrap h-full items-center md:mt-0 p-0 bg-white">

        <div class="h-96 w-full md:w-6/12 lg:w-6/12 xl:w-6/12 md:h-full bg_show_image z-0" style="background:url('{{ $section->image }}')">
            &nbsp;
        </div>

        <div class="md:h-full w-full mt-0 md:flex md:w-6/12 lg:w-6/12 xl:w-6/12 xl:px-16 p-8 bg-white items-center">
            <div class="pt-0 mt-0"> 
                <x-utils.titles.dynamic :section="$section"/>
                {!! $section->content !!}             
                @if( $section->link )
                    <x-utils.buttons.primary :url="$section->link" :label="$section->button"/>
                @endif
            </div>
        </div>
    
    </div>

</div>