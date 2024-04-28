<?php

namespace Ecommerce\Shared\Domain;

enum RoleType: int
{
    case ADMIN = 1;
    case ADVERTISER = 2;
    case AFFILIATE = 3;
    case CUSTOMER = 4;
    case API_REST_FULL = 5;
    case MERCHANT = 6;
    case PUBLISHER = 7;
    case SALES_REPRESENTATIVE = 8;
    case MARKETING_MANAGER = 9;
    case ACCOUNT_MANAGER = 10;
    case AFFILIATE_MANAGER = 11;
    case AD_OPERATIONS_MANAGER = 12;
    case PARTNER_MANAGER = 13;
    case BUSINESS_DEVELOPMENT_MANAGER = 14;
    case CUSTOMER_SERVICE_REPRESENTATIVE = 15;
    case FINANCIAL_MANAGER = 16;
    case LEGAL_ADVISOR = 17;
    case COMPLIANCE_OFFICER = 18;
    case TECHNICAL_SUPPORT = 19;
    case CONTENT_MANAGER = 20;
    case SOCIAL_MEDIA_MANAGER = 21;
    case SEO_SPECIALIST = 22;
    case DATA_ANALYST = 23;

    public function type(): string
    {
        return match($this)
        {
            self::ADMIN => 'Admin',
            self::ADVERTISER => 'Advertiser',
            self::AFFILIATE => 'Affiliate',
            self::CUSTOMER => 'Customer',
            self::API_REST_FULL => 'API REST Full',
            self::MERCHANT => 'Merchant',
            self::PUBLISHER => 'Publisher',
            self::SALES_REPRESENTATIVE => 'Sales Representative',
            self::MARKETING_MANAGER => 'Marketing Manager',
            self::ACCOUNT_MANAGER => 'Account Manager',
            self::AFFILIATE_MANAGER => 'Affiliate Manager',
            self::AD_OPERATIONS_MANAGER => 'Ad Operations Manager',
            self::PARTNER_MANAGER => 'Partner Manager',
            self::BUSINESS_DEVELOPMENT_MANAGER => 'Business Development Manager',
            self::CUSTOMER_SERVICE_REPRESENTATIVE => 'Customer Service Representative',
            self::FINANCIAL_MANAGER => 'Financial Manager',
            self::LEGAL_ADVISOR => 'Legal Advisor',
            self::COMPLIANCE_OFFICER => 'Compliance Officer',
            self::TECHNICAL_SUPPORT => 'Technical Support',
            self::CONTENT_MANAGER => 'Content Manager',
            self::SOCIAL_MEDIA_MANAGER => 'Social Media Manager',
            self::SEO_SPECIALIST => 'SEO Specialist',
            self::DATA_ANALYST => 'Data Analyst',
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

