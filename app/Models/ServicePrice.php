<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePrice extends Model
{
    protected $fillable = [
        'price',
        'service_id',
        'employee_category_id',
    ];

    protected $casts = [
        'price' => 'integer',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function employeeCategory()
    {
        return $this->belongsTo(EmployeeCategory::class);
    }
}
