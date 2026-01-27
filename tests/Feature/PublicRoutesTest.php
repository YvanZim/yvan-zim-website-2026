<?php

use App\Models\Article;
use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
*/

test('homepage returns 200', function () {
    Page::create([
        'title' => 'Home',
        'meta_description' => 'Home page',
        'slug' => '',
        'lang' => 'en',
        'live' => true,
        'no_index' => false,
        'content' => json_encode([]),
    ]);

    $this->get('/')->assertStatus(200);
});

test('french homepage returns 200', function () {
    Page::create([
        'title' => 'Accueil',
        'meta_description' => 'Page d\'accueil',
        'slug' => '',
        'lang' => 'fr',
        'live' => true,
        'no_index' => false,
        'content' => json_encode([]),
    ]);

    $this->get('/fr')->assertStatus(200);
});

test('english page with slug returns 200', function () {
    Page::create([
        'title' => 'About',
        'meta_description' => 'About page',
        'slug' => 'about',
        'lang' => 'en',
        'live' => true,
        'no_index' => false,
        'content' => json_encode([]),
    ]);

    $this->get('/about')->assertStatus(200);
});

test('french page with slug returns 200', function () {
    Page::create([
        'title' => 'À propos',
        'meta_description' => 'À propos',
        'slug' => 'a-propos',
        'lang' => 'fr',
        'live' => true,
        'no_index' => false,
        'content' => json_encode([]),
    ]);

    $this->get('/fr/a-propos')->assertStatus(200);
});

test('english nested page returns 200', function () {
    Page::create([
        'title' => 'Weddings',
        'meta_description' => 'Weddings',
        'slug' => 'shows/weddings',
        'lang' => 'en',
        'live' => true,
        'no_index' => false,
        'content' => json_encode([]),
    ]);

    $this->get('/shows/weddings')->assertStatus(200);
});

test('french nested page returns 200', function () {
    Page::create([
        'title' => 'Mariages',
        'meta_description' => 'Mariages',
        'slug' => 'spectacles/mariages',
        'lang' => 'fr',
        'live' => true,
        'no_index' => false,
        'content' => json_encode([]),
    ]);

    $this->get('/fr/spectacles/mariages')->assertStatus(200);
});

test('unpublished page returns 404', function () {
    Page::create([
        'title' => 'Draft',
        'meta_description' => 'Draft page',
        'slug' => 'draft',
        'lang' => 'en',
        'live' => false,
        'no_index' => false,
        'content' => json_encode([]),
    ]);

    $this->get('/draft')->assertStatus(404);
});

test('nonexistent page returns 404', function () {
    $this->get('/nonexistent-page-xyz')->assertStatus(404);
});

/*
|--------------------------------------------------------------------------
| Articles
|--------------------------------------------------------------------------
*/

test('news index returns 200', function () {
    $this->get('/news')->assertStatus(200);
});

test('french news index returns 200', function () {
    $this->get('/fr/news')->assertStatus(200);
});

test('english news article returns 200', function () {
    Article::create([
        'title' => 'Test Article',
        'meta_description' => 'Test',
        'slug' => 'test-article',
        'content' => '<p>Content</p>',
        'lang' => 'en',
        'no_index' => false,
        'type' => 0,
    ]);

    $this->get('/en/news/test-article')->assertStatus(200);
});

test('french news article returns 200', function () {
    Article::create([
        'title' => 'Article Test',
        'meta_description' => 'Test',
        'slug' => 'article-test',
        'content' => '<p>Contenu</p>',
        'lang' => 'fr',
        'no_index' => false,
        'type' => 0,
    ]);

    $this->get('/fr/news/article-test')->assertStatus(200);
});

test('show-type article returns 200', function () {
    Article::create([
        'title' => 'Show Article',
        'meta_description' => 'Test',
        'slug' => 'show-article',
        'content' => '<p>Content</p>',
        'lang' => 'en',
        'no_index' => false,
        'type' => 1,
    ]);

    $this->get('/en/news/show-article')->assertStatus(200);
});

test('nonexistent article returns 404', function () {
    $this->get('/en/news/nonexistent-article-xyz')->assertStatus(404);
});

/*
|--------------------------------------------------------------------------
| Links
|--------------------------------------------------------------------------
*/

test('links page returns 200', function () {
    $this->get('/links')->assertStatus(200);
});

/*
|--------------------------------------------------------------------------
| Static pages
|--------------------------------------------------------------------------
*/

test('existing static page returns 200', function () {
    $this->get('/static/billetreduc')->assertStatus(200);
});

test('nonexistent static page returns 404', function () {
    $this->get('/static/nonexistent-page')->assertStatus(404);
});

/*
|--------------------------------------------------------------------------
| QR redirects
|--------------------------------------------------------------------------
*/

test('known qr code redirects', function () {
    $this->get('/qr/240924')->assertRedirect();
});

test('unknown qr code redirects to default', function () {
    $this->get('/qr/unknown-code')->assertRedirect('https://yvanzim.com/fr/contact');
});
