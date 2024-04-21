@can('affiliate_management_access')

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

@endcan
