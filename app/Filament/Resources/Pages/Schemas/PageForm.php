<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('meta_description'),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('lang')
                    ->required()
                    ->default('en'),
                TextInput::make('map')
                    ->numeric(),
                TextInput::make('og_title'),
                TextInput::make('og_description'),
                FileUpload::make('og_image')
                    ->image(),
                Toggle::make('live')
                    ->required(),
                Toggle::make('no_index')
                    ->required(),
                TextInput::make('folder_id')
                    ->numeric(),
            ]);
    }
}
