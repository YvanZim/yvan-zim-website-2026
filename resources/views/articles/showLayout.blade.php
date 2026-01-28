@extends('layouts.site')

@section('header')
    <title>{{ $article->title }} | Yvan Zim</title>
    <meta name="description" content="{{ $article->meta_description ?? '' }}">
    <meta property="og:title" content="{{ $article->title ?? '' }}">
    <meta property="og:description" content="{{ $article->meta_description ?? '' }}">
    <meta property="og:image" content="{{ $article->image ?? 'https://assets.yvanzim.com/images/yvanzim_logo.png' }}">
    <meta property="og:url" content="https://yvanzim.com/{{ $article->link }}">
    @if($article->no_index == 1)
        <meta name="robots" content="noindex,nofollow">
    @endif
@endsection

@section('seo')
    <x-seo.meta :article="$article" />
@endsection

@section('content')

    <div class="md:min-h-[calc(100vh-100px)] relative">

        <div class="flex flex-wrap md:flex-nowrap md:items-stretch md:mt-0 p-0 bg-white">

            <div class="h-96 w-full md:w-6/12 md:h-auto md:min-h-[calc(100vh-100px)] bg_show_image z-0" style="background:url('{{ $article->image }}')">
                &nbsp;
            </div>

            <div class="w-full md:w-6/12 xl:px-16 p-8 bg-white flex items-center">

                <div class="pt-0 mt-0 showLayout">

                    <a @if( $article->lang == 'en') href="/news" @else href="/{{ $article->lang }}/news" @endif class="flex align-middle mb-2">
                        <x-heroicon-o-chevron-left class="mt-1 w-4 h-4 inline-block"/>
                        <span class="inline-block">{{ __('app.back') }}</span>
                    </a>
                    <h1 class="text-3xl pb-3"> {{ $article->title }} </h1>
                    {!! $article->content !!}
                    @if($article->expired)
                        <p class="mt-4"><strong>{{ __('app.show_past') }}</strong></p>
                    @elseif($article->button_txt && $article->button_link)
                        <a class="py-4 px-5 brand_yellow text-white inline-block uppercase mt-4" href="{{ $article->button_link }}" target="_blank">{{ $article->button_txt }}</a>
                    @endif
                </div>
            </div>

        </div>

    </div>


@endsection
