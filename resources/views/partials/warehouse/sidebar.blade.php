<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  
    <div class="app-brand demo">
      <a href="{{ route('warehouse.index', $warehouse->id) }}" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bold text-uppercase">Tenant</span>
        <span class="app-brand-text badge rounded-pill bg-{{ $warehouse->rented->status == 'active' ? 'success' : 'danger' }} text-capitalize">{{ $warehouse->rented->status }}</span>
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
      <li class="menu-item {{ request()->is('warehouse/*/products', 'warehouse/*/products/*') ? 'active' : '' }}">
        <a href="{{ route('warehouse.products.index', $warehouse->id) }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-box"></i>
          <div data-i18n="Products">Products</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('warehouse/*/categories', 'warehouse/*/categories/*') ? 'active' : '' }}">
        <a href="{{ route('warehouse.categories.index', $warehouse->id) }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-truck-loading"></i>
          <div data-i18n="Categories">Categories</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('warehouse/*/racks', 'warehouse/*/racks/*') ? 'active' : '' }}">
        <a href="{{ route('warehouse.racks.index', $warehouse->id) }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-forklift"></i>
          <div data-i18n="Racks">Racks</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('warehouse/*/suppliers', 'warehouse/*/suppliers/*') ? 'active' : '' }}">
        <a href="{{ route('warehouse.suppliers.index', $warehouse->id) }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-truck"></i>
          <div data-i18n="Suppliers">Suppliers</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('warehouse/*/customers', 'warehouse/*/customers/*') ? 'active' : '' }}">
        <a href="{{ route('warehouse.customers.index', $warehouse->id) }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div data-i18n="Customers">Customers</div>
        </a>
      </li>

      <!-- Tools -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">TOOLS</span>
      </li>
      <li class="menu-item">
        <a href="" class="menu-link">
          <i class="menu-icon tf-icons ti ti-plane-arrival"></i>
          <div data-i18n="Inbound">Inbound</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="" class="menu-link">
          <i class="menu-icon tf-icons ti ti-assembly"></i>
          <div data-i18n="Inventory">Inventory</div>
        </a>
      </li>

      <!-- LAPORAN -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">REPORT</span>
      </li>
      <li class="menu-item">
        <a href="" class="menu-link">
          <i class="menu-icon tf-icons ti ti-clipboard-list"></i>
          <div data-i18n="Supplier Performance">Supplier Performance</div>
        </a>
      </li>
      {{-- <li class="menu-item {{ request()->is('report/sales', 'report/sales/*', 'report/performance', 'report/performance/*') ? 'open' : '' }}">
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
      </li> --}}
    </ul>

</aside>