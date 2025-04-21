<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers\PricesRelationManager;
use App\Models\Service;
use Carbon\Carbon;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $slug = 'services';

    protected static ?string $navigationLabel = 'Услуги';
    protected static ?string $pluralLabel = 'Услуги';
    protected static ?string $label = 'Услуги';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->label('Название'),

                Textarea::make('description')
                    ->label('Описание'),

                Select::make('category_id')
                    ->label('Категория')
                    ->relationship('category', 'title')
                    ->preload()
                    ->searchable()
                    ->required(),

                TimePicker::make('duration')
                    ->label('Длительность')
                    ->seconds(false)
                    ->required(),

                Toggle::make('is_popular')
                    ->label('Популярно')
                    ->default(false),

                Placeholder::make('created_at')
                    ->label('Создано')
                    ->content(fn(?Service $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Обновлено')
                    ->content(fn(?Service $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.title')
                    ->label('Категория')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('duration')
                    ->label('Длительность')
                    ->searchable()
                    ->sortable()
                    ->time(),

                ToggleColumn::make('is_popular')
                    ->label('Популярно')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            PricesRelationManager::class
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['category']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'category.title'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->category) {
            $details['Category'] = $record->category->title;
        }

        return $details;
    }
}
