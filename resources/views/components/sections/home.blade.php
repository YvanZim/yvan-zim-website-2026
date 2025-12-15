
<div class="h-[calc(100vh-100px)]">

    <div class="main_height bg_show_image" style="background:url(https://assets.yvanzim.com/images/yvan-zim-reactions.gif);">

        <div class="h-full w-full flex bg-slate-900/[.2]">

            <div class="m-auto p-8 md:p-12 text-center backdrop-blur-md text-white drop-shadow-sm bg-slate-900/[.2]">
                <h1 class="text-2xl md:text-5xl pb-2"> {{ $section->title }} </h1>
                <hr class="border_yellow">
                <h2 class="text-md md:text-2xl pt-2"> {!! $section->content !!} </h2>

                <div id="pageNav" class="text-center mt-5">
                    <x-utils.buttons.primary :url="$section->link" :label="$section->button"/>
                </div>

            </div>

        </div>
        
    </div>

</div>