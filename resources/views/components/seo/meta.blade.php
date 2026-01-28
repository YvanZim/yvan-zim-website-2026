@props(['page' => null, 'article' => null])

@php
    $currentPath = request()->path();
    $currentLang = App::getLocale();
    $baseUrl = 'https://yvanzim.com';

    // Determine the content type and get SEO data
    $item = $page ?? $article;
    $isArticle = $article !== null;

    // Build canonical and alternate URLs
    if ($currentLang === 'fr') {
        $canonicalUrl = $baseUrl . '/' . $currentPath;
        $enPath = preg_replace('#^fr/?#', '', $currentPath);
        $enUrl = $baseUrl . '/' . ($enPath ?: '');
        $frUrl = $canonicalUrl;
    } else {
        $canonicalUrl = $baseUrl . '/' . ($currentPath === '/' ? '' : $currentPath);
        $enUrl = $canonicalUrl;
        $frUrl = $baseUrl . '/fr/' . $currentPath;
    }

    // Clean up trailing slashes for consistency
    $canonicalUrl = rtrim($canonicalUrl, '/') ?: $baseUrl;
    $enUrl = rtrim($enUrl, '/') ?: $baseUrl;
    $frUrl = rtrim($frUrl, '/');

    // Get meta data
    $title = $item?->title ?? 'Yvan Zim';
    $description = $item?->meta_description ?? 'Yvan Zim - Magicien professionnel en France. Spectacles de magie pour mariages, entreprises et événements privés.';
    $ogImage = $item?->og_image ?? 'https://assets.yvanzim.com/images/yvanzim_logo.png';

    // Build JSON-LD for LocalBusiness
    $localBusinessSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => 'Yvan Zim',
        'description' => 'Magicien professionnel en France - Spectacles de magie pour mariages, entreprises et événements privés',
        'url' => 'https://yvanzim.com',
        'logo' => 'https://assets.yvanzim.com/images/yvanzim_logo.png',
        'image' => 'https://assets.yvanzim.com/images/yvanzim_logo.png',
        'telephone' => '+33781564849',
        'email' => 'contact@yvanzim.com',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Lyon',
            'addressCountry' => 'FR',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => 45.764043,
            'longitude' => 4.835659,
        ],
        'priceRange' => '€€',
        'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'opens' => '09:00',
            'closes' => '21:00',
        ],
        'sameAs' => [
            'https://www.instagram.com/yvanzim',
            'https://www.facebook.com/yvanzim',
        ],
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'France',
        ],
        'serviceType' => ['Magic Show', 'Close-up Magic', 'Stage Magic', 'Wedding Entertainment', 'Corporate Entertainment'],
    ];

    // Build Article schema if applicable
    $articleSchema = null;
    if ($isArticle && $article) {
        $articleSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $article->title,
            'description' => $article->meta_description ?? '',
            'image' => $article->image ?? '',
            'datePublished' => $article->created_at?->toIso8601String(),
            'dateModified' => $article->updated_at?->toIso8601String(),
            'author' => [
                '@type' => 'Person',
                'name' => 'Yvan Zim',
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Yvan Zim',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => 'https://assets.yvanzim.com/images/yvanzim_logo.png',
                ],
            ],
        ];
    }

    // Build WebPage schema if applicable
    $webPageSchema = null;
    if (!$isArticle && $page) {
        $webPageSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $page->title,
            'description' => $page->meta_description ?? '',
            'url' => $canonicalUrl,
            'inLanguage' => $currentLang === 'fr' ? 'fr-FR' : 'en-US',
        ];
    }
@endphp

{{-- Canonical URL --}}
<link rel="canonical" href="{{ $canonicalUrl }}">

{{-- Hreflang tags for multilingual SEO --}}
<link rel="alternate" hreflang="en" href="{{ $enUrl }}">
<link rel="alternate" hreflang="fr" href="{{ $frUrl }}">
<link rel="alternate" hreflang="x-default" href="{{ $enUrl }}">

{{-- Twitter Card meta tags --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $item?->og_title ?? $title }}">
<meta name="twitter:description" content="{{ $item?->og_description ?? $description }}">
<meta name="twitter:image" content="{{ $ogImage }}">

{{-- JSON-LD Structured Data --}}
<script type="application/ld+json">{!! json_encode($localBusinessSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>

@if($articleSchema)
<script type="application/ld+json">{!! json_encode($articleSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>
@endif

@if($webPageSchema)
<script type="application/ld+json">{!! json_encode($webPageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>
@endif
