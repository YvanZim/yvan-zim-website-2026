@if( $section->page_title == 1)
    <x-utils.titles.h1 :content="$section->title"/>
@else 
    <x-utils.titles.h2 :content="$section->title"/>
@endif

