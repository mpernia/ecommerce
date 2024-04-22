<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id' => 1,
                'key' => 'user_management_access',
                'title' => 'user management access',
            ],
            [
                'id' => 2,
                'key' => 'permission_create',
                'title' => 'permission create',
            ],
            [
                'id' => 3,
                'key' => 'permission_edit',
                'title' => 'permission edit',
            ],
            [
                'id' => 4,
                'key' => 'permission_show',
                'title' => 'permission show',
            ],
            [
                'id' => 5,
                'key' => 'permission_delete',
                'title' => 'permission delete',
            ],
            [
                'id' => 6,
                'key' => 'permission_access',
                'title' => 'permission access',
            ],
            [
                'id' => 7,
                'key' => 'role_create',
                'title' => 'role create',
            ],
            [
                'id' => 8,
                'key' => 'role_edit',
                'title' => 'role edit',
            ],
            [
                'id' => 9,
                'key' => 'role_show',
                'title' => 'role show',
            ],
            [
                'id' => 10,
                'key' => 'role_delete',
                'title' => 'role delete',
            ],
            [
                'id' => 11,
                'key' => 'role_access',
                'title' => 'role access',
            ],
            [
                'id' => 12,
                'key' => 'user_create',
                'title' => 'user create',
            ],
            [
                'id' => 13,
                'key' => 'user_edit',
                'title' => 'user edit',
            ],
            [
                'id' => 14,
                'key' => 'user_show',
                'title' => 'user show',
            ],
            [
                'id' => 15,
                'key' => 'user_delete',
                'title' => 'user delete',
            ],
            [
                'id' => 16,
                'key' => 'user_access',
                'title' => 'user access',
            ],
            [
                'id' => 17,
                'key' => 'user_alert_create',
                'title' => 'user alert create',
            ],
            [
                'id' => 18,
                'key' => 'user_alert_show',
                'title' => 'user alert show',
            ],
            [
                'id' => 19,
                'key' => 'user_alert_delete',
                'title' => 'user alert delete',
            ],
            [
                'id' => 20,
                'key' => 'user_alert_access',
                'title' => 'user alert access',
            ],
            [
                'id' => 21,
                'key' => 'api_user_create',
                'title' => 'api user create',
            ],
            [
                'id' => 22,
                'key' => 'api_user_edit',
                'title' => 'api user edit',
            ],
            [
                'id' => 23,
                'key' => 'api_user_show',
                'title' => 'api user show',
            ],
            [
                'id' => 24,
                'key' => 'api_user_delete',
                'title' => 'api user delete',
            ],
            [
                'id' => 25,
                'key' => 'api_user_access',
                'title' => 'api user access',
            ],
            [
                'id' => 26,
                'key' => 'known_host_create',
                'title' => 'known host create',
            ],
            [
                'id' => 27,
                'key' => 'known_host_edit',
                'title' => 'known host edit',
            ],
            [
                'id' => 28,
                'key' => 'known_host_show',
                'title' => 'known host show',
            ],
            [
                'id' => 29,
                'key' => 'known_host_delete',
                'title' => 'known host delete',
            ],
            [
                'id' => 30,
                'key' => 'known_host_access',
                'title' => 'known host access',
            ],
            [
                'id' => 31,
                'key' => 'audit_log_show',
                'title' => 'audit log show',
            ],
            [
                'id' => 32,
                'key' => 'audit_log_access',
                'title' => 'audit log access',
            ],
            [
                'id' => 33,
                'key' => 'profile_password_edit',
                'title' => 'profile password edit',
            ],


            [
                'id'    => 34,
                'key' => 'faq_category_create',
                'title' => 'faq category create',
            ],
            [
                'id'    => 35,
                'key' => 'faq_category_edit',
                'title' => 'faq category edit',
            ],
            [
                'id'    => 36,
                'key' => 'faq_category_show',
                'title' => 'faq category show',
            ],
            [
                'id'    => 37,
                'key' => 'faq_category_delete',
                'title' => 'faq category delete',
            ],
            [
                'id'    => 38,
                'key' => 'faq_category_access',
                'title' => 'faq category access',
            ],
            [
                'id'    => 39,
                'key' => 'faq_question_create',
                'title' => 'faq question create',
            ],
            [
                'id'    => 40,
                'key' => 'faq_question_edit',
                'title' => 'faq question edit',
            ],
            [
                'id'    => 41,
                'key' => 'faq_question_show',
                'title' => 'faq question show',
            ],
            [
                'id'    => 42,
                'key' => 'faq_question_delete',
                'title' => 'faq question delete',
            ],
            [
                'id'    => 43,
                'key' => 'faq_question_access',
                'title' => 'faq question access',
            ],
            [
                'id'    => 44,
                'key' => 'product_management_access',
                'title' => 'product management access',
            ],
            [
                'id'    => 45,
                'key' => 'product_category_create',
                'title' => 'product category create',
            ],
            [
                'id'    => 46,
                'key' => 'product_category_edit',
                'title' => 'product category edit',
            ],
            [
                'id'    => 47,
                'key' => 'product_category_show',
                'title' => 'product category show',
            ],
            [
                'id'    => 48,
                'key' => 'product_category_delete',
                'title' => 'product category delete',
            ],
            [
                'id'    => 49,
                'key' => 'product_category_access',
                'title' => 'product category access',
            ],
            [
                'id'    => 50,
                'key' => 'product_tag_create',
                'title' => 'product tag create',
            ],
            [
                'id'    => 51,
                'key' => 'product_tag_edit',
                'title' => 'product tag edit',
            ],
            [
                'id'    => 52,
                'key' => 'product_tag_show',
                'title' => 'product tag show',
            ],
            [
                'id'    => 53,
                'key' => 'product_tag_delete',
                'title' => 'product tag delete',
            ],
            [
                'id'    => 54,
                'key' => 'product_tag_access',
                'title' => 'product tag access',
            ],
            [
                'id'    => 55,
                'key' => 'product_create',
                'title' => 'product create',
            ],
            [
                'id'    => 56,
                'key' => 'product_edit',
                'title' => 'product edit',
            ],
            [
                'id'    => 57,
                'key' => 'product_show',
                'title' => 'product show',
            ],
            [
                'id'    => 58,
                'key' => 'product_delete',
                'title' => 'product delete',
            ],
            [
                'id'    => 199,
                'key' => 'product_access',
                'title' => 'product access',
            ],
            [
                'id'    => 60,
                'key' => 'content_management_access',
                'title' => 'content management access',
            ],
            [
                'id'    => 61,
                'key' => 'content_category_create',
                'title' => 'content category create',
            ],
            [
                'id'    => 62,
                'key' => 'content_category_edit',
                'title' => 'content category edit',
            ],
            [
                'id'    => 63,
                'key' => 'content_category_show',
                'title' => 'content category show',
            ],
            [
                'id'    => 64,
                'key' => 'content_category_delete',
                'title' => 'content category delete',
            ],
            [
                'id'    => 65,
                'key' => 'content_category_access',
                'title' => 'content category access',
            ],
            [
                'id'    => 66,
                'key' => 'content_tag_create',
                'title' => 'content tag create',
            ],
            [
                'id'    => 67,
                'key' => 'content_tag_edit',
                'title' => 'content tag edit',
            ],
            [
                'id'    => 68,
                'key' => 'content_tag_show',
                'title' => 'content tag show',
            ],
            [
                'id'    => 69,
                'key' => 'content_tag_delete',
                'title' => 'content tag delete',
            ],
            [
                'id'    => 70,
                'key' => 'content_tag_access',
                'title' => 'content tag access',
            ],
            [
                'id'    => 71,
                'key' => 'content_page_create',
                'title' => 'content page create',
            ],
            [
                'id'    => 72,
                'key' => 'content_page_edit',
                'title' => 'content page edit',
            ],
            [
                'id'    => 73,
                'key' => 'content_page_show',
                'title' => 'content page show',
            ],
            [
                'id'    => 74,
                'key' => 'content_page_delete',
                'title' => 'content page delete',
            ],
            [
                'id'    => 59,
                'key' => 'content_page_access',
                'title' => 'content page access',
            ],
            [
                'id'    => 75,
                'key' => 'advertiser_management_setting_access',
                'title' => 'advertiser management setting access',
            ],
            [
                'id'    => 76,
                'key' => 'currency_create',
                'title' => 'currency create',
            ],
            [
                'id'    => 77,
                'key' => 'currency_edit',
                'title' => 'currency edit',
            ],
            [
                'id'    => 78,
                'key' => 'currency_show',
                'title' => 'currency show',
            ],
            [
                'id'    => 79,
                'key' => 'currency_delete',
                'title' => 'currency delete',
            ],
            [
                'id'    => 80,
                'key' => 'currency_access',
                'title' => 'currency access',
            ],
            [
                'id'    => 81,
                'key' => 'transaction_type_create',
                'title' => 'transaction type create',
            ],
            [
                'id'    => 82,
                'key' => 'transaction_type_edit',
                'title' => 'transaction type edit',
            ],
            [
                'id'    => 83,
                'key' => 'transaction_type_show',
                'title' => 'transaction type show',
            ],
            [
                'id'    => 84,
                'key' => 'transaction_type_delete',
                'title' => 'transaction type delete',
            ],
            [
                'id'    => 85,
                'key' => 'transaction_type_access',
                'title' => 'transaction type access',
            ],
            [
                'id'    => 86,
                'key' => 'income_source_create',
                'title' => 'income source create',
            ],
            [
                'id'    => 87,
                'key' => 'income_source_edit',
                'title' => 'income source edit',
            ],
            [
                'id'    => 88,
                'key' => 'income_source_show',
                'title' => 'income source show',
            ],
            [
                'id'    => 89,
                'key' => 'income_source_delete',
                'title' => 'income source delete',
            ],
            [
                'id'    => 90,
                'key' => 'income_source_access',
                'title' => 'income source access',
            ],
            [
                'id'    => 91,
                'key' => 'advertiser_status_create',
                'title' => 'advertiser status create',
            ],
            [
                'id'    => 92,
                'key' => 'advertiser_status_edit',
                'title' => 'advertiser status edit',
            ],
            [
                'id'    => 93,
                'key' => 'advertiser_status_show',
                'title' => 'advertiser status show',
            ],
            [
                'id'    => 94,
                'key' => 'advertiser_status_delete',
                'title' => 'advertiser status delete',
            ],
            [
                'id'    => 95,
                'key' => 'advertiser_status_access',
                'title' => 'advertiser status access',
            ],
            [
                'id'    => 96,
                'key' => 'store_status_create',
                'title' => 'store status create',
            ],
            [
                'id'    => 97,
                'key' => 'store_status_edit',
                'title' => 'store status edit',
            ],
            [
                'id'    => 98,
                'key' => 'store_status_show',
                'title' => 'store status show',
            ],
            [
                'id'    => 99,
                'key' => 'store_status_delete',
                'title' => 'store status delete',
            ],
            [
                'id'    => 100,
                'key' => 'store_status_access',
                'title' => 'store status access',
            ],
            [
                'id'    => 101,
                'key' => 'advertiser_management_access',
                'title' => 'advertiser management access',
            ],
            [
                'id'    => 102,
                'key' => 'advertiser_create',
                'title' => 'advertiser create',
            ],
            [
                'id'    => 103,
                'key' => 'advertiser_edit',
                'title' => 'advertiser edit',
            ],
            [
                'id'    => 104,
                'key' => 'advertiser_show',
                'title' => 'advertiser show',
            ],
            [
                'id'    => 105,
                'key' => 'advertiser_delete',
                'title' => 'advertiser delete',
            ],
            [
                'id'    => 106,
                'key' => 'advertiser_access',
                'title' => 'advertiser access',
            ],
            [
                'id'    => 107,
                'key' => 'store_create',
                'title' => 'store create',
            ],
            [
                'id'    => 108,
                'key' => 'store_edit',
                'title' => 'store edit',
            ],
            [
                'id'    => 109,
                'key' => 'store_show',
                'title' => 'store show',
            ],
            [
                'id'    => 110,
                'key' => 'store_delete',
                'title' => 'store delete',
            ],
            [
                'id'    => 111,
                'key' => 'store_access',
                'title' => 'store access',
            ],
            [
                'id'    => 112,
                'key' => 'note_create',
                'title' => 'note create',
            ],
            [
                'id'    => 113,
                'key' => 'note_edit',
                'title' => 'note edit',
            ],
            [
                'id'    => 114,
                'key' => 'note_show',
                'title' => 'note show',
            ],
            [
                'id'    => 115,
                'key' => 'note_delete',
                'title' => 'note delete',
            ],
            [
                'id'    => 116,
                'key' => 'note_access',
                'title' => 'note access',
            ],
            [
                'id'    => 117,
                'key' => 'document_create',
                'title' => 'document create',
            ],
            [
                'id'    => 118,
                'key' => 'document_edit',
                'title' => 'document edit',
            ],
            [
                'id'    => 119,
                'key' => 'document_show',
                'title' => 'document show',
            ],
            [
                'id'    => 120,
                'key' => 'document_delete',
                'title' => 'document delete',
            ],
            [
                'id'    => 121,
                'key' => 'document_access',
                'title' => 'document access',
            ],
            [
                'id'    => 122,
                'key' => 'transaction_create',
                'title' => 'transaction create',
            ],
            [
                'id'    => 123,
                'key' => 'transaction_edit',
                'title' => 'transaction edit',
            ],
            [
                'id'    => 124,
                'key' => 'transaction_show',
                'title' => 'transaction show',
            ],
            [
                'id'    => 125,
                'key' => 'transaction_delete',
                'title' => 'transaction delete',
            ],
            [
                'id'    => 126,
                'key' => 'transaction_access',
                'title' => 'transaction access',
            ],
            [
                'id'    => 127,
                'key' => 'advertiser_report_create',
                'title' => 'advertiser report create',
            ],
            [
                'id'    => 128,
                'key' => 'advertiser_report_edit',
                'title' => 'advertiser report edit',
            ],
            [
                'id'    => 129,
                'key' => 'advertiser_report_show',
                'title' => 'advertiser report show',
            ],
            [
                'id'    => 130,
                'key' => 'advertiser_report_delete',
                'title' => 'advertiser report delete',
            ],
            [
                'id'    => 131,
                'key' => 'advertiser_report_access',
                'title' => 'advertiser report access',
            ],
            [
                'id'    => 147,
                'key' => 'affiliate_management_access',
                'title' => 'affiliate management access',
            ],
            [
                'id'    => 148,
                'key' => 'campaign_create',
                'title' => 'campaign create',
            ],
            [
                'id'    => 149,
                'key' => 'campaign_edit',
                'title' => 'campaign edit',
            ],
            [
                'id'    => 150,
                'key' => 'campaign_show',
                'title' => 'campaign show',
            ],
            [
                'id'    => 151,
                'key' => 'campaign_delete',
                'title' => 'campaign delete',
            ],
            [
                'id'    => 152,
                'key' => 'campaign_access',
                'title' => 'campaign access',
            ],
            [
                'id'    => 153,
                'key' => 'affiliate_status_create',
                'title' => 'affiliate status create',
            ],
            [
                'id'    => 154,
                'key' => 'affiliate_status_edit',
                'title' => 'affiliate status edit',
            ],
            [
                'id'    => 155,
                'key' => 'affiliate_status_show',
                'title' => 'affiliate status show',
            ],
            [
                'id'    => 156,
                'key' => 'affiliate_status_delete',
                'title' => 'affiliate status delete',
            ],
            [
                'id'    => 157,
                'key' => 'affiliate_status_access',
                'title' => 'affiliate status access',
            ],
            [
                'id'    => 158,
                'key' => 'affiliate_create',
                'title' => 'affiliate create',
            ],
            [
                'id'    => 159,
                'key' => 'affiliate_edit',
                'title' => 'affiliate edit',
            ],
            [
                'id'    => 160,
                'key' => 'affiliate_show',
                'title' => 'affiliate show',
            ],
            [
                'id'    => 161,
                'key' => 'affiliate_delete',
                'title' => 'affiliate delete',
            ],
            [
                'id'    => 162,
                'key' => 'affiliate_access',
                'title' => 'affiliate access',
            ],
            [
                'id'    => 163,
                'key' => 'preference_create',
                'title' => 'preference create',
            ],
            [
                'id'    => 164,
                'key' => 'preference_edit',
                'title' => 'preference edit',
            ],
            [
                'id'    => 165,
                'key' => 'preference_show',
                'title' => 'preference show',
            ],
            [
                'id'    => 166,
                'key' => 'preference_delete',
                'title' => 'preference delete',
            ],
            [
                'id'    => 167,
                'key' => 'preference_access',
                'title' => 'preference access',
            ],
            [
                'id'    => 168,
                'key' => 'my_account_access',
                'title' => 'my account access',
            ],
            [
                'id'    => 169,
                'key' => 'profile_create',
                'title' => 'profile create',
            ],
            [
                'id'    => 170,
                'key' => 'profile_edit',
                'title' => 'profile edit',
            ],
            [
                'id'    => 171,
                'key' => 'profile_show',
                'title' => 'profile show',
            ],
            [
                'id'    => 172,
                'key' => 'profile_delete',
                'title' => 'profile delete',
            ],
            [
                'id'    => 173,
                'key' => 'profile_access',
                'title' => 'profile access',
            ],
            [
                'id'    => 174,
                'key' => 'favorite_product_create',
                'title' => 'favorite product create',
            ],
            [
                'id'    => 175,
                'key' => 'favorite_product_edit',
                'title' => 'favorite product edit',
            ],
            [
                'id'    => 176,
                'key' => 'favorite_product_show',
                'title' => 'favorite product show',
            ],
            [
                'id'    => 177,
                'key' => 'favorite_product_delete',
                'title' => 'favorite product delete',
            ],
            [
                'id'    => 178,
                'key' => 'favorite_product_access',
                'title' => 'favorite product access',
            ],
            [
                'id'    => 179,
                'key' => 'search_history_create',
                'title' => 'search history create',
            ],
            [
                'id'    => 180,
                'key' => 'search_history_edit',
                'title' => 'search history edit',
            ],
            [
                'id'    => 181,
                'key' => 'search_history_show',
                'title' => 'search history show',
            ],
            [
                'id'    => 182,
                'key' => 'search_history_delete',
                'title' => 'search history delete',
            ],
            [
                'id'    => 183,
                'key' => 'search_history_access',
                'title' => 'search history access',
            ],
            [
                'id'    => 184,
                'key' => 'management_setting_access',
                'title' => 'management setting access',
            ],
            [
                'id'    => 185,
                'key' => 'affiliate_campaign_create',
                'title' => 'affiliate campaign create',
            ],
            [
                'id'    => 186,
                'key' => 'affiliate_campaign_edit',
                'title' => 'affiliate campaign edit',
            ],
            [
                'id'    => 187,
                'key' => 'affiliate_campaign_show',
                'title' => 'affiliate campaign show',
            ],
            [
                'id'    => 188,
                'key' => 'affiliate_campaign_delete',
                'title' => 'affiliate campaign delete',
            ],
            [
                'id'    => 189,
                'key' => 'affiliate_campaign_access',
                'title' => 'affiliate campaign access',
            ],
            [
                'id'    => 190,
                'key' => 'lead_create',
                'title' => 'lead create',
            ],
            [
                'id'    => 200,
                'key' => 'lead_edit',
                'title' => 'lead edit',
            ],
            [
                'id'    => 191,
                'key' => 'lead_show',
                'title' => 'lead show',
            ],
            [
                'id'    => 192,
                'key' => 'lead_delete',
                'title' => 'lead delete',
            ],
            [
                'id'    => 193,
                'key' => 'lead_access',
                'title' => 'lead access',
            ],
            [
                'id'    => 194,
                'key' => 'sale_create',
                'title' => 'sale create',
            ],
            [
                'id'    => 195,
                'key' => 'sale_edit',
                'title' => 'sale edit',
            ],
            [
                'id'    => 196,
                'key' => 'sale_show',
                'title' => 'sale show',
            ],
            [
                'id'    => 197,
                'key' => 'sale_delete',
                'title' => 'sale delete',
            ],
            [
                'id'    => 198,
                'key' => 'sale_access',
                'title' => 'sale access',
            ],
        ];

        Permission::insert($permissions);
    }
}
