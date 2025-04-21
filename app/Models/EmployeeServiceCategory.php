<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeServiceCategory extends Model
{
    protected $fillable = [
        'employee_id',
        'category_id',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
}
