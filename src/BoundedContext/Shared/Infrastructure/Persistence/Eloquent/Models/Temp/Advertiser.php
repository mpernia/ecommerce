<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp;

use DateTimeInterface;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\User;
use Ecommerce\Shared\Infrastructure\Persistence\Traits\MultiTenantEloquentModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertiser extends Model
{
    use SoftDeletes, MultiTenantEloquentModelTrait, HasFactory;

    public $table = 'advertisers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'email',
        'phone',
        'website',
        'skype',
        'country',
        'status_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function status()
    {
        return $this->belongsTo(AdvertiserStatus::class, 'status_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
