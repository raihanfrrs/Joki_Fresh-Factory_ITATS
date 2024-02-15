<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  
    <div class="app-brand demo">
      <a href="/" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bold">TENANT</span>
        <span class="app-brand-text badge rounded-pill bg-primary text-capitalize">{{ auth()->user()->tenant->rank }}</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item {{ request()->is('/', 'dashboard/crm') ? 'open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
            <a href="/" class="menu-link">
              <div data-i18n="Analitik">Analitik</div>
            </a>
          </li>
          <li class="menu-item {{ request()->is('dashboard/crm') ? 'active' : '' }}">
            <a href="" class="menu-link">
              <div data-i18n="CRM">CRM</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- MASTER -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">MASTER</span>
      </li>
      <li class="menu-item {{ request()->is('master/admin', 'master/admin/*', 'master/tenant', 'master/tenant/*') ? 'open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div data-i18n="User">User</div>
          <div class="badge bg-label-primary rounded-pill ms-auto" id="label-total-brand-influencer-new-count"></div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->is('master/admin', 'master/admin/*') ? 'active' : '' }} menu-item-brand">
            <a href="{{ route('master.admin') }}" class="menu-link">
              <div data-i18n="Admin">Admin</div>
              <div class="badge bg-label-primary rounded-pill ms-auto" id="label-brand-new-count"></div>
            </a>
          </li>
          <li class="menu-item {{ request()->is('master/tenant', 'master/tenant/*') ? 'active' : '' }} menu-item-influencer">
            <a href="{{ route('master.tenant') }}" class="menu-link">
              <div data-i18n="Tenant">Tenant</div>
              <div class="badge bg-label-primary rounded-pill ms-auto" id="label-influencer-new-count"></div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item {{ request()->is('master/warehouse', 'master/warehouse/*', 'master/category', 'master/category/*') ? 'open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-building-warehouse"></i>
          <div data-i18n="Property">Property</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->is('master/warehouse', 'master/warehouse/*') ? 'active' : '' }}">
            <a href="{{ route('master.warehouse') }}" class="menu-link">
              <div data-i18n="Warehouse">Warehouse</div>
            </a>
          </li>
          <li class="menu-item {{ request()->is('master/category', 'master/category/*') ? 'active' : '' }}">
            <a href="{{ route('master.warehouse.category') }}" class="menu-link">
              <div data-i18n="Category">Category</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- LAPORAN -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">REPORT</span>
      </li>
      <li class="menu-item {{ request()->is('report/sales', 'report/sales/*', 'report/performance', 'report/performance/*') ? 'open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-checkup-list"></i>
          <div data-i18n="Reporting">Reporting</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->is('report/sales', 'report/sales/*') ? 'active' : '' }}">
            <a href="{{ route('report.sales') }}" class="menu-link">
              <div data-i18n="Sales">Sales</div>
            </a>
          </li>
          <li class="menu-item {{ request()->is('report/performance', 'report/performance/*') ? 'active' : '' }}">
            <a href="{{ route('report.performance') }}" class="menu-link">
              <div data-i18n="Performance">Performance</div>
            </a>
          </li>
        </ul>
      </li>
    </ul>

</aside>