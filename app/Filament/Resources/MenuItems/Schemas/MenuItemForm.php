<?php

namespace App\Filament\Resources\MenuItems\Schemas;

use App\Models\Menu;
use App\Models\MenuItem;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MenuItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('menu_id')
                    ->label('Menu')
                    ->options(Menu::pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                TextInput::make('label')
                    ->required(),
                TextInput::make('url'),
                Select::make('parent_id')
                    ->label('Parent')
                    ->options(MenuItem::whereNull('parent_id')->pluck('label', 'id'))
                    ->searchable(),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
