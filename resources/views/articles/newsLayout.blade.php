@extends('layouts.site')

@section('header')
    <title>{{ $article->title }} | Yvan Zim</title>
    <meta name="description" content="{{$article->meta_description}}">

    <meta property="og:title" content="{{ $article->og_title ?? ''}}">
    <meta property="og:description" content="{{ $article->og_description  ?? ''}}">
    <meta property="og:image" content="{{ $article->og_image  ?? ''}}">
    <meta property="og:url" content="https://yvanzim.com/{{ $article->link }}">

    @if($article->no_index == 1)
        <meta name="robots" content="noindex,nofollow">
    @endif

@endsection

@section('content')

    <div class="md:flex justify-center items-center p-10">
        <div class="md:w-3/12 md:pr-5">
            <a @if( $article->lang == 'en') href="/news" @else href="/{{ $article->lang }}/news" @endif class="flex align-middle mb-2">
                <span class="material-icons align-bottom inline-block text-md mx-0">chevron_left</span>
                <span class="inline-block">Back</span>
            </a>
            <h1 class="text-3xl pb-3"> {{ $article->title }} </h1>
            <p class="text-slate-500"> Published on {{ $article->date }} </p>
        </div>
        <div class="md:w-6/12">
            <img src="{{ $article->image }}">
        </div>
    </div>

    <div class="flex justify-center article">
        <div class="md:w-7/12 px-10">
            {!! $article->content !!}
        </div>
    </div>

@endsection
