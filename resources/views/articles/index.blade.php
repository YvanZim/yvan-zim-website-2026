@extends('layouts.site')

@section('header')
    <title>Articles | Yvan Zim </title>
    <meta name="description" content="Yvan Zim New & Updates">

    {{-- <meta property="og:title" content="{{ $article->og_title ?? ''}}">
    <meta property="og:description" content="{{ $article->og_description  ?? ''}}">
    <meta property="og:image" content="{{ $article->og_image  ?? ''}}">
    <meta property="og:url" content="https://yvanzim.com/{{ $article->link }}"> --}}

@endsection

@section('content')
    <div class="p-10">

        <!--  -->
        <h1  class="text-4xl pt-0 mt-0 pb-3"> News </h1>
        <hr class="px-4 pb-5">
        <!--  -->

        @if( isset($articles) )
            @foreach($articles as $article)
                <div class="py-10 mb-5">
                    <div class="md:flex items-center">
                        <div class="md:w-4/12">
                            @if(isset($article->image) )
                                <a href="{{$article->link}}">
                                    <img src="{{$article->image}}" alt="Yvan Zim | Article">
                                </a>
                            @endif
                        </div>
                        <div class="md:w-8/12 md:pl-10 relative pt-5 md:pt-0 @if($article->expired) opacity-50 @endif">
                            <x-utils.titles.h2 :content="$article->fullTitle"/>
                            <div class="py-2"> {{ $article->excerpt }} </div>
                            @if($article->expired)
                                <strong> {{ trans('app.show_past', [], $article->lang) }} </strong>
                            @else 
                                <x-utils.buttons.primary :url="$article->link" label="{{ trans('app.read_more', [], $article->lang) }}"/>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else 
            <div class="py-5 mb-5">
                <p> No articles. </p>
                <p v-else-if="langProp == 'fr'"> Aucun articles. </p>
            </div>
        @endif

    </div>
@endsection

