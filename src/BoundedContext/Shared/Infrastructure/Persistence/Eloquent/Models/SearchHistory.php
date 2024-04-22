<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Ecommerce\Shared\Infrastructure\Persistence\Traits\MultiTenantEloquentModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SearchHistory extends Model
{
    use SoftDeletes, MultiTenantEloquentModelTrait, HasFactory;

    public $table = 'search_histories';

    protected $dates = [
        'last_date_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'is_active',
        'counter',
        'last_date_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getLastDateAtAttribute($value): ?string
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('setting.date_format') . ' ' . config('setting.time_format')) : null;
    }

    public function setLastDateAtAttribute($value): void
    {
        $this->attributes['last_date_at'] = $value ? Carbon::createFromFormat(config('setting.date_format') . ' ' . config('setting.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
