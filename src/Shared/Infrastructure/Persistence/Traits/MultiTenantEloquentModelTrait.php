<?php

namespace Ecommerce\Shared\Infrastructure\Persistence\Traits;

use Illuminate\Database\Eloquent\Builder;

trait MultiTenantEloquentModelTrait
{
    public static function bootMultiTenantModelTrait(): void
    {
        if (! app()->runningInConsole() && auth()->check()) {
            $isAdmin = auth()->user()->roles->contains(1);
            static::creating(function ($model) use ($isAdmin) {
                if (! $isAdmin) {
                    $model->created_by_id = auth()->id();
                }
            });
            if (! $isAdmin) {
                static::addGlobalScope('created_by_id', function (Builder $builder) {
                    $field = sprintf('%s.%s', $builder->getQuery()->from, 'created_by_id');

                    $builder->where($field, auth()->id())->orWhereNull($field);
                });
            }
        }
    }
}
