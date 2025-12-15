<div class="p-4 md:p-8 lg:p-16 text-center">
    <x-utils.titles.dynamic :section="$section" />
    {!! $section->title !!}
    {!! $section->content !!}
    @if( isset($section->link) )         
        <x-utils.buttons.primary :url="$section->link" :label="$section->button" />
    @endif
</div>
