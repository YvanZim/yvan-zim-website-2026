@extends('layouts.site')

@section('header')
    <title> {{ $page->title }} | Yvan Zim </title>
    <meta name="description" content="{{ $page->meta_description ?? ''}}">
    <meta property="og:title" content="{{ $page->og_title ?? ''}}">
    <meta property="og:description" content="{{ $page->og_description  ?? ''}}">
    <meta property="og:image" content="{{ $page->og_image  ?? ''}}">
    <meta property="og:url" content="https://yvanzim.com/{{ $page->link }}">
    @if($page->no_index == 1)
        <meta name="robots" content="noindex,nofollow">
    @endif

@endsection

@section('content')
    
    @foreach($page->sections as $section)
        @include($section->template->ref, ['section' => $section])
    @endforeach

@endsection  