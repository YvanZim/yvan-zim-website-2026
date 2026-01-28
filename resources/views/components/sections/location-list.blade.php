@php
    // Find all pages that contain a location section
    $locationPages = \App\Models\Page::where('live', true)
        ->whereJsonContains('content', [['type' => 'components.sections.location']])
        ->get()
        ->filter(function ($page) {
            // Ensure the page has sections with a location field
            return $page->sections->contains(fn ($s) => isset($s->data->location));
        });
@endphp

<div class="p-4 md:p-8 lg:p-16 bg-white">
    <x-utils.titles.dynamic :section="$section" :isFirstSection="$isFirstSection ?? false"/>
    @if(isset($section->content))
        <div class="mb-2">{!! $section->content !!}</div>
    @endif
    @foreach($locationPages as $lp)
        @php
            $locationSection = $lp->sections->first(fn ($s) => isset($s->data->location));
        @endphp
        @if($locationSection)
            <div class="inline-block py-4 w-6/12 md:w-4/12 lg:w-3/12 xl:w-2/12">
                <a href="/{{ $lp->link }}" class="underline">{{ $locationSection->data->location }}</a>
            </div>
        @endif
    @endforeach
</div>