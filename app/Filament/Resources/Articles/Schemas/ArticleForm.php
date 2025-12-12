<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ArticleForm
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
                FileUpload::make('image')
                    ->image(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('date'),
                TextInput::make('lang')
                    ->required()
                    ->default('en'),
                TextInput::make('map')
                    ->numeric(),
                Toggle::make('no_index')
                    ->required(),
                TextInput::make('type')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('external_content'),
                TextInput::make('button_txt'),
                TextInput::make('button_link'),
                Toggle::make('expired'),
            ]);
    }
}
