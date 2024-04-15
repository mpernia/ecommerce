<?php

namespace Ecommerce\Shared\Application\DataTransferObjects;

use Ecommerce\Shared\Domain\Contracts\DataTransferObjectInterface;
use Ecommerce\Shared\Domain\Exceptions\UndefinedMethodException;
use Exception;

#[\AllowDynamicProperties]
class DataTransferObject implements DataTransferObjectInterface
{
    protected array $fillable = [];

    public function __construct(array $properties)
    {
        if (empty($this->fillable)) {
            $this->fillable = $this->populate($properties);
        }
        $this->fill($properties);
    }

    public function __isset($name)
    {
        return isset($this->fillable[$name]);
    }

    public function __get($name)
    {
        try {
            return $this->{$name};
        } catch (Exception $e) {
            return null;
        }
    }

    public function __set($name, $value)
    {
        if (in_array(needle: $name, haystack: $this->fillable, strict: true)) {
            $this->{$name} = $value;
        } else {
            throw new UndefinedMethodException($name, get_class($this));
        }
    }

    public function notNullToArray(): array
    {
        $array = [];
        foreach ($this->toArray() as $property => $value) {
            if (!empty($value)) {
                $array[$property] = $value;
            }
        }
        return $array;
    }

    public function toArray(): array
    {
        $array = [];
        foreach ($this->fillable as $name) {
            $array[$name] = property_exists(object_or_class: $this, property: $name) ? $this->{$name} : null;
        }
        return $array;
    }

    private function populate(array $properties): array
    {
        $keys = [];
        foreach ($properties as $key => $value) {
            $inCamelCase = toCamelCase($key);
            $keys[] = $inCamelCase;
            if (is_array($value)) {
                $childs = $this->populate($value);
                foreach ($childs as $child) {
                    $keys[][$inCamelCase] = $child;
                }
            }
        }
        return $keys;
    }

    private function fill(array $properties): void
    {
        foreach ($properties as $key => $value) {
            $inCamelCase = toCamelCase($key);
            if (!empty($value) && in_array(needle: $inCamelCase, haystack: $this->fillable, strict: true)) {
                $this->{$inCamelCase} = $value;
            }
        }
    }
}
