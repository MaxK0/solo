<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'description',
        'experience',
        'category_id',
        'photo'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(EmployeeCategory::class, 'category_id');
    }

    public function serviceCategories(): BelongsToMany
    {
        return $this->belongsToMany(ServiceCategory::class, 'employee_service_categories', relatedPivotKey: 'category_id');
    }
}
