<div class="flex flex-wrap mt-0 text-left brand_blue text-white">

    <div class="w-full text-left p-8 lg:px-16">
        <x-utils.titles.dynamic :section="$section" />
    </div> 

    @foreach($section->reviews as $review)
        <x-utils.reviews.review :review="$review" />
    @endforeach
    
</div>