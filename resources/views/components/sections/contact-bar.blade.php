<div class="flex flex-wrap items-center p-8 lg:px-16 lg:py-8">

    <div class="w-full md:w-8/12 lg:w-9/12 xl:w-10/12">
        <h3 class="text-xl font-medium"> {{ $section->title }} </h3>
        {!! $section->content !!}
    </div>

    <div class="w-full md:w-4/12 lg:w-3/12 xl:w-2/12 md:text-right">
        <x-utils.buttons.primary :url="$section->link" :label="$section->button"/>
    </div>

</div>