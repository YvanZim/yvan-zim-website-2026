<div class="flex flex-wrap-reverse items-center py-6">

    <div class="w-full md:w-6/12 lg:w-7/12 p-8 px-8 md:py-12">
        <div class="aspect-w-16 aspect-h-9">
            <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/zZP7E3o9EyU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

    <div class="w-full md:w-6/12 lg:w-5/12 p-8 px-8 md:py-12">
        <x-utils.titles.dynamic :section="$section"/>
        {!! $section->content !!}
        <x-utils.buttons.primary :url="$section->link" :label="$section->button" />
    </div>

</div>