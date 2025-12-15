@extends('layouts.site')

@section('header')
    <title>{{ $article->title }} | Yvan Zim</title>
    <meta name="description" content="{{$article->meta_description}}">
    <meta property="og:title" content="{{ $article->title ?? ''}}">
    <meta property="og:description" content="{{ $article->meta_description  ?? ''}}">
    <meta property="og:image" content="{{ $article->image  ?? ''}}">
    <meta property="og:url" content="https://yvanzim.com/{{ $article->link }}">
    @if($article->no_index == 1)
        <meta name="robots" content="noindex,nofollow">
    @endif
@endsection

@section('content')

    <div class="md:h-[calc(100vh-100px)] relative">

        <div class="main_height flex flex-wrap h-full items-center md:mt-0 p-0 bg-white">

            <div class="h-96 w-full md:w-6/12 lg:w-6/12 xl:w-6/12 md:h-full bg_show_image z-0" style="background:url('{{ $article->image }}')">
                &nbsp;
            </div>

            <div class="md:flex items-center md:h-full w-full mt-0 md:w-6/12 lg:w-6/12 xl:w-6/12 xl:px-16 p-8 md:pt-0 bg-white">
                
                <div class="pt-0 mt-0 showLayout"> 

                    <a @if( $article->lang == 'en') href="/news" @else href="/{{ $article->lang }}/news" @endif class="flex align-middle mb-2"> 
                        <span class="material-icons align-bottom inline-block text-md mx-0">chevron_left</span>
                        <span class="inline-block">{{ __('app.back') }}</span>
                    </a>
                    <h1 class="text-3xl pb-3"> {{ $article->title }} </h1>
                    {!! $article->content !!}
                    @if( $article->expired === true )
                        <strong> {{ __('app.show_past') }} </strong>
                    @elseif($article->button_txt && $article->button_link)
                        <a class="py-4 px-5 brand_yellow text-white inline-block uppercase" href="{{ $article->button_link }}" target="_blank"> {{ $article->button_txt }} </a>
                    @endif
                </div>
            </div>

        </div>

    </div>


@endsection