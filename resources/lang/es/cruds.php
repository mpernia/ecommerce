<?php

return [
    'userManagement' => [
        'title'          => 'Gestionar usuarios',
        'title_singular' => 'Gestionar usuarios',
    ],
    'permission' => [
        'title'          => 'Permisos',
        'title_singular' => 'Permiso',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'key'               => 'Key',
            'key_helper'        => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Rol',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Usuarios',
        'title_singular' => 'Usuario',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'name'                         => 'Name',
            'name_helper'                  => ' ',
            'email'                        => 'Email',
            'email_helper'                 => ' ',
            'email_verified_at'            => 'Email verified at',
            'email_verified_at_helper'     => ' ',
            'password'                     => 'Password',
            'password_helper'              => ' ',
            'roles'                        => 'Roles',
            'roles_helper'                 => ' ',
            'remember_token'               => 'Remember Token',
            'remember_token_helper'        => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'approved'                     => 'Approved',
            'approved_helper'              => ' ',
            'verified'                     => 'Verified',
            'verified_helper'              => ' ',
            'verified_at'                  => 'Verified at',
            'verified_at_helper'           => ' ',
            'verification_token'           => 'Verification token',
            'verification_token_helper'    => ' ',
            'two_factor'                   => 'Two-Factor Auth',
            'two_factor_helper'            => ' ',
            'two_factor_code'              => 'Two-factor code',
            'two_factor_code_helper'       => ' ',
            'two_factor_expires_at'        => 'Two-factor expires at',
            'two_factor_expires_at_helper' => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'apiUser' => [
        'title'          => 'Api User',
        'title_singular' => 'Api User',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'email'                => 'Email',
            'email_helper'         => ' ',
            'password'             => 'Password',
            'password_helper'      => ' ',
            'roles'                => 'Roles',
            'roles_helper'         => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'slug'                 => 'Slug',
            'slug_helper'          => ' ',
            'is_active'            => 'Is Active',
            'is_active_helper'     => ' ',
            'created_by'           => 'Created By',
            'created_by_helper'    => ' ',
            'last_login_at'        => 'Last Login At',
            'last_login_at_helper' => ' ',
        ],
    ],
    'knownHost' => [
        'title'          => 'Known Host',
        'title_singular' => 'Known Host',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'ip_address'        => 'Ip Address',
            'ip_address_helper' => ' ',
            'domain'            => 'Domain',
            'domain_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'faqManagement' => [
        'title'          => 'FAQ Management',
        'title_singular' => 'FAQ Management',
    ],
    'faqCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'order'             => 'Order',
            'order_helper'      => ' ',
        ],
    ],
    'faqQuestion' => [
        'title'          => 'Questions',
        'title_singular' => 'Question',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'question'          => 'Question',
            'question_helper'   => ' ',
            'answer'            => 'Answer',
            'answer_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'order'             => 'Order',
            'order_helper'      => ' ',
        ],
    ],
    'productManagement' => [
        'title'          => 'Product Management',
        'title_singular' => 'Product Management',
    ],
    'productCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'productTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'product' => [
        'title'          => 'Products',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'price'                => 'Price',
            'price_helper'         => ' ',
            'category'             => 'Categories',
            'category_helper'      => ' ',
            'tag'                  => 'Tags',
            'tag_helper'           => ' ',
            'photo'                => 'Photo',
            'photo_helper'         => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted At',
            'deleted_at_helper'    => ' ',
            'reference'            => 'Reference',
            'reference_helper'     => ' ',
            'carousel'             => 'Carousel',
            'carousel_helper'      => ' ',
            'is_active'            => 'Is Active',
            'is_active_helper'     => ' ',
            'availability'         => 'Availability',
            'availability_helper'  => ' ',
            'brand'                => 'Brand',
            'brand_helper'         => ' ',
            'created_by'           => 'Created By',
            'created_by_helper'    => ' ',
            'specification'        => 'Specification',
            'specification_helper' => ' ',
        ],
    ],
    'contentManagement' => [
        'title'          => 'Content management',
        'title_singular' => 'Content management',
    ],
    'contentCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'slug'               => 'Slug',
            'slug_helper'        => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'icon'               => 'Icon',
            'icon_helper'        => ' ',
            'parent'             => 'Parent',
            'parent_helper'      => ' ',
        ],
    ],
    'contentTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentPage' => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'category'              => 'Categories',
            'category_helper'       => ' ',
            'tag'                   => 'Tags',
            'tag_helper'            => ' ',
            'page_text'             => 'Full Text',
            'page_text_helper'      => ' ',
            'excerpt'               => 'Excerpt',
            'excerpt_helper'        => ' ',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated At',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted At',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'advertiserManagementSetting' => [
        'title'          => 'Config Proyectos',
        'title_singular' => 'Config Proyectos',
    ],
    'currency' => [
        'title'          => 'Divisas',
        'title_singular' => 'Divisa',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'code'                 => 'Currency code',
            'code_helper'          => ' ',
            'main_currency'        => 'Main currency',
            'main_currency_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted At',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'transactionType' => [
        'title'          => 'Tipos de transacciones',
        'title_singular' => 'Tipo de transacción',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'incomeSource' => [
        'title'          => 'Fuentes de ingresos',
        'title_singular' => 'Fuente de ingresos',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'fee_percent'        => 'Fee Percent',
            'fee_percent_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'advertiserStatus' => [
        'title'          => 'Estados del Anunciante',
        'title_singular' => 'Estado del Anunciante',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'storeStatus' => [
        'title'          => 'Estados de la tienda',
        'title_singular' => 'Estado de la tienda',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'advertiserManagement' => [
        'title'          => 'Gestión de Proyectos',
        'title_singular' => 'Gestión de Proyectos',
    ],
    'advertiser' => [
        'title'          => 'Anunciantes',
        'title_singular' => 'Anunciante',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'first_name'        => 'First name',
            'first_name_helper' => ' ',
            'last_name'         => 'Last name',
            'last_name_helper'  => ' ',
            'company'           => 'Company',
            'company_helper'    => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'phone'             => 'Phone',
            'phone_helper'      => ' ',
            'website'           => 'Website',
            'website_helper'    => ' ',
            'skype'             => 'Skype',
            'skype_helper'      => ' ',
            'country'           => 'Country',
            'country_helper'    => ' ',
            'status'            => 'Advertiser Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'store' => [
        'title'          => 'Tiendas',
        'title_singular' => 'Tienda',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'advertiser'             => 'Advertiser',
            'advertiser_helper'      => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'start_date'         => 'Start Date',
            'start_date_helper'  => ' ',
            'budget'             => 'Budget',
            'budget_helper'      => ' ',
            'status'             => 'Store Status',
            'status_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
            'created_by'         => 'Created By',
            'created_by_helper'  => ' ',
        ],
    ],
    'note' => [
        'title'          => 'Notas',
        'title_singular' => 'Nota',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'store'           => 'store',
            'store_helper'    => ' ',
            'note_text'         => 'Note Text',
            'note_text_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'document' => [
        'title'          => 'Documentos',
        'title_singular' => 'Documento',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'store'              => 'store',
            'store_helper'       => ' ',
            'document_file'        => 'File',
            'document_file_helper' => ' ',
            'name'                 => 'Document Name',
            'name_helper'          => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted At',
            'deleted_at_helper'    => ' ',
            'created_by'           => 'Created By',
            'created_by_helper'    => ' ',
        ],
    ],
    'transaction' => [
        'title'          => 'Servicios',
        'title_singular' => 'Servicio',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'store'                 => 'store',
            'store_helper'          => ' ',
            'transaction_type'        => 'Transaction Type',
            'transaction_type_helper' => ' ',
            'income_source'           => 'Income Source',
            'income_source_helper'    => ' ',
            'amount'                  => 'Amount',
            'amount_helper'           => ' ',
            'currency'                => 'Currency',
            'currency_helper'         => ' ',
            'transaction_date'        => 'Transaction Date',
            'transaction_date_helper' => ' ',
            'name'                    => 'Name',
            'name_helper'             => ' ',
            'description'             => 'Description',
            'description_helper'      => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated At',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted At',
            'deleted_at_helper'       => ' ',
            'created_by'              => 'Created By',
            'created_by_helper'       => ' ',
        ],
    ],
    'advertiserReport' => [
        'title'          => 'Informes',
        'title_singular' => 'Informe',
        'reports'        => [
            'month'       => 'Month',
            'income'      => 'Income',
            'expenses'    => 'Expenses',
            'fees'        => 'Fees',
            'total'       => 'Total',
            'allStores' => 'All stores',
        ],
    ],
    'contactManagement' => [
        'title'          => 'Contact management',
        'title_singular' => 'Contact management',
    ],
    'contactCompany' => [
        'title'          => 'Companies',
        'title_singular' => 'Company',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'company_name'           => 'Company name',
            'company_name_helper'    => ' ',
            'company_address'        => 'Address',
            'company_address_helper' => ' ',
            'company_website'        => 'Website',
            'company_website_helper' => ' ',
            'company_email'          => 'Email',
            'company_email_helper'   => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => ' ',
            'created_by'             => 'Created By',
            'created_by_helper'      => ' ',
        ],
    ],
    'contactContact' => [
        'title'          => 'Contacts',
        'title_singular' => 'Contact',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'company'                   => 'Company',
            'company_helper'            => ' ',
            'contact_first_name'        => 'First name',
            'contact_first_name_helper' => ' ',
            'contact_last_name'         => 'Last name',
            'contact_last_name_helper'  => ' ',
            'contact_phone_1'           => 'Phone 1',
            'contact_phone_1_helper'    => ' ',
            'contact_phone_2'           => 'Phone 2',
            'contact_phone_2_helper'    => ' ',
            'contact_email'             => 'Email',
            'contact_email_helper'      => ' ',
            'contact_skype'             => 'Skype',
            'contact_skype_helper'      => ' ',
            'contact_address'           => 'Address',
            'contact_address_helper'    => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated At',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted At',
            'deleted_at_helper'         => ' ',
        ],
    ],
    'affiliateManagement' => [
        'title'          => 'Affiliate Management',
        'title_singular' => 'Affiliate Management',
    ],
    'campaign' => [
        'title'          => 'Campaign',
        'title_singular' => 'Campaign',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'url'                         => 'Url',
            'url_helper'                  => ' ',
            'utm_source'                  => 'Utm Source',
            'utm_source_helper'           => ' ',
            'utm_medium'                  => 'Utm Medium',
            'utm_medium_helper'           => ' ',
            'utm_campaign'                => 'Utm Campaign',
            'utm_campaign_helper'         => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'created_by'                  => 'Created By',
            'created_by_helper'           => ' ',
            'name'                        => 'Name',
            'name_helper'                 => ' ',
            'is_active'                   => 'Is Active',
            'is_active_helper'            => ' ',
            'utm_term'                    => 'Utm Term',
            'utm_term_helper'             => ' ',
            'utm_content'                 => 'Utm Content',
            'utm_content_helper'          => ' ',
            'pay_per_clic'                => 'Pay Per Clic',
            'pay_per_clic_helper'         => ' ',
            'cost_per_lead'               => 'Cost Per Lead',
            'cost_per_lead_helper'        => ' ',
            'cost_per_acquisition'        => 'Cost Per Acquisition',
            'cost_per_acquisition_helper' => ' ',
            'cost_per_clic'               => 'Cost Per Clic',
            'cost_per_clic_helper'        => ' ',
            'persent_per_sale'            => 'Persent Per Sale',
            'persent_per_sale_helper'     => ' ',
            'product'                     => 'Product',
            'product_helper'              => ' ',
        ],
    ],
    'affiliateStatus' => [
        'title'          => 'Affiliate Statuses',
        'title_singular' => 'Affiliate Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'affiliate' => [
        'title'          => 'Affiliate',
        'title_singular' => 'Affiliate',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'start_date'         => 'Start Date',
            'start_date_helper'  => ' ',
            'budget'             => 'Budget',
            'budget_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
            'created_by'         => 'Created By',
            'created_by_helper'  => ' ',
            'advertiser'             => 'Advertiser',
            'advertiser_helper'      => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
        ],
    ],
    'preference' => [
        'title'          => 'Preference',
        'title_singular' => 'Preference',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'sort_product_by'        => 'Sort Product By',
            'sort_product_by_helper' => ' ',
            'notify_method'          => 'Notify Method',
            'notify_method_helper'   => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'created_by'             => 'Created By',
            'created_by_helper'      => ' ',
        ],
    ],
    'myAccount' => [
        'title'          => 'My Account',
        'title_singular' => 'My Account',
    ],
    'profile' => [
        'title'          => 'Profile',
        'title_singular' => 'Profile',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'first_surname'         => 'First Surname',
            'first_surname_helper'  => ' ',
            'second_surname'        => 'Second Surname',
            'second_surname_helper' => ' ',
            'birthday'              => 'Birthday',
            'birthday_helper'       => ' ',
            'mobile'                => 'Mobile',
            'mobile_helper'         => ' ',
            'avatar'                => 'Avatar',
            'avatar_helper'         => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'created_by'            => 'Created By',
            'created_by_helper'     => ' ',
        ],
    ],
    'favoriteProduct' => [
        'title'          => 'Favorite Product',
        'title_singular' => 'Favorite Product',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'is_active'           => 'Is Active',
            'is_active_helper'    => ' ',
            'price'               => 'Price',
            'price_helper'        => ' ',
            'price_target'        => 'Price Target',
            'price_target_helper' => ' ',
            'product'             => 'Product',
            'product_helper'      => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'created_by'          => 'Created By',
            'created_by_helper'   => ' ',
        ],
    ],
    'searchHistory' => [
        'title'          => 'Search History',
        'title_singular' => 'Search History',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'is_active'           => 'Is Active',
            'is_active_helper'    => ' ',
            'counter'             => 'Counter',
            'counter_helper'      => ' ',
            'last_date_at'        => 'Last Date At',
            'last_date_at_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'created_by'          => 'Created By',
            'created_by_helper'   => ' ',
        ],
    ],
    'managementSetting' => [
        'title'          => 'Management Settings',
        'title_singular' => 'Management Setting',
    ],
    'affiliateCampaign' => [
        'title'          => 'Affiliate Campaign',
        'title_singular' => 'Affiliate Campaign',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'is_active'         => 'Is Active',
            'is_active_helper'  => ' ',
            'affiliate'         => 'Affiliate',
            'affiliate_helper'  => ' ',
            'campaign'          => 'Campaign',
            'campaign_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'lead' => [
        'title'          => 'Lead',
        'title_singular' => 'Lead',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'affiliate_campaign'        => 'Affiliate Campaign',
            'affiliate_campaign_helper' => ' ',
            'tracking'                  => 'Tracking',
            'tracking_helper'           => ' ',
            'mobile'                    => 'Mobile',
            'mobile_helper'             => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
        ],
    ],
    'sale' => [
        'title'          => 'Sale',
        'title_singular' => 'Sale',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'advertiser'            => 'Advertiser',
            'advertiser_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'tracking'          => 'Tracking',
            'tracking_helper'   => ' ',
        ],
    ],

];
