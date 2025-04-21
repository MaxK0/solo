<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'start',
        'end',
        'service_id',
        'user_id',
        'employee_id',
        'price_id',
        'status',
    ];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
        'status' => StatusEnum::class,
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function price()
    {
        return $this->belongsTo(ServicePrice::class, 'price_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
