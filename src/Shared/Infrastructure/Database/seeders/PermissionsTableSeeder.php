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
                'key' => 'user_management_access',
                'title' => 'user management access',
            ],
            [
                'key' => 'permission_create',
                'title' => 'permission create',
            ],
            [
                'key' => 'permission_edit',
                'title' => 'permission edit',
            ],
            [
                'key' => 'permission_show',
                'title' => 'permission show',
            ],
            [
                'key' => 'permission_delete',
                'title' => 'permission delete',
            ],
            [
                'key' => 'permission_access',
                'title' => 'permission access',
            ],
            [
                'key' => 'role_create',
                'title' => 'role create',
            ],
            [
                'key' => 'role_edit',
                'title' => 'role edit',
            ],
            [
                'key' => 'role_show',
                'title' => 'role show',
            ],
            [
                'key' => 'role_delete',
                'title' => 'role delete',
            ],
            [
                'key' => 'role_access',
                'title' => 'role access',
            ],
            [
                'key' => 'user_create',
                'title' => 'user create',
            ],
            [
                'key' => 'user_edit',
                'title' => 'user edit',
            ],
            [
                'key' => 'user_show',
                'title' => 'user show',
            ],
            [
                'key' => 'user_delete',
                'title' => 'user delete',
            ],
            [
                'key' => 'user_access',
                'title' => 'user access',
            ],
            [
                'key' => 'user_alert_create',
                'title' => 'user alert create',
            ],
            [
                'key' => 'user_alert_show',
                'title' => 'user alert show',
            ],
            [
                'key' => 'user_alert_delete',
                'title' => 'user alert delete',
            ],
            [
                'key' => 'user_alert_access',
                'title' => 'user alert access',
            ],
            [
                'key' => 'api_user_create',
                'title' => 'api user create',
            ],
            [
                'key' => 'api_user_edit',
                'title' => 'api user edit',
            ],
            [
                'key' => 'api_user_show',
                'title' => 'api user show',
            ],
            [
                'key' => 'api_user_delete',
                'title' => 'api user delete',
            ],
            [
                'key' => 'api_user_access',
                'title' => 'api user access',
            ],
            [
                'key' => 'known_host_create',
                'title' => 'known host create',
            ],
            [
                'key' => 'known_host_edit',
                'title' => 'known host edit',
            ],
            [
                'key' => 'known_host_show',
                'title' => 'known host show',
            ],
            [
                'key' => 'known_host_delete',
                'title' => 'known host delete',
            ],
            [
                'key' => 'known_host_access',
                'title' => 'known host access',
            ],
            [
                'key' => 'audit_log_show',
                'title' => 'audit log show',
            ],
            [
                'key' => 'audit_log_access',
                'title' => 'audit log access',
            ],
            [
                'key' => 'profile_password_edit',
                'title' => 'profile password edit',
            ],


            [
                'key' => 'faq_category_create',
                'title' => 'faq category create',
            ],
            [
                'key' => 'faq_category_edit',
                'title' => 'faq category edit',
            ],
            [
                'key' => 'faq_category_show',
                'title' => 'faq category show',
            ],
            [
                'key' => 'faq_category_delete',
                'title' => 'faq category delete',
            ],
            [
                'key' => 'faq_category_access',
                'title' => 'faq category access',
            ],
            [
                'key' => 'faq_question_create',
                'title' => 'faq question create',
            ],
            [
                'key' => 'faq_question_edit',
                'title' => 'faq question edit',
            ],
            [
                'key' => 'faq_question_show',
                'title' => 'faq question show',
            ],
            [
                'key' => 'faq_question_delete',
                'title' => 'faq question delete',
            ],
            [
                'key' => 'faq_question_access',
                'title' => 'faq question access',
            ],
            [
                'key' => 'product_management_access',
                'title' => 'product management access',
            ],
            [
                'key' => 'product_category_create',
                'title' => 'product category create',
            ],
            [
                'key' => 'product_category_edit',
                'title' => 'product category edit',
            ],
            [
                'key' => 'product_category_show',
                'title' => 'product category show',
            ],
            [
                'key' => 'product_category_delete',
                'title' => 'product category delete',
            ],
            [
                'key' => 'product_category_access',
                'title' => 'product category access',
            ],
            [
                'key' => 'product_tag_create',
                'title' => 'product tag create',
            ],
            [
                'key' => 'product_tag_edit',
                'title' => 'product tag edit',
            ],
            [
                'key' => 'product_tag_show',
                'title' => 'product tag show',
            ],
            [
                'key' => 'product_tag_delete',
                'title' => 'product tag delete',
            ],
            [
                'key' => 'product_tag_access',
                'title' => 'product tag access',
            ],
            [
                'key' => 'product_create',
                'title' => 'product create',
            ],
            [
                'key' => 'product_edit',
                'title' => 'product edit',
            ],
            [
                'key' => 'product_show',
                'title' => 'product show',
            ],
            [
                'key' => 'product_delete',
                'title' => 'product delete',
            ],
            [
                'key' => 'product_access',
                'title' => 'product access',
            ],
            [
                'key' => 'content_management_access',
                'title' => 'content management access',
            ],
            [
                'key' => 'content_category_create',
                'title' => 'content category create',
            ],
            [
                'key' => 'content_category_edit',
                'title' => 'content category edit',
            ],
            [
                'key' => 'content_category_show',
                'title' => 'content category show',
            ],
            [
                'key' => 'content_category_delete',
                'title' => 'content category delete',
            ],
            [
                'key' => 'content_category_access',
                'title' => 'content category access',
            ],
            [
                'key' => 'content_tag_create',
                'title' => 'content tag create',
            ],
            [
                'key' => 'content_tag_edit',
                'title' => 'content tag edit',
            ],
            [
                'key' => 'content_tag_show',
                'title' => 'content tag show',
            ],
            [
                'key' => 'content_tag_delete',
                'title' => 'content tag delete',
            ],
            [
                'key' => 'content_tag_access',
                'title' => 'content tag access',
            ],
            [
                'key' => 'content_page_create',
                'title' => 'content page create',
            ],
            [
                'key' => 'content_page_edit',
                'title' => 'content page edit',
            ],
            [
                'key' => 'content_page_show',
                'title' => 'content page show',
            ],
            [
                'key' => 'content_page_delete',
                'title' => 'content page delete',
            ],
            [
                'key' => 'content_page_access',
                'title' => 'content page access',
            ],
            [
                'key' => 'advertiser_management_setting_access',
                'title' => 'advertiser management setting access',
            ],
            [
                'key' => 'currency_create',
                'title' => 'currency create',
            ],
            [
                'key' => 'currency_edit',
                'title' => 'currency edit',
            ],
            [
                'key' => 'currency_show',
                'title' => 'currency show',
            ],
            [
                'key' => 'currency_delete',
                'title' => 'currency delete',
            ],
            [
                'key' => 'currency_access',
                'title' => 'currency access',
            ],
            [
                'key' => 'transaction_type_create',
                'title' => 'transaction type create',
            ],
            [
                'key' => 'transaction_type_edit',
                'title' => 'transaction type edit',
            ],
            [
                'key' => 'transaction_type_show',
                'title' => 'transaction type show',
            ],
            [
                'key' => 'transaction_type_delete',
                'title' => 'transaction type delete',
            ],
            [
                'key' => 'transaction_type_access',
                'title' => 'transaction type access',
            ],
            [
                'key' => 'income_source_create',
                'title' => 'income source create',
            ],
            [
                'key' => 'income_source_edit',
                'title' => 'income source edit',
            ],
            [
                'key' => 'income_source_show',
                'title' => 'income source show',
            ],
            [
                'key' => 'income_source_delete',
                'title' => 'income source delete',
            ],
            [
                'key' => 'income_source_access',
                'title' => 'income source access',
            ],
            [
                'key' => 'advertiser_status_create',
                'title' => 'advertiser status create',
            ],
            [
                'key' => 'advertiser_status_edit',
                'title' => 'advertiser status edit',
            ],
            [
                'key' => 'advertiser_status_show',
                'title' => 'advertiser status show',
            ],
            [
                'key' => 'advertiser_status_delete',
                'title' => 'advertiser status delete',
            ],
            [
                'key' => 'advertiser_status_access',
                'title' => 'advertiser status access',
            ],
            [
                'key' => 'store_status_create',
                'title' => 'store status create',
            ],
            [
                'key' => 'store_status_edit',
                'title' => 'store status edit',
            ],
            [
                'key' => 'store_status_show',
                'title' => 'store status show',
            ],
            [
                'key' => 'store_status_delete',
                'title' => 'store status delete',
            ],
            [
                'key' => 'store_status_access',
                'title' => 'store status access',
            ],
            [
                'key' => 'advertiser_management_access',
                'title' => 'advertiser management access',
            ],
            [
                'key' => 'advertiser_create',
                'title' => 'advertiser create',
            ],
            [
                'key' => 'advertiser_edit',
                'title' => 'advertiser edit',
            ],
            [
                'key' => 'advertiser_show',
                'title' => 'advertiser show',
            ],
            [
                'key' => 'advertiser_delete',
                'title' => 'advertiser delete',
            ],
            [
                'key' => 'advertiser_access',
                'title' => 'advertiser access',
            ],
            [
                'key' => 'store_create',
                'title' => 'store create',
            ],
            [
                'key' => 'store_edit',
                'title' => 'store edit',
            ],
            [
                'key' => 'store_show',
                'title' => 'store show',
            ],
            [
                'key' => 'store_delete',
                'title' => 'store delete',
            ],
            [
                'key' => 'store_access',
                'title' => 'store access',
            ],
            [
                'key' => 'note_create',
                'title' => 'note create',
            ],
            [
                'key' => 'note_edit',
                'title' => 'note edit',
            ],
            [
                'key' => 'note_show',
                'title' => 'note show',
            ],
            [
                'key' => 'note_delete',
                'title' => 'note delete',
            ],
            [
                'key' => 'note_access',
                'title' => 'note access',
            ],
            [
                'key' => 'document_create',
                'title' => 'document create',
            ],
            [
                'key' => 'document_edit',
                'title' => 'document edit',
            ],
            [
                'key' => 'document_show',
                'title' => 'document show',
            ],
            [
                'key' => 'document_delete',
                'title' => 'document delete',
            ],
            [
                'key' => 'document_access',
                'title' => 'document access',
            ],
            [
                'key' => 'transaction_create',
                'title' => 'transaction create',
            ],
            [
                'key' => 'transaction_edit',
                'title' => 'transaction edit',
            ],
            [
                'key' => 'transaction_show',
                'title' => 'transaction show',
            ],
            [
                'key' => 'transaction_delete',
                'title' => 'transaction delete',
            ],
            [
                'key' => 'transaction_access',
                'title' => 'transaction access',
            ],
            [
                'key' => 'advertiser_report_create',
                'title' => 'advertiser report create',
            ],
            [
                'key' => 'advertiser_report_edit',
                'title' => 'advertiser report edit',
            ],
            [
                'key' => 'advertiser_report_show',
                'title' => 'advertiser report show',
            ],
            [
                'key' => 'advertiser_report_delete',
                'title' => 'advertiser report delete',
            ],
            [
                'key' => 'advertiser_report_access',
                'title' => 'advertiser report access',
            ],
            [
                'key' => 'affiliate_management_access',
                'title' => 'affiliate management access',
            ],
            [
                'key' => 'campaign_create',
                'title' => 'campaign create',
            ],
            [
                'key' => 'campaign_edit',
                'title' => 'campaign edit',
            ],
            [
                'key' => 'campaign_show',
                'title' => 'campaign show',
            ],
            [
                'key' => 'campaign_delete',
                'title' => 'campaign delete',
            ],
            [
                'key' => 'campaign_access',
                'title' => 'campaign access',
            ],
            [
                'key' => 'affiliate_status_create',
                'title' => 'affiliate status create',
            ],
            [
                'key' => 'affiliate_status_edit',
                'title' => 'affiliate status edit',
            ],
            [
                'key' => 'affiliate_status_show',
                'title' => 'affiliate status show',
            ],
            [
                'key' => 'affiliate_status_delete',
                'title' => 'affiliate status delete',
            ],
            [
                'key' => 'affiliate_status_access',
                'title' => 'affiliate status access',
            ],
            [
                'key' => 'affiliate_create',
                'title' => 'affiliate create',
            ],
            [
                'key' => 'affiliate_edit',
                'title' => 'affiliate edit',
            ],
            [
                'key' => 'affiliate_show',
                'title' => 'affiliate show',
            ],
            [
                'key' => 'affiliate_delete',
                'title' => 'affiliate delete',
            ],
            [
                'key' => 'affiliate_access',
                'title' => 'affiliate access',
            ],
            [
                'key' => 'preference_create',
                'title' => 'preference create',
            ],
            [
                'key' => 'preference_edit',
                'title' => 'preference edit',
            ],
            [
                'key' => 'preference_show',
                'title' => 'preference show',
            ],
            [
                'key' => 'preference_delete',
                'title' => 'preference delete',
            ],
            [
                'key' => 'preference_access',
                'title' => 'preference access',
            ],
            [
                'key' => 'my_account_access',
                'title' => 'my account access',
            ],
            [
                'key' => 'profile_create',
                'title' => 'profile create',
            ],
            [
                'key' => 'profile_edit',
                'title' => 'profile edit',
            ],
            [
                'key' => 'profile_show',
                'title' => 'profile show',
            ],
            [
                'key' => 'profile_delete',
                'title' => 'profile delete',
            ],
            [
                'key' => 'profile_access',
                'title' => 'profile access',
            ],
            [
                'key' => 'favorite_product_create',
                'title' => 'favorite product create',
            ],
            [
                'key' => 'favorite_product_edit',
                'title' => 'favorite product edit',
            ],
            [
                'key' => 'favorite_product_show',
                'title' => 'favorite product show',
            ],
            [
                'key' => 'favorite_product_delete',
                'title' => 'favorite product delete',
            ],
            [
                'key' => 'favorite_product_access',
                'title' => 'favorite product access',
            ],
            [
                'key' => 'search_history_create',
                'title' => 'search history create',
            ],
            [
                'key' => 'search_history_edit',
                'title' => 'search history edit',
            ],
            [
                'key' => 'search_history_show',
                'title' => 'search history show',
            ],
            [
                'key' => 'search_history_delete',
                'title' => 'search history delete',
            ],
            [
                'key' => 'search_history_access',
                'title' => 'search history access',
            ],
            [
                'key' => 'management_setting_access',
                'title' => 'management setting access',
            ],
            [
                'key' => 'affiliate_campaign_create',
                'title' => 'affiliate campaign create',
            ],
            [
                'key' => 'affiliate_campaign_edit',
                'title' => 'affiliate campaign edit',
            ],
            [
                'key' => 'affiliate_campaign_show',
                'title' => 'affiliate campaign show',
            ],
            [
                'key' => 'affiliate_campaign_delete',
                'title' => 'affiliate campaign delete',
            ],
            [
                'key' => 'affiliate_campaign_access',
                'title' => 'affiliate campaign access',
            ],
            [
                'key' => 'lead_create',
                'title' => 'lead create',
            ],
            [
                'key' => 'lead_edit',
                'title' => 'lead edit',
            ],
            [
                'key' => 'lead_show',
                'title' => 'lead show',
            ],
            [
                'key' => 'lead_delete',
                'title' => 'lead delete',
            ],
            [
                'key' => 'lead_access',
                'title' => 'lead access',
            ],
            [
                'key' => 'sale_create',
                'title' => 'sale create',
            ],
            [
                'key' => 'sale_edit',
                'title' => 'sale edit',
            ],
            [
                'key' => 'sale_show',
                'title' => 'sale show',
            ],
            [
                'key' => 'sale_delete',
                'title' => 'sale delete',
            ],
            [
                'key' => 'sale_access',
                'title' => 'sale access',
            ],
        ];

        Permission::insert($permissions);
    }
}
