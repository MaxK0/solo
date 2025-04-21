<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeCategoryResource\Pages;
use App\Models\EmployeeCategory;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeeCategoryResource extends Resource
{
    protected static ?string $model = EmployeeCategory::class;

    protected static ?string $slug = 'employee-categories';

    protected static ?string $navigationLabel = 'Категории сотрудников';
    protected static ?string $pluralLabel = 'Категории сотрудников';
    protected static ?string $label = 'Категории сотрудников';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Название')
                    ->required(),

                Placeholder::make('created_at')
                    ->label('Создано')
                    ->content(fn(?EmployeeCategory $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Изменено')
                    ->content(fn(?EmployeeCategory $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
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
            'index' => Pages\ListEmployeeCategories::route('/'),
            'create' => Pages\CreateEmployeeCategory::route('/create'),
            'edit' => Pages\EditEmployeeCategory::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title'];
    }
}
