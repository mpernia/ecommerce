@can('advertiser_management_access')
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
    @can('store_access')
        <li class="nav-item">
            <a href="{{ route("backoffice.stores.index") }}" class="nav-link {{ request()->is("backoffice/stores") || request()->is("backoffice/stores/*") ? "active" : "" }}">
                <i class="fa-fw nav-icon fas fa-store">

                </i>
                <p>
                    {{ trans('cruds.store.title') }}
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
@endcan
