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
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 35,
                'key' => 'faq_category_edit',
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 36,
                'key' => 'faq_category_show',
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 37,
                'key' => 'faq_category_delete',
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 38,
                'key' => 'faq_category_access',
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 39,
                'key' => 'faq_question_create',
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 40,
                'key' => 'faq_question_edit',
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 41,
                'key' => 'faq_question_show',
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 42,
                'key' => 'faq_question_delete',
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 43,
                'key' => 'faq_question_access',
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 44,
                'key' => 'product_management_access',
                'title' => 'product_management_access',
            ],
            [
                'id'    => 45,
                'key' => 'product_category_create',
                'title' => 'product_category_create',
            ],
            [
                'id'    => 46,
                'key' => 'product_category_edit',
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 47,
                'key' => 'product_category_show',
                'title' => 'product_category_show',
            ],
            [
                'id'    => 48,
                'key' => 'product_category_delete',
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 49,
                'key' => 'product_category_access',
                'title' => 'product_category_access',
            ],
            [
                'id'    => 50,
                'key' => 'product_tag_create',
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 51,
                'key' => 'product_tag_edit',
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 52,
                'key' => 'product_tag_show',
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 53,
                'key' => 'product_tag_delete',
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 54,
                'key' => 'product_tag_access',
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 55,
                'key' => 'product_create',
                'title' => 'product_create',
            ],
            [
                'id'    => 56,
                'key' => 'product_edit',
                'title' => 'product_edit',
            ],
            [
                'id'    => 57,
                'key' => 'product_show',
                'title' => 'product_show',
            ],
            [
                'id'    => 58,
                'key' => 'product_delete',
                'title' => 'product_delete',
            ],
            [
                'id'    => 199,
                'key' => 'product_access',
                'title' => 'product_access',
            ],
            [
                'id'    => 60,
                'key' => 'content_management_access',
                'title' => 'content_management_access',
            ],
            [
                'id'    => 61,
                'key' => 'content_category_create',
                'title' => 'content_category_create',
            ],
            [
                'id'    => 62,
                'key' => 'content_category_edit',
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 63,
                'key' => 'content_category_show',
                'title' => 'content_category_show',
            ],
            [
                'id'    => 64,
                'key' => 'content_category_delete',
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 65,
                'key' => 'content_category_access',
                'title' => 'content_category_access',
            ],
            [
                'id'    => 66,
                'key' => 'content_tag_create',
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 67,
                'key' => 'content_tag_edit',
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 68,
                'key' => 'content_tag_show',
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 69,
                'key' => 'content_tag_delete',
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 70,
                'key' => 'content_tag_access',
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 71,
                'key' => 'content_page_create',
                'title' => 'content_page_create',
            ],
            [
                'id'    => 72,
                'key' => 'content_page_edit',
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 73,
                'key' => 'content_page_show',
                'title' => 'content_page_show',
            ],
            [
                'id'    => 74,
                'key' => 'content_page_delete',
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 59,
                'key' => 'content_page_access',
                'title' => 'content_page_access',
            ],
            [
                'id'    => 75,
                'key' => 'advertiser_management_setting_access',
                'title' => 'advertiser_management_setting_access',
            ],
            [
                'id'    => 76,
                'key' => 'currency_create',
                'title' => 'currency_create',
            ],
            [
                'id'    => 77,
                'key' => 'currency_edit',
                'title' => 'currency_edit',
            ],
            [
                'id'    => 78,
                'key' => 'currency_show',
                'title' => 'currency_show',
            ],
            [
                'id'    => 79,
                'key' => 'currency_delete',
                'title' => 'currency_delete',
            ],
            [
                'id'    => 80,
                'key' => 'currency_access',
                'title' => 'currency_access',
            ],
            [
                'id'    => 81,
                'key' => 'transaction_type_create',
                'title' => 'transaction_type_create',
            ],
            [
                'id'    => 82,
                'key' => 'transaction_type_edit',
                'title' => 'transaction_type_edit',
            ],
            [
                'id'    => 83,
                'key' => 'transaction_type_show',
                'title' => 'transaction_type_show',
            ],
            [
                'id'    => 84,
                'key' => 'transaction_type_delete',
                'title' => 'transaction_type_delete',
            ],
            [
                'id'    => 85,
                'key' => 'transaction_type_access',
                'title' => 'transaction_type_access',
            ],
            [
                'id'    => 86,
                'key' => 'income_source_create',
                'title' => 'income_source_create',
            ],
            [
                'id'    => 87,
                'key' => 'income_source_edit',
                'title' => 'income_source_edit',
            ],
            [
                'id'    => 88,
                'key' => 'income_source_show',
                'title' => 'income_source_show',
            ],
            [
                'id'    => 89,
                'key' => 'income_source_delete',
                'title' => 'income_source_delete',
            ],
            [
                'id'    => 90,
                'key' => 'income_source_access',
                'title' => 'income_source_access',
            ],
            [
                'id'    => 91,
                'key' => 'advertiser_status_create',
                'title' => 'advertiser_status_create',
            ],
            [
                'id'    => 92,
                'key' => 'advertiser_status_edit',
                'title' => 'advertiser_status_edit',
            ],
            [
                'id'    => 93,
                'key' => 'advertiser_status_show',
                'title' => 'advertiser_status_show',
            ],
            [
                'id'    => 94,
                'key' => 'advertiser_status_delete',
                'title' => 'advertiser_status_delete',
            ],
            [
                'id'    => 95,
                'key' => 'advertiser_status_access',
                'title' => 'advertiser_status_access',
            ],
            [
                'id'    => 96,
                'key' => 'store_status_create',
                'title' => 'store_status_create',
            ],
            [
                'id'    => 97,
                'key' => 'store_status_edit',
                'title' => 'store_status_edit',
            ],
            [
                'id'    => 98,
                'key' => 'store_status_show',
                'title' => 'store_status_show',
            ],
            [
                'id'    => 99,
                'key' => 'store_status_delete',
                'title' => 'store_status_delete',
            ],
            [
                'id'    => 100,
                'key' => 'store_status_access',
                'title' => 'store_status_access',
            ],
            [
                'id'    => 101,
                'key' => 'advertiser_management_access',
                'title' => 'advertiser_management_access',
            ],
            [
                'id'    => 102,
                'key' => 'advertiser_create',
                'title' => 'advertiser_create',
            ],
            [
                'id'    => 103,
                'key' => 'advertiser_edit',
                'title' => 'advertiser_edit',
            ],
            [
                'id'    => 104,
                'key' => 'advertiser_show',
                'title' => 'advertiser_show',
            ],
            [
                'id'    => 105,
                'key' => 'advertiser_delete',
                'title' => 'advertiser_delete',
            ],
            [
                'id'    => 106,
                'key' => 'advertiser_access',
                'title' => 'advertiser_access',
            ],
            [
                'id'    => 107,
                'key' => 'store_create',
                'title' => 'store_create',
            ],
            [
                'id'    => 108,
                'key' => 'store_edit',
                'title' => 'store_edit',
            ],
            [
                'id'    => 109,
                'key' => 'store_show',
                'title' => 'store_show',
            ],
            [
                'id'    => 110,
                'key' => 'store_delete',
                'title' => 'store_delete',
            ],
            [
                'id'    => 111,
                'key' => 'store_access',
                'title' => 'store_access',
            ],
            [
                'id'    => 112,
                'key' => 'note_create',
                'title' => 'note_create',
            ],
            [
                'id'    => 113,
                'key' => 'note_edit',
                'title' => 'note_edit',
            ],
            [
                'id'    => 114,
                'key' => 'note_show',
                'title' => 'note_show',
            ],
            [
                'id'    => 115,
                'key' => 'note_delete',
                'title' => 'note_delete',
            ],
            [
                'id'    => 116,
                'key' => 'note_access',
                'title' => 'note_access',
            ],
            [
                'id'    => 117,
                'key' => 'document_create',
                'title' => 'document_create',
            ],
            [
                'id'    => 118,
                'key' => 'document_edit',
                'title' => 'document_edit',
            ],
            [
                'id'    => 119,
                'key' => 'document_show',
                'title' => '',
            ],
            [
                'id'    => 120,
                'key' => 'document_delete',
                'title' => 'document_show',
            ],
            [
                'id'    => 121,
                'key' => 'document_access',
                'title' => 'document_access',
            ],
            [
                'id'    => 122,
                'key' => 'transaction_create',
                'title' => 'transaction_create',
            ],
            [
                'id'    => 123,
                'key' => 'transaction_edit',
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 124,
                'key' => 'transaction_show',
                'title' => 'transaction_show',
            ],
            [
                'id'    => 125,
                'key' => 'transaction_delete',
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 126,
                'key' => 'transaction_access',
                'title' => 'transaction_access',
            ],
            [
                'id'    => 127,
                'key' => 'advertiser_report_create',
                'title' => 'advertiser_report_create',
            ],
            [
                'id'    => 128,
                'key' => 'advertiser_report_edit',
                'title' => 'advertiser_report_edit',
            ],
            [
                'id'    => 129,
                'key' => 'advertiser_report_show',
                'title' => 'advertiser_report_show',
            ],
            [
                'id'    => 130,
                'key' => 'advertiser_report_delete',
                'title' => 'advertiser_report_delete',
            ],
            [
                'id'    => 131,
                'key' => 'advertiser_report_access',
                'title' => 'advertiser_report_access',
            ],
            [
                'id'    => 147,
                'key' => 'affiliate_management_access',
                'title' => 'affiliate_management_access',
            ],
            [
                'id'    => 148,
                'key' => 'campaign_create',
                'title' => 'campaign_create',
            ],
            [
                'id'    => 149,
                'key' => 'campaign_edit',
                'title' => 'campaign_edit',
            ],
            [
                'id'    => 150,
                'key' => 'campaign_show',
                'title' => 'campaign_show',
            ],
            [
                'id'    => 151,
                'key' => 'campaign_delete',
                'title' => 'campaign_delete',
            ],
            [
                'id'    => 152,
                'key' => 'campaign_access',
                'title' => 'campaign_access',
            ],
            [
                'id'    => 153,
                'key' => 'affiliate_status_create',
                'title' => 'affiliate_status_create',
            ],
            [
                'id'    => 154,
                'key' => 'affiliate_status_edit',
                'title' => 'affiliate_status_edit',
            ],
            [
                'id'    => 155,
                'key' => 'affiliate_status_show',
                'title' => 'affiliate_status_show',
            ],
            [
                'id'    => 156,
                'key' => 'affiliate_status_delete',
                'title' => 'affiliate_status_delete',
            ],
            [
                'id'    => 157,
                'key' => 'affiliate_status_access',
                'title' => 'affiliate_status_access',
            ],
            [
                'id'    => 158,
                'key' => 'affiliate_create',
                'title' => 'affiliate_create',
            ],
            [
                'id'    => 159,
                'key' => 'affiliate_edit',
                'title' => 'affiliate_edit',
            ],
            [
                'id'    => 160,
                'key' => 'affiliate_show',
                'title' => 'affiliate_show',
            ],
            [
                'id'    => 161,
                'key' => 'affiliate_delete',
                'title' => 'affiliate_delete',
            ],
            [
                'id'    => 162,
                'key' => 'affiliate_access',
                'title' => 'affiliate_access',
            ],
            [
                'id'    => 163,
                'key' => 'preference_create',
                'title' => 'preference_create',
            ],
            [
                'id'    => 164,
                'key' => 'preference_edit',
                'title' => 'preference_edit',
            ],
            [
                'id'    => 165,
                'key' => 'preference_show',
                'title' => 'preference_show',
            ],
            [
                'id'    => 166,
                'key' => 'preference_delete',
                'title' => 'preference_delete',
            ],
            [
                'id'    => 167,
                'key' => 'preference_access',
                'title' => 'preference_access',
            ],
            [
                'id'    => 168,
                'key' => 'my_account_access',
                'title' => 'my_account_access',
            ],
            [
                'id'    => 169,
                'key' => 'profile_create',
                'title' => 'profile_create',
            ],
            [
                'id'    => 170,
                'key' => 'profile_edit',
                'title' => 'profile_edit',
            ],
            [
                'id'    => 171,
                'key' => 'profile_show',
                'title' => 'profile_show',
            ],
            [
                'id'    => 172,
                'key' => 'profile_delete',
                'title' => 'profile_delete',
            ],
            [
                'id'    => 173,
                'key' => 'profile_access',
                'title' => 'profile_access',
            ],
            [
                'id'    => 174,
                'key' => 'favorite_product_create',
                'title' => 'favorite_product_create',
            ],
            [
                'id'    => 175,
                'key' => 'favorite_product_edit',
                'title' => 'favorite_product_edit',
            ],
            [
                'id'    => 176,
                'key' => 'favorite_product_show',
                'title' => 'favorite_product_show',
            ],
            [
                'id'    => 177,
                'key' => 'favorite_product_delete',
                'title' => 'favorite_product_delete',
            ],
            [
                'id'    => 178,
                'key' => 'favorite_product_access',
                'title' => 'favorite_product_access',
            ],
            [
                'id'    => 179,
                'key' => 'search_history_create',
                'title' => 'search_history_create',
            ],
            [
                'id'    => 180,
                'key' => 'search_history_edit',
                'title' => 'search_history_edit',
            ],
            [
                'id'    => 181,
                'key' => 'search_history_show',
                'title' => 'search_history_show',
            ],
            [
                'id'    => 182,
                'key' => 'search_history_delete',
                'title' => 'search_history_delete',
            ],
            [
                'id'    => 183,
                'key' => 'search_history_access',
                'title' => 'search_history_access',
            ],
            [
                'id'    => 184,
                'key' => 'management_setting_access',
                'title' => 'management_setting_access',
            ],
            [
                'id'    => 185,
                'key' => 'affiliate_campaign_create',
                'title' => 'affiliate_campaign_create',
            ],
            [
                'id'    => 186,
                'key' => 'affiliate_campaign_edit',
                'title' => 'affiliate_campaign_edit',
            ],
            [
                'id'    => 187,
                'key' => 'affiliate_campaign_show',
                'title' => 'affiliate_campaign_show',
            ],
            [
                'id'    => 188,
                'key' => 'affiliate_campaign_delete',
                'title' => 'affiliate_campaign_delete',
            ],
            [
                'id'    => 189,
                'key' => 'affiliate_campaign_access',
                'title' => 'affiliate_campaign_access',
            ],
            [
                'id'    => 190,
                'key' => 'lead_create',
                'title' => 'lead_create',
            ],
            [
                'id'    => 200,
                'key' => 'lead_edit',
                'title' => 'lead_edit',
            ],
            [
                'id'    => 191,
                'key' => 'lead_show',
                'title' => 'lead_show',
            ],
            [
                'id'    => 192,
                'key' => 'lead_delete',
                'title' => 'lead_delete',
            ],
            [
                'id'    => 193,
                'key' => 'lead_access',
                'title' => 'lead_access',
            ],
            [
                'id'    => 194,
                'key' => 'sale_create',
                'title' => 'sale_create',
            ],
            [
                'id'    => 195,
                'key' => 'sale_edit',
                'title' => 'sale_edit',
            ],
            [
                'id'    => 196,
                'key' => 'sale_show',
                'title' => 'sale_show',
            ],
            [
                'id'    => 197,
                'key' => 'sale_delete',
                'title' => 'sale_delete',
            ],
            [
                'id'    => 198,
                'key' => 'sale_access',
                'title' => 'sale_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
