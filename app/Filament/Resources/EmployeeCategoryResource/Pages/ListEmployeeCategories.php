<?php

namespace App\Filament\Resources\EmployeeCategoryResource\Pages;

use App\Filament\Resources\EmployeeCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEmployeeCategories extends ListRecords
{
    protected static string $resource = EmployeeCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
