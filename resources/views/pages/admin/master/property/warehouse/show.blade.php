@extends('layouts.admin')

@section('section-admin')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
        <div class="card">
          <div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden" id="swiper-with-progress">
            <div class="swiper-wrapper" id="swiper-wrapper-10dbce8a9e6f82cf1" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
              @foreach ($warehouse->getMedia('warehouse_images') as $media)
                <div class="swiper-slide" style="background-image: url({{ $media->getUrl() }})" role="group"></div>
              @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination-progressbar swiper-pagination-horizontal"><span class="swiper-pagination-progressbar-fill" style="transform: translate3d(0px, 0px, 0px) scaleX(0.4) scaleY(1); transition-duration: 300ms;"></span></div>
            <div class="swiper-button-next swiper-button-white custom-icon" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-10dbce8a9e6f82cf1" aria-disabled="false"></div>
            <div class="swiper-button-prev swiper-button-white custom-icon" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-10dbce8a9e6f82cf1" aria-disabled="false"></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
          </div>
          <div class="card-body">
            <h5 class="card-title text-capitalize">{{ $warehouse->name }}</h5>
            <p class="card-text">{{ $warehouse->description }}.</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Category <span style="float: right">{{ $warehouse->warehouse_category->category }}</span></li>
            <li class="list-group-item">Capacity Volume <span style="float: right">{{ $warehouse->capacity }}m<sup>3</sup></span></li>
            <li class="list-group-item">Surface Area <span style="float: right">{{ $warehouse->surface_area }}m<sup>2</sup></span></li>
            <li class="list-group-item">Building Area <span style="float: right">{{ $warehouse->building_area }}m<sup>2</sup></span></li>
            <li class="list-group-item">City <span style="float: right">{{ $warehouse->city }}</span></li>
            <li class="list-group-item">Address <span style="float: right">{{ $warehouse->address }}</span></li>
            <li class="list-group-item">Status 
                <span style="float: right" class="text-capitalize">
                    @if ($warehouse->status == 'available')
                        <span class="badge bg-success d-flex justify-content-center">{{ $warehouse->status }}</span>
                    @elseif ($warehouse->status == 'rented')
                        <span class="badge bg-warning d-flex justify-content-center">{{ $warehouse->status }}</span>
                    @elseif ($warehouse->status == 'maintenance')
                        <span class="badge bg-info d-flex justify-content-center">{{ $warehouse->status }}</span>
                    @elseif ($warehouse->status == 'damaged')
                        <span class="badge bg-danger d-flex justify-content-center">{{ $warehouse->status }}</span>
                    @elseif ($warehouse->status == 'unavailable')
                        <span class="badge bg-secondary d-flex justify-content-center">{{ $warehouse->status }}</span>
                    @endif
                </span>
            </li>
          </ul>
          <div class="card-body d-flex justify-content-center">
            <a href="{{ route('master.warehouse.show', $warehouse->id) }}" class="card-link">Details</a>
            <a href="javascript:void(0)" class="card-link" data-bs-target="#editWarehouse" data-bs-toggle="modal" id="button-trigger-modal-edit-warehouse" data-id="{{ $warehouse->id }}">Edit</a>
            <form action="{{ route('master.warehouse.destroy', $warehouse->id) }}" method="post" class="form-delete-warehouse-{{ $warehouse->id }}">
                @csrf
                @method('delete')
                <a href="javascript:void(0)" class="card-link ms-4" data-id="{{ $warehouse->id }}" id="button-delete-warehouse">Delete</a>
            </form>
          </div>
        </div>
    </div>
    <!--/ User Sidebar -->

    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
      <ul class="nav nav-pills flex-column flex-md-row mb-4">
        <li class="nav-item">
          <a class="nav-link nav-link-warehose active" href="javascript:void(0);" id="information" data-id="{{ $warehouse->id }}"><i class="ti ti-user-check ti-xs me-1"></i>Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-warehose" href="javascript:void(0);" id="activity" data-id="{{ $warehouse->id }}"><i class="ti ti-lock ti-xs me-1"></i>Activity</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-warehose" href="javascript:void(0);"><i class="ti ti-currency-dollar ti-xs me-1"></i>Billing &amp; Plans</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-warehose" href="javascript:void(0);"><i class="ti ti-bell ti-xs me-1"></i>Notifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-warehose" href="javascript:void(0);"><i class="ti ti-link ti-xs me-1"></i>Connections</a>
        </li>
      </ul>

      <div id="data-warehouse-detail"></div>
    </div>
  </div>
</div>
@endsection