<?php

namespace Ecommerce\BoundedContext\Backend\Infrastructure\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

trait inJsonResource
{
    public string $routePrefix = '';
    public bool $showRelationships = false;

    abstract public function getRouteKeyName(): string;

    public function getType(): string
    {
        return toSnakeCase(get_class($this));
    }

    public function getRoute(): string
    {
        return sprintf('api.%s.show', $this->routePrefix);
    }

    public function getApiAttributes(): array
    {
        $defaults = [
            $this->getCreatedAtColumn(),
            $this->getUpdatedAtColumn(),
            $this->getDeletedAtColumn(),
        ];

        return Arr::except($this->getAttributes(), $defaults);
    }

    public function getPaginate(int $currentPage, int $perPage = 15): LengthAwarePaginator
    {
        $total = range(1, $this->count());
        $pageName = 'page';

        return new LengthAwarePaginator(
            items: $total,
            total: count($total),
            perPage: $perPage,
            currentPage: $currentPage,
            options: ['path' => url('dashboard/category')]
        );
    }

    public function relationships()
    {
        return $this->showRelationships ? $this->getRelations() : false;
    }

    public function included()
    {
        return [];
    }
}
