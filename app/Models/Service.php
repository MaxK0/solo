<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'duration',
        'is_popular'
    ];

    protected $casts = [
        'duration' => 'datetime:H:i',
        'is_popular' => 'boolean'
    ];

    protected $appends = [
        'duration_time'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    public function prices(): HasMany
    {
        return $this->hasMany(ServicePrice::class, 'service_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'service_id');
    }

    public function getDurationTimeAttribute()
    {
        return Carbon::make($this->duration)->format('H:i');
    }
}
