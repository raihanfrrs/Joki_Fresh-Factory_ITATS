<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  
    <div class="app-brand demo">
      <a href="/" class="app-brand-link">
        <img src="{{ asset('img/logo-icon.png') }}" alt="Logo FindFluence" width="35">
        <span class="app-brand-text demo menu-text fw-bold">ADMIN</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item {{ request()->is('dashboard/admin', 'dashboard/crm') ? 'open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->is('dashboard/admin') ? 'active' : '' }}">
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
      <li class="menu-item {{ request()->is('master/brand', 'master/brand/*', 'brand/*/favorite', 'influencer/*/favorite', 'master/influencer', 'master/influencer/*') ? 'open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div data-i18n="Pengguna">Pengguna</div>
          <div class="badge bg-label-primary rounded-pill ms-auto" id="label-total-brand-influencer-new-count"></div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->is('master/brand', 'master/brand/*', 'brand/*/favorite') ? 'active' : '' }} menu-item-brand">
            <a href="" class="menu-link">
              <div data-i18n="Brand">Brand</div>
              <div class="badge bg-label-primary rounded-pill ms-auto" id="label-brand-new-count"></div>
            </a>
          </li>
          <li class="menu-item {{ request()->is('master/influencer', 'master/influencer/*', 'influencer/*/favorite') ? 'active' : '' }} menu-item-influencer">
            <a href="" class="menu-link">
              <div data-i18n="Influencer">Influencer</div>
              <div class="badge bg-label-primary rounded-pill ms-auto" id="label-influencer-new-count"></div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item {{ request()->is('master/campaign/category', 'master/campaign/category/*') ? 'open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-checkup-list"></i>
          <div data-i18n="Campaign">Campaign</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->is('master/campaign/category', 'master/campaign/category/*') ? 'active' : '' }}">
            <a href="" class="menu-link">
              <div data-i18n="Kategori">Kategori</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item {{ request()->is('master/product', 'master/product/*') ? 'active' : '' }} menu-item-product">
        <a href="" class="menu-link">
          <i class="menu-icon tf-icons ti ti-package"></i>
          <div data-i18n="Produk">Produk</div>
          <div class="badge bg-label-primary rounded-pill ms-auto" id="label-total-product-new-count"></div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('master/subscription', 'master/subscription/*') ? 'active' : '' }}">
        <a href="" class="menu-link">
          <i class="menu-icon tf-icons ti ti-license"></i>
          <div data-i18n="Langganan">Langganan</div>
        </a>
      </li>

      <!-- AKTIVITAS -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">AKTIVITAS</span>
      </li>
      <li class="menu-item {{ request()->is('submission/influencer', 'submission/influencer/*') ? 'active' : '' }}">
        <a href="" class="menu-link">
          <i class="menu-icon tf-icons ti ti-transfer-in"></i>
          <div data-i18n="Pengajuan">Pengajuan</div>
        </a>
      </li>

      <!-- LAPORAN -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">LAPORAN</span>
      </li>
      <li class="menu-item {{ request()->is('subscription/brand', 'subscription/brand/*') ? 'active' : '' }}">
        <a href="" class="menu-link">
          <i class="menu-icon tf-icons ti ti-wallet"></i>
          <div data-i18n="Langganan">Langganan</div>
        </a>
      </li>
    </ul>

</aside>