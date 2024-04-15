<?php

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\User;

function dateToString(DateTimeInterface $date): string
{
    return $date->format(DateTimeInterface::ATOM);
}

function stringToDate(string $date): DateTimeImmutable
{
    return new DateTimeImmutable($date);
}

function jsonEncode(array $values): string
{
    return json_encode($values);
}

function jsonDecode(string $json): array
{
    $data = json_decode($json, true);

    if (JSON_ERROR_NONE !== json_last_error()) {
        throw new RuntimeException('Unable to parse response body into JSON: ' . json_last_error());
    }

    return $data;
}

function toSnakeCase(string $text): string
{
    return ctype_lower($text) ? $text : strtolower(preg_replace('/([^A-Z\s])([A-Z])/', "$1_$2", $text));
}

function toCamelCase(string $text): string
{
    return lcfirst(str_replace('_', '', ucwords($text, '_')));
}

function simplified($text) : string
{
    return str_replace(array("\n", " "), '', $text);
}

function checksum(string $text, string $encode = 'md5') : string
{
    $algorithms = ['md2', 'md4', 'md5', 'sha1', 'sha224', 'sha256', 'sha384', 'sha512'];

    assert(in_array($encode, $algorithms) === true);

    return hash($encode, $text, false);
}

function fingerPrint(array $parts): string
{
    $fingerPrint = '';
    foreach ($parts as $part)
    {
        $fingerPrint .= md5(sprintf('%s - ', $part));
    }
    return md5($fingerPrint . config('app.key'));
}

function toArray(mixed $value) : array
{
    if (is_null($value)) {
        return [];
    }
    return is_array($value) ? $value : [$value];
}

function userByBearerToken(): User
{
    $token = request()->bearerToken();
    return User::where('token', $token)->first();
}

function authControllerPath(string $controller): string
{
    return base_path("src/BoundedContext/Auth/Infrastructure/Controllers/{$controller}.php");
}
function sharedPathOnBoundedContext(string $path = ''): string
{
    return base_path("src/BoundedContext/Shared/{$path}");
}

function sharedPath(string $path = ''): string
{
    return base_path("src/Shared/{$path}");
}
