<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\Employee;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $slug = 'employees';

    protected static ?string $navigationLabel = 'Сотрудники';
    protected static ?string $pluralLabel = 'Сотрудники';
    protected static ?string $label = 'Сотрудники';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Имя')
                    ->required(),

                TextInput::make('description')
                    ->label('Описание'),

                TextInput::make('experience')
                    ->label('Опыт')
                    ->integer(),

                Select::make('category_id')
                    ->label('Категория')
                    ->required()
                    ->relationship('category', 'title')
                    ->preload()
                    ->searchable(),

                Select::make('serviceCategories')
                    ->label('Оказываемые типы услуг')
                    ->required()
                    ->relationship('serviceCategories', 'title')
                    ->preload()
                    ->multiple()
                    ->searchable(),

                FileUpload::make('photo')
                    ->label('Изображение')
                    ->image()
                    ->directory('employees'),

                Placeholder::make('created_at')
                    ->label('Создано')
                    ->content(fn(?Employee $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Изменено')
                    ->content(fn(?Employee $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Имя')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('experience')
                    ->label('Опыт')
                    ->sortable(),

                TextColumn::make('category.title')
                    ->label('Категория')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('serviceCategories.title')
                    ->label('Оказываемые типы услуг')
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['category']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'category.title'];
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
