<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models;

use DateTimeInterface;
use Ecommerce\Shared\Infrastructure\Persistence\Traits\MultiTenantEloquentModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Preference extends Model
{
    use SoftDeletes, MultiTenantEloquentModelTrait, HasFactory;

    public $table = 'preferences';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const NOTIFY_METHOD_SELECT = [
        '1' => 'SMS',
        '2' => 'E-Mail',
    ];

    protected $fillable = [
        'sort_product_by',
        'notify_method',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public const SORT_PRODUCT_BY_SELECT = [
        '1' => 'Price Desc',
        '2' => 'Price Asc',
        '3' => 'Category Asc',
        '4' => 'Category Desc',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
