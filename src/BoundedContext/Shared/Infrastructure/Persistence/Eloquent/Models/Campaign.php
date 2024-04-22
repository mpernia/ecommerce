<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models;

use DateTimeInterface;
use Ecommerce\Shared\Infrastructure\Persistence\Traits\MultiTenantEloquentModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use SoftDeletes, MultiTenantEloquentModelTrait, HasFactory;

    public $table = 'campaigns';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const UTM_MEDIUM_SELECT = [
        '1' => 'CPC',
        '2' => 'Banner',
        '3' => 'Email',
        '4' => 'SMS',
    ];

    protected $fillable = [
        'name',
        'is_active',
        'url',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',
        'created_at',
        'pay_per_clic',
        'cost_per_lead',
        'cost_per_acquisition',
        'cost_per_clic',
        'persent_per_sale',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
