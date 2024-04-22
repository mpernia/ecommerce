<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Ecommerce\Shared\Infrastructure\Persistence\Traits\MultiTenantEloquentModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes, MultiTenantEloquentModelTrait, HasFactory;

    public $table = 'stores';

    protected $dates = [
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'advertiser_id',
        'description',
        'start_date',
        'budget',
        'status_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function advertiser(): BelongsTo
    {
        return $this->belongsTo(Advertiser::class, 'advertiser_id');
    }

    public function getStartDateAttribute($value): ?string
    {
        return $value ? Carbon::parse($value)->format(config('setting.date_format')) : null;
    }

    public function setStartDateAttribute($value): void
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('setting.date_format'), $value)->format('Y-m-d') : null;
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(StoreStatus::class, 'status_id');
    }

    public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
