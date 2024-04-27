<?php

namespace Ecommerce\Shared\Domain;

enum RoleType: int
{
    case ADMIN = 1;
    case ADVERTISER = 2;
    case AFFILIATE = 3;
    case CUSTOMER = 4;
    case API = 5;

    public function type(): string
    {
        return match($this)
        {
            self::ADMIN => 'Admin',
            self::ADVERTISER => 'Advertiser',
            self::AFFILIATE => 'Affiliate',
            self::CUSTOMER => 'Customer',
            self::API => 'API Rest',
        };
    }

    public static function all(): array
    {
        return array_map(
            fn($case) => [
                'id' => $case->value,
                'name' => $case->type()
            ],
            self::cases()
        );
    }

    public static function at(RoleType $userType): array
    {
        return [
            'id' => $userType->value,
            'name' => $userType->type()
        ];
    }
}

