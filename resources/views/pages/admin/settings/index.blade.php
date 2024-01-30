@extends('layouts.admin')

@section('section-admin')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row fv-plugins-icon-container">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-4">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('settings/admin-profile') ? 'active' : '' }}" href="{{ route('admin.settings.profile') }}"><i class="ti-xs ti ti-users me-1"></i> Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('settings/admin-password') ? 'active' : '' }}" href="{{ route('admin.settings.password') }}"><i class="ti-xs ti ti-lock me-1"></i> Security</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-billing.html"><i class="ti-xs ti ti-file-description me-1"></i> Billing &amp; Plans</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-notifications.html"><i class="ti-xs ti ti-bell me-1"></i> Notifications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-connections.html"><i class="ti-xs ti ti-link me-1"></i> Connections</a>
          </li>
        </ul>

        @if (Request::is('settings/admin-profile'))
          @include('pages.admin.settings.profile')
        @elseif (Request::is('settings/admin-password'))
          @include('pages.admin.settings.password')
        @endif
        
      </div>
    </div>
</div>
@endsection