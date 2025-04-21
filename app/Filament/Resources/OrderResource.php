<?php

namespace App\Filament\Resources;

use App\Enums\StatusEnum;
use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
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

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $slug = 'orders';

    protected static ?string $navigationLabel = 'Заказы';
    protected static ?string $pluralLabel = 'Заказы';
    protected static ?string $label = 'Заказы';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DateTimePicker::make('start')
                    ->label('Начало')
                    ->required(),

                DateTimePicker::make('end')
                    ->label('Конец')
                    ->required(),

                Select::make('service_id')
                    ->label('Услуга')
                    ->relationship('service', 'title')
                    ->preload()
                    ->searchable()
                    ->required(),

                Select::make('user_id')
                    ->label('Пользователь')
                    ->relationship('user', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),

                Select::make('employee_id')
                    ->label('Сотрудник')
                    ->relationship('employee', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),

                Select::make('status')
                    ->label('Статус')
                    ->options(StatusEnum::toArrayWithKeys())
                    ->required(),

                Placeholder::make('created_at')
                    ->label('Создано')
                    ->content(fn(?Order $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Изменено')
                    ->content(fn(?Order $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('start')
                    ->label('Начало')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('end')
                    ->label('Конец')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('service.title')
                    ->label('Услуга')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Пользователь')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('employee.name')
                    ->label('Сотрудник')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Статус')
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['service', 'user', 'employee']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['service.title', 'user.name', 'employee.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->service) {
            $details['Service'] = $record->service->title;
        }

        if ($record->user) {
            $details['User'] = $record->user->name;
        }

        if ($record->employee) {
            $details['Employee'] = $record->employee->name;
        }

        return $details;
    }
}
