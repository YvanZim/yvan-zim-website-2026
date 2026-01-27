<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $lang = request()->segment(1) === 'fr' ? 'fr' : 'en';
            App::setLocale($lang);

            $globalTopMenu = [];

            if (Schema::hasTable('menus') && Schema::hasTable('menu_items')) {
                $menu = Menu::where('lang', $lang)->first();

                if ($menu) {
                    $menuItems = $menu->items()->with('children')->get();

                    foreach ($menuItems as $item) {
                        if ($item->children->isNotEmpty()) {
                            $globalTopMenu[$item->label] = $item->children->pluck('url', 'label')->all();
                        } else {
                            $globalTopMenu[$item->label] = $item->url;
                        }
                    }
                }
            }

            $view->with('globalTopMenu', $globalTopMenu);
        });
    }
}
