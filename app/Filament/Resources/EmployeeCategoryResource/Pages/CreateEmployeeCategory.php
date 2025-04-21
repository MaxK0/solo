<?php

namespace App\Filament\Resources\EmployeeCategoryResource\Pages;

use App\Filament\Resources\EmployeeCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployeeCategory extends CreateRecord
{
    protected static string $resource = EmployeeCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
