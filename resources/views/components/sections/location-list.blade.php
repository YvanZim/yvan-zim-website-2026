@if( isset($section->data['locations']) )
    <div class="p-4 md:p-8 lg:p-16 bg-white">
        <x-utils.titles.dynamic :section="$section" />
        <div class="mb-2"> {!! $section->content !!} </div>
        @foreach($section->data['locations'] as $lp)
            <div class="inline-block py-4 w-6/12 md:w-4/12 lg:w-3/12 xl:w-2/12">
                <a href="/{{ $lp->link }}" class="underline"> {{ $lp->sections[0]->location }} </a>
            </div>
        @endforeach
    </div>
@endif