<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        MenuItem::truncate();
        Menu::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // English menu
        $enMenu = Menu::create(['name' => 'Top Nav EN', 'slug' => 'top-nav-en', 'lang' => 'en']);

        $shows = MenuItem::create(['menu_id' => $enMenu->id, 'label' => 'Shows', 'url' => null, 'sort_order' => 1]);
        MenuItem::create(['menu_id' => $enMenu->id, 'label' => 'Family events', 'url' => '/shows/family', 'parent_id' => $shows->id, 'sort_order' => 1]);
        MenuItem::create(['menu_id' => $enMenu->id, 'label' => 'Weddings', 'url' => '/shows/weddings', 'parent_id' => $shows->id, 'sort_order' => 2]);
        MenuItem::create(['menu_id' => $enMenu->id, 'label' => 'Corporate events', 'url' => '/shows/corporate', 'parent_id' => $shows->id, 'sort_order' => 3]);
        MenuItem::create(['menu_id' => $enMenu->id, 'label' => 'Private parties', 'url' => '/shows/private', 'parent_id' => $shows->id, 'sort_order' => 4]);

        MenuItem::create(['menu_id' => $enMenu->id, 'label' => 'News', 'url' => '/news', 'sort_order' => 2]);
        MenuItem::create(['menu_id' => $enMenu->id, 'label' => 'About', 'url' => '/about', 'sort_order' => 3]);
        MenuItem::create(['menu_id' => $enMenu->id, 'label' => 'Contact', 'url' => '/contact', 'sort_order' => 4]);

        // French menu
        $frMenu = Menu::create(['name' => 'Top Nav FR', 'slug' => 'top-nav-fr', 'lang' => 'fr']);

        $spectacles = MenuItem::create(['menu_id' => $frMenu->id, 'label' => 'Spectacles', 'url' => null, 'sort_order' => 1]);
        MenuItem::create(['menu_id' => $frMenu->id, 'label' => 'Mariages', 'url' => '/fr/spectacles/mariages', 'parent_id' => $spectacles->id, 'sort_order' => 1]);
        MenuItem::create(['menu_id' => $frMenu->id, 'label' => 'Événements privés', 'url' => '/fr/spectacles/privees', 'parent_id' => $spectacles->id, 'sort_order' => 2]);
        MenuItem::create(['menu_id' => $frMenu->id, 'label' => "Événements d'entreprises", 'url' => '/fr/spectacles/entreprises', 'parent_id' => $spectacles->id, 'sort_order' => 3]);
        MenuItem::create(['menu_id' => $frMenu->id, 'label' => 'Événements Familiaux', 'url' => '/fr/spectacles/familles', 'parent_id' => $spectacles->id, 'sort_order' => 4]);

        MenuItem::create(['menu_id' => $frMenu->id, 'label' => 'News', 'url' => '/news', 'sort_order' => 2]);
        MenuItem::create(['menu_id' => $frMenu->id, 'label' => 'À propos', 'url' => '/fr/a-propos', 'sort_order' => 3]);
        MenuItem::create(['menu_id' => $frMenu->id, 'label' => 'Contact', 'url' => '/fr/contact', 'sort_order' => 4]);
    }
}
