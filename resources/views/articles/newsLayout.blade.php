@extends('layouts.site')

@section('header')
    <title>{{ $article->title }} | Yvan Zim</title>
    <meta name="description" content="{{ $article->meta_description ?? '' }}">
    <meta property="og:title" content="{{ $article->og_title ?? $article->title ?? '' }}">
    <meta property="og:description" content="{{ $article->og_description ?? $article->meta_description ?? '' }}">
    <meta property="og:image" content="{{ $article->og_image ?? $article->image ?? 'https://assets.yvanzim.com/images/yvanzim_logo.png' }}">
    <meta property="og:url" content="https://yvanzim.com/{{ $article->link }}">
    @if($article->no_index == 1)
        <meta name="robots" content="noindex,nofollow">
    @endif
@endsection

@section('seo')
    <x-seo.meta :article="$article" />
@endsection

@section('content')

    <div class="max-w-5xl mx-auto p-10">
        <div class="md:flex justify-center items-center">
            <div class="md:w-4/12 md:pr-5">
                <a @if( $article->lang == 'en') href="/news" @else href="/{{ $article->lang }}/news" @endif class="flex align-middle mb-2">
                    <x-heroicon-o-chevron-left class="w-4 h-4 inline-block mt-1"/>
                    <span class="inline-block">{{ __('app.back') }}</span>
                </a>
                <h1 class="text-3xl pb-3">{{ $article->title }}</h1>
                <p class="text-slate-500">Published on {{ $article->date }}</p>
            </div>
            <div class="md:w-8/12">
                <img src="{{ $article->image }}" alt="{{ $article->title }}">
            </div>
        </div>

        <div class="article mt-10">
            <div class="max-w-prose mx-auto">
                {!! $article->content !!}
                @if($article->expired)
                    <p class="mt-4"><strong>{{ __('app.show_past') }}</strong></p>
                @elseif($article->button_txt && $article->button_link)
                    <a class="py-4 px-5 brand_yellow text-white inline-block uppercase mt-4" href="{{ $article->button_link }}" target="_blank">{{ $article->button_txt }}</a>
                @endif
            </div>
        </div>
    </div>

@endsection
