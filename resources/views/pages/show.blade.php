@extends('layouts.site')

@section('header')
    <title>{{ $page->title }} | Yvan Zim</title>
    <meta name="description" content="{{ $page->meta_description ?? ''}}">
    <meta property="og:title" content="{{ $page->og_title ?? $page->title }}">
    <meta property="og:description" content="{{ $page->og_description ?? $page->meta_description ?? '' }}">
    <meta property="og:image" content="{{ $page->og_image ?? 'https://assets.yvanzim.com/images/yvanzim_logo.png' }}">
    <meta property="og:url" content="https://yvanzim.com/{{ $page->link }}">
    @if($page->no_index == 1)
        <meta name="robots" content="noindex,nofollow">
    @endif
@endsection

@section('seo')
    <x-seo.meta :page="$page" />
@endsection

@section('content')

    @foreach($page->sections as $index => $section)
        @include($section->type, ['section' => $section->data, 'isFirstSection' => $index === 0])
    @endforeach

@endsection
