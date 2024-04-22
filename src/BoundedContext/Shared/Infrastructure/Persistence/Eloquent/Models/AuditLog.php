<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    public $table = 'audit_logs';

    protected $fillable = [
        'description',
        'subject_id',
        'subject_type',
        'user_id',
        'properties',
        'host',
    ];

    protected $casts = [
        'properties' => 'collection',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
