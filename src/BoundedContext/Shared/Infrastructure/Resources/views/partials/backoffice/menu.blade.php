<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('setting.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("backoffice.home") ? "active" : "" }}" href="{{ route("backoffice.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("backoffice/permissions*") ? "menu-open" : "" }} {{ request()->is("backoffice/roles*") ? "menu-open" : "" }} {{ request()->is("backoffice/users*") ? "menu-open" : "" }} {{ request()->is("backoffice/user-alerts*") ? "menu-open" : "" }} {{ request()->is("backoffice/api-users*") ? "menu-open" : "" }} {{ request()->is("backoffice/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("backoffice/permissions*") ? "active" : "" }} {{ request()->is("backoffice/roles*") ? "active" : "" }} {{ request()->is("backoffice/users*") ? "active" : "" }} {{ request()->is("backoffice/user-alerts*") ? "active" : "" }} {{ request()->is("backoffice/api-users*") ? "active" : "" }} {{ request()->is("backoffice/audit-logs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.permissions.index") }}" class="nav-link {{ request()->is("backoffice/permissions") || request()->is("backoffice/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.roles.index") }}" class="nav-link {{ request()->is("backoffice/roles") || request()->is("backoffice/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.users.index") }}" class="nav-link {{ request()->is("backoffice/users") || request()->is("backoffice/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_alert_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.user-alerts.index") }}" class="nav-link {{ request()->is("backoffice/user-alerts") || request()->is("backoffice/user-alerts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bell">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userAlert.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('api_user_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.api-users.index") }}" class="nav-link {{ request()->is("backoffice/api-users") || request()->is("backoffice/api-users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-cog">

                                        </i>
                                        <p>
                                            {{ trans('cruds.apiUser.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.audit-logs.index") }}" class="nav-link {{ request()->is("backoffice/audit-logs") || request()->is("backoffice/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('known_host_access')
                    <li class="nav-item">
                        <a href="{{ route("backoffice.known-hosts.index") }}" class="nav-link {{ request()->is("backoffice/known-hosts") || request()->is("backoffice/known-hosts/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-globe">

                            </i>
                            <p>
                                {{ trans('cruds.knownHost.title') }}
                            </p>
                        </a>
                    </li>
                @endcan




                @can('management_setting_access')
                    <li class="nav-item has-treeview {{ request()->is("backoffice/currencies*") ? "menu-open" : "" }} {{ request()->is("backoffice/transaction-types*") ? "menu-open" : "" }} {{ request()->is("backoffice/income-sources*") ? "menu-open" : "" }} {{ request()->is("backoffice/advertiser-statuses*") ? "menu-open" : "" }} {{ request()->is("backoffice/project-statuses*") ? "menu-open" : "" }} {{ request()->is("backoffice/affiliate-statuses*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("backoffice/currencies*") ? "active" : "" }} {{ request()->is("backoffice/transaction-types*") ? "active" : "" }} {{ request()->is("backoffice/income-sources*") ? "active" : "" }} {{ request()->is("backoffice/advertiser-statuses*") ? "active" : "" }} {{ request()->is("backoffice/project-statuses*") ? "active" : "" }} {{ request()->is("backoffice/affiliate-statuses*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.managementSetting.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('currency_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.currencies.index") }}" class="nav-link {{ request()->is("backoffice/currencies") || request()->is("backoffice/currencies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-money-bill">

                                        </i>
                                        <p>
                                            {{ trans('cruds.currency.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('transaction_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.transaction-types.index") }}" class="nav-link {{ request()->is("backoffice/transaction-types") || request()->is("backoffice/transaction-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-money-check">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transactionType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('income_source_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.income-sources.index") }}" class="nav-link {{ request()->is("backoffice/income-sources") || request()->is("backoffice/income-sources/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-database">

                                        </i>
                                        <p>
                                            {{ trans('cruds.incomeSource.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('advertiser_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.advertiser-statuses.index") }}" class="nav-link {{ request()->is("backoffice/advertiser-statuses") || request()->is("backoffice/advertiser-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.advertiserStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.project-statuses.index") }}" class="nav-link {{ request()->is("backoffice/project-statuses") || request()->is("backoffice/project-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.projectStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('affiliate_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.affiliate-statuses.index") }}" class="nav-link {{ request()->is("backoffice/affiliate-statuses") || request()->is("backoffice/affiliate-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.affiliateStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('product_management_access')
                    <li class="nav-item has-treeview {{ request()->is("backoffice/product-categories*") ? "menu-open" : "" }} {{ request()->is("backoffice/product-tags*") ? "menu-open" : "" }} {{ request()->is("backoffice/products*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("backoffice/product-categories*") ? "active" : "" }} {{ request()->is("backoffice/product-tags*") ? "active" : "" }} {{ request()->is("backoffice/products*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-shopping-cart">

                            </i>
                            <p>
                                {{ trans('cruds.productManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('product_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.product-categories.index") }}" class="nav-link {{ request()->is("backoffice/product-categories") || request()->is("backoffice/product-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.product-tags.index") }}" class="nav-link {{ request()->is("backoffice/product-tags") || request()->is("backoffice/product-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.products.index") }}" class="nav-link {{ request()->is("backoffice/products") || request()->is("backoffice/products/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shopping-cart">

                                        </i>
                                        <p>
                                            {{ trans('cruds.product.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('content_management_access')
                    <li class="nav-item has-treeview {{ request()->is("backoffice/content-categories*") ? "menu-open" : "" }} {{ request()->is("backoffice/content-tags*") ? "menu-open" : "" }} {{ request()->is("backoffice/content-pages*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("backoffice/content-categories*") ? "active" : "" }} {{ request()->is("backoffice/content-tags*") ? "active" : "" }} {{ request()->is("backoffice/content-pages*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-book">

                            </i>
                            <p>
                                {{ trans('cruds.contentManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('content_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.content-categories.index") }}" class="nav-link {{ request()->is("backoffice/content-categories") || request()->is("backoffice/content-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.content-tags.index") }}" class="nav-link {{ request()->is("backoffice/content-tags") || request()->is("backoffice/content-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tags">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_page_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.content-pages.index") }}" class="nav-link {{ request()->is("backoffice/content-pages") || request()->is("backoffice/content-pages/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentPage.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('faq_management_access')
                    <li class="nav-item has-treeview {{ request()->is("backoffice/faq-categories*") ? "menu-open" : "" }} {{ request()->is("backoffice/faq-questions*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("backoffice/faq-categories*") ? "active" : "" }} {{ request()->is("backoffice/faq-questions*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-question">

                            </i>
                            <p>
                                {{ trans('cruds.faqManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('faq_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.faq-categories.index") }}" class="nav-link {{ request()->is("backoffice/faq-categories") || request()->is("backoffice/faq-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.faqCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('faq_question_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.faq-questions.index") }}" class="nav-link {{ request()->is("backoffice/faq-questions") || request()->is("backoffice/faq-questions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-question">

                                        </i>
                                        <p>
                                            {{ trans('cruds.faqQuestion.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('advertiser_management_access')
                    <li class="nav-item has-treeview {{ request()->is("backoffice/advertisers*") ? "menu-open" : "" }} {{ request()->is("backoffice/projects*") ? "menu-open" : "" }} {{ request()->is("backoffice/notes*") ? "menu-open" : "" }} {{ request()->is("backoffice/documents*") ? "menu-open" : "" }} {{ request()->is("backoffice/transactions*") ? "menu-open" : "" }} {{ request()->is("backoffice/advertiser-reports*") ? "menu-open" : "" }} {{ request()->is("backoffice/campaigns*") ? "menu-open" : "" }} {{ request()->is("backoffice/sales*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("backoffice/advertisers*") ? "active" : "" }} {{ request()->is("backoffice/projects*") ? "active" : "" }} {{ request()->is("backoffice/notes*") ? "active" : "" }} {{ request()->is("backoffice/documents*") ? "active" : "" }} {{ request()->is("backoffice/transactions*") ? "active" : "" }} {{ request()->is("backoffice/advertiser-reports*") ? "active" : "" }} {{ request()->is("backoffice/campaigns*") ? "active" : "" }} {{ request()->is("backoffice/sales*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-briefcase">

                            </i>
                            <p>
                                {{ trans('cruds.advertiserManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('advertiser_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.advertisers.index") }}" class="nav-link {{ request()->is("backoffice/advertisers") || request()->is("backoffice/advertisers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-plus">

                                        </i>
                                        <p>
                                            {{ trans('cruds.advertiser.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.projects.index") }}" class="nav-link {{ request()->is("backoffice/projects") || request()->is("backoffice/projects/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-store">

                                        </i>
                                        <p>
                                            {{ trans('cruds.project.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('note_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.notes.index") }}" class="nav-link {{ request()->is("backoffice/notes") || request()->is("backoffice/notes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-sticky-note">

                                        </i>
                                        <p>
                                            {{ trans('cruds.note.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('document_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.documents.index") }}" class="nav-link {{ request()->is("backoffice/documents") || request()->is("backoffice/documents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.document.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('transaction_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.transactions.index") }}" class="nav-link {{ request()->is("backoffice/transactions") || request()->is("backoffice/transactions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-credit-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transaction.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('advertiser_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.advertiser-reports.index") }}" class="nav-link {{ request()->is("backoffice/advertiser-reports") || request()->is("backoffice/advertiser-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-chart-line">

                                        </i>
                                        <p>
                                            {{ trans('cruds.advertiserReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('campaign_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.campaigns.index") }}" class="nav-link {{ request()->is("backoffice/campaigns") || request()->is("backoffice/campaigns/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.campaign.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('sale_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.sales.index") }}" class="nav-link {{ request()->is("backoffice/sales") || request()->is("backoffice/sales/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-dollar-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.sale.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('affiliate_management_access')
                    <li class="nav-item has-treeview {{ request()->is("backoffice/affiliates*") ? "menu-open" : "" }} {{ request()->is("backoffice/affiliate-campaigns*") ? "menu-open" : "" }} {{ request()->is("backoffice/leads*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("backoffice/affiliates*") ? "active" : "" }} {{ request()->is("backoffice/affiliate-campaigns*") ? "active" : "" }} {{ request()->is("backoffice/leads*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-bullhorn">

                            </i>
                            <p>
                                {{ trans('cruds.affiliateManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('affiliate_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.affiliates.index") }}" class="nav-link {{ request()->is("backoffice/affiliates") || request()->is("backoffice/affiliates/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.affiliate.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('affiliate_campaign_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.affiliate-campaigns.index") }}" class="nav-link {{ request()->is("backoffice/affiliate-campaigns") || request()->is("backoffice/affiliate-campaigns/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.affiliateCampaign.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('lead_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.leads.index") }}" class="nav-link {{ request()->is("backoffice/leads") || request()->is("backoffice/leads/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-boxes">

                                        </i>
                                        <p>
                                            {{ trans('cruds.lead.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('contact_management_access')
                    <li class="nav-item has-treeview {{ request()->is("backoffice/contact-companies*") ? "menu-open" : "" }} {{ request()->is("backoffice/contact-contacts*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("backoffice/contact-companies*") ? "active" : "" }} {{ request()->is("backoffice/contact-contacts*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-phone-square">

                            </i>
                            <p>
                                {{ trans('cruds.contactManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('contact_company_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.contact-companies.index") }}" class="nav-link {{ request()->is("backoffice/contact-companies") || request()->is("backoffice/contact-companies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-building">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contactCompany.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('contact_contact_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.contact-contacts.index") }}" class="nav-link {{ request()->is("backoffice/contact-contacts") || request()->is("backoffice/contact-contacts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-plus">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contactContact.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('my_account_access')
                    <li class="nav-item has-treeview {{ request()->is("backoffice/preferences*") ? "menu-open" : "" }} {{ request()->is("backoffice/profiles*") ? "menu-open" : "" }} {{ request()->is("backoffice/favorite-products*") ? "menu-open" : "" }} {{ request()->is("backoffice/search-histories*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("backoffice/preferences*") ? "active" : "" }} {{ request()->is("backoffice/profiles*") ? "active" : "" }} {{ request()->is("backoffice/favorite-products*") ? "active" : "" }} {{ request()->is("backoffice/search-histories*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-user">

                            </i>
                            <p>
                                {{ trans('cruds.myAccount.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
{{--
                            @can('preference_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.preferences.index") }}" class="nav-link {{ request()->is("backoffice/preferences") || request()->is("backoffice/preferences/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-sliders-h">

                                        </i>
                                        <p>
                                            {{ trans('cruds.preference.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
--}}
{{--
                            @can('profile_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.profiles.index") }}" class="nav-link {{ request()->is("backoffice/profiles") || request()->is("backoffice/profiles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-check">

                                        </i>
                                        <p>
                                            {{ trans('cruds.profile.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
--}}
                            @can('favorite_product_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.favorite-products.index") }}" class="nav-link {{ request()->is("backoffice/favorite-products") || request()->is("backoffice/favorite-products/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-heart">

                                        </i>
                                        <p>
                                            {{ trans('cruds.favoriteProduct.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('search_history_access')
                                <li class="nav-item">
                                    <a href="{{ route("backoffice.search-histories.index") }}" class="nav-link {{ request()->is("backoffice/search-histories") || request()->is("backoffice/search-histories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.searchHistory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan





            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
