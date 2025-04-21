<?php

namespace App\Filament\Resources\ServiceResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PricesRelationManager extends RelationManager
{
    protected static string $relationship = 'prices';

    protected static ?string $label = 'Цены';
    protected static ?string $pluralLabel = 'Цены';
    protected static ?string $modelLabel = 'Цены';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('price')
                    ->label('Цена')
                    ->required()
                    ->integer(),

                Forms\Components\Select::make('employee_category_id')
                    ->label('Категория сотрудников')
                    ->relationship('employeeCategory', 'title')
                    ->preload(true)
                    ->searchable()
                    ->required()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('price')
                    ->label('Цена'),

                TextColumn::make('employeeCategory.title')
                    ->label('Категория сотрудников')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
