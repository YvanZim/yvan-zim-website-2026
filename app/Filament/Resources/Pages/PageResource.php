<?php

namespace App\Filament\Resources\Pages;

use App\Filament\Resources\Pages\Pages\CreatePage;
use App\Filament\Resources\Pages\Pages\EditPage;
use App\Filament\Resources\Pages\Pages\ListPages;
use App\Filament\Resources\Pages\Schemas\PageForm;
use App\Filament\Resources\Pages\Tables\PagesTable;
use App\Models\Page;
use App\Models\Review;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return PageForm::configure($schema)->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->maxLength(255)
                    ->nullable()
                    ->columnSpanFull(),
                Select::make('lang')
                    ->options(['en' => 'English', 'fr' => 'French'])
                    ->default('en')
                    ->required(),
                TextInput::make('meta_description')
                    ->label('Meta Description')
                    ->maxLength(240)
                    ->columnSpanFull(),
                TextInput::make('og_title')
                    ->label('OG Title')
                    ->maxLength(255),
                TextInput::make('og_description')
                    ->label('OG Description')
                    ->maxLength(240),
                FileUpload::make('og_image')
                    ->label('OG Image')
                    ->disk('public')
                    ->image()
                    ->columnSpanFull(),
                Toggle::make('live')
                    ->default(true),
                Toggle::make('no_index')
                    ->default(false),
                Builder::make('content')
                    ->blocks([
                        Builder\Block::make('components.sections.home')
                            ->label('Home Hero')
                            ->schema([
                                TextInput::make('title')->required(),
                                RichEditor::make('content')->label('Subtitle HTML'),
                                TextInput::make('link')->label('Button URL'),
                                TextInput::make('button')->label('Button Label'),
                                Checkbox::make('page_title')->label('Use as H1'),
                            ]),
                        Builder\Block::make('components.sections.two-columns')
                            ->label('Two Columns (Image + Text)')
                            ->schema([
                                TextInput::make('title')->required(),
                                RichEditor::make('content'),
                                TextInput::make('image')->label('Image URL'),
                                TextInput::make('link')->label('Button URL'),
                                TextInput::make('button')->label('Button Label'),
                                Checkbox::make('page_title')->label('Use as H1'),
                            ]),
                        Builder\Block::make('components.sections.half-columns')
                            ->label('Half Columns (50/50)')
                            ->schema([
                                TextInput::make('title')->required(),
                                RichEditor::make('content'),
                                TextInput::make('image')->label('Image URL'),
                                TextInput::make('link')->label('Button URL'),
                                TextInput::make('button')->label('Button Label'),
                                Checkbox::make('page_title')->label('Use as H1'),
                            ]),
                        Builder\Block::make('components.sections.simple')
                            ->label('Simple (Centered Text)')
                            ->schema([
                                TextInput::make('title')->required(),
                                RichEditor::make('content'),
                                TextInput::make('link')->label('Button URL'),
                                TextInput::make('button')->label('Button Label'),
                                Checkbox::make('page_title')->label('Use as H1'),
                            ]),
                        Builder\Block::make('components.sections.contact-form')
                            ->label('Contact Form')
                            ->schema([
                                TextInput::make('title')->required(),
                                RichEditor::make('content'),
                                Checkbox::make('page_title')->label('Use as H1'),
                            ]),
                        Builder\Block::make('components.sections.contact-bar')
                            ->label('Contact Bar (CTA)')
                            ->schema([
                                TextInput::make('title')->required(),
                                RichEditor::make('content'),
                                TextInput::make('link')->label('Button URL'),
                                TextInput::make('button')->label('Button Label'),
                            ]),
                        Builder\Block::make('components.sections.reviews')
                            ->label('Reviews')
                            ->schema([
                                TextInput::make('title'),
                                Select::make('review_ids')
                                    ->label('Select Reviews')
                                    ->multiple()
                                    ->options(Review::pluck('name', 'id'))
                                    ->searchable(),
                                Checkbox::make('page_title')->label('Use as H1'),
                            ]),
                        Builder\Block::make('components.sections.video')
                            ->label('Video + Text')
                            ->schema([
                                TextInput::make('title')->required(),
                                RichEditor::make('content'),
                                TextInput::make('link')->label('Button URL'),
                                TextInput::make('button')->label('Button Label'),
                                Checkbox::make('page_title')->label('Use as H1'),
                            ]),
                        Builder\Block::make('components.sections.location')
                            ->label('Location Page')
                            ->schema([
                                TextInput::make('title')->required(),
                                TextInput::make('location')->label('Location Name'),
                                RichEditor::make('content'),
                                RichEditor::make('content_two')->label('Location Description'),
                                TextInput::make('image')->label('Image URL'),
                                Select::make('review_ids')
                                    ->label('Select Reviews')
                                    ->multiple()
                                    ->options(Review::pluck('name', 'id'))
                                    ->searchable(),
                                Checkbox::make('page_title')->label('Use as H1'),
                            ]),
                        Builder\Block::make('components.sections.location-list')
                            ->label('Location List')
                            ->schema([
                                TextInput::make('title'),
                                RichEditor::make('content'),
                                Checkbox::make('page_title')->label('Use as H1'),
                            ]),
                        Builder\Block::make('components.sections.logos')
                            ->label('Client Logos')
                            ->schema([
                                TextInput::make('title'),
                            ]),
                        Builder\Block::make('components.sections.tile')
                            ->label('Photo Gallery Tiles')
                            ->schema([
                                TextInput::make('title'),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return PagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPages::route('/'),
            'create' => CreatePage::route('/create'),
            'edit' => EditPage::route('/{record}/edit'),
        ];
    }
}
