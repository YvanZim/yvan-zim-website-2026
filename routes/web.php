<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pages\ShowPageController;
use App\Http\Controllers\Form\ContactFormController;
use App\Http\Controllers\Articles\IndexArticleController;
use App\Http\Controllers\Articles\ShowArticleController;
use App\Http\Controllers\Links\ShowLinkController;
use App\Http\Controllers\Static\ShowHtmlController;
use App\Http\Controllers\Lang\ToggleLangController;
use App\Http\Controllers\Qr\QrRedirectController;
use Spatie\Honeypot\ProtectAgainstSpam;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// admin routes
Route::get('sitemap', [Controller::class,'sitemap']);

// Send data
Route::post('/send', ContactFormController::class)->middleware(ProtectAgainstSpam::class);

Route::get('/links', ShowLinkController::class);
Route::get('{lang}/links', ShowLinkController::class);

// Articles

Route::get('news', IndexArticleController::class);
Route::get('/{parent?}/news', IndexArticleController::class);

Route::get('/{parent?}/news/{slug}', ShowArticleController::class)->name('show_article');
Route::get('news/{slug}', ShowArticleController::class)->name('show_article');

Route::get('/qr/{slug}', QrRedirectController::class);
Route::get('/static/{slug}', ShowHtmlController::class);

// Pages
Route::get('/{parent?}/{section?}/{child?}', ShowPageController::class);
Route::put('/{lang?}', ToggleLangController::class)->name('langToggle');


