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

                @if(Auth::user()->roles()->where('id', 1)->exists())
                    @include('partials.backoffice.menu_admin')
                @elseif(Auth::user()->roles()->where('id', 2)->exists())
                    @include('partials.backoffice.menu_advertiser')
                @elseif(Auth::user()->roles()->where('id', 3)->exists())
                    @include('partials.backoffice.menu_affiliate')
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
