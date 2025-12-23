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
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Page';

    public static function form(Schema $schema): Schema
    {
        return PageForm::configure($schema)->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->maxLength(255)
                    ->unique(Page::class, 'slug', ignoreRecord: true)
                    ->nullable()
                    ->columnSpanFull(),
                TextInput::make('meta_description')
                    ->label('Meta Description')
                    ->required()
                    ->maxLength(240)
                    ->columnSpanFull(),
                TextInput::make('og_title')
                    ->label('OG title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                 TextInput::make('og_description')
                    ->label('OG Description')
                    ->required()
                    ->maxLength(240)
                    ->columnSpanFull(),
                FileUpload::make('og_image')
                    ->label('OG Image')
                    ->disk('public')
                    ->image()
                    ->columnSpanFull(),
                Builder::make('content')
                   ->blocks([
                        Builder\Block::make('sections.homepage')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('subtitle')
                                    ->required()
                                    ->maxLength(500)
                                    ->columnSpanFull(),
                                TextInput::make('button_text')
                                    ->required()
                                    ->maxLength(100),
                                TextInput::make('button_link')
                                    ->required()
                                    ->maxLength(255)
                            ])->columnSpanFull(),
                        Builder\Block::make('sections.basic')
                           ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                RichEditor::make('content')
                                    ->required()
                                    ->columnSpanFull(),
                            ])->columnSpanFull(),
                        Builder\Block::make('sections.default')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('text')
                                    ->required()
                                    ->maxLength(2500),
                                FileUpload::make('image')
                                    ->image()
                                    ->required()
                                    ->disk('public')
                                    ->columnSpanFull(),
                                TextInput::make('button_text')
                                    ->maxLength(100)
                                    ->columnSpanFull(),
                                TextInput::make('button_link')
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                Checkbox::make('inverted')
                                    ->columnSpanFull(),
                            ])->columnSpanFull(),
                        Builder\Block::make('sections.contact')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('text')
                                    ->required()
                                    ->maxLength(500)
                                    ->columnSpanFull(),
                            ])->columnSpanFull(),
                        Builder\Block::make('sections.hero')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                TextInput::make('subtitle')
                                    ->required()
                                    ->maxLength(500)
                                    ->columnSpanFull(),
                                FileUpload::make('image')
                                    ->image()
                                    ->required()
                                    ->disk('public')
                                    ->columnSpanFull(),
                            ])->columnSpanFull(),
                        Builder\Block::make('sections.reviews')
                            ->schema([
                                Select::make('review_ids')
                                    ->label('Select Reviews')
                                    ->multiple()
                                    ->options(Review::pluck('content','id'))
                                    ->searchable(),
                            ])->columnSpanFull(),
                        Builder\Block::make('sections.equipment')
                            ->schema([
                                TextInput::make('title')
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                RichEditor::make('text')
                                    ->columnSpanFull(),
                            ])->columnSpanFull(),
                        Builder\Block::make('sections.cta')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                TextInput::make('subtitle')
                                    ->required()
                                    ->maxLength(500)
                                    ->columnSpanFull(),
                                TextInput::make('button_text')
                                    ->required()
                                    ->maxLength(100)
                                    ->columnSpanFull(),
                                TextInput::make('button_link')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                            ])->columnSpanFull(),
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
