<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('section_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name'),
                Textarea::make('content')
                    ->columnSpanFull(),
            ]);
    }
}
