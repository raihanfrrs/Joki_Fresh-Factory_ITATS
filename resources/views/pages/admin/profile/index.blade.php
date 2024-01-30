@extends('layouts.admin')

@section('section-admin')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="user-profile-header-banner">
            <img src="../../assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
          </div>
          <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                @if (auth()->user()->admin->getFirstMediaUrl('admin_images'))
                    <img src="{{ auth()->user()->admin->getFirstMediaUrl('admin_images') }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                @else 
                    <img src="../../assets/img/avatars/14.png" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                @endif
            </div>
            <div class="flex-grow-1 mt-3 mt-sm-5">
              <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                <div class="user-profile-info">
                  <h4 class="text-capitalize">{{ auth()->user()->admin->name }}</h4>
                  <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                    <li class="list-inline-item text-capitalize"><i class="ti ti-color-swatch"></i> {{ auth()->user()->level }}</li>
                    <li class="list-inline-item"><i class="ti ti-calendar"></i> Joined {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('F Y') }}</li>
                  </ul>
                </div>
                <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-light">
                  <i class="ti ti-user-check me-1"></i>Connected
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-sm-row mb-4">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-user-check me-1"></i> Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-profile-teams.html"><i class="ti-xs ti ti-users me-1"></i> Teams</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-profile-projects.html"><i class="ti-xs ti ti-layout-grid me-1"></i> Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-profile-connections.html"><i class="ti-xs ti ti-link me-1"></i> Connections</a>
          </li>
        </ul>
      </div>
    </div>

    @if (Request::is('profile/admin'))
      @include('pages.admin.profile.profile')
    @endif
</div>
@endsection