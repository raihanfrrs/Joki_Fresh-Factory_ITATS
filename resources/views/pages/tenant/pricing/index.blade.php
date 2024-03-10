@extends('layouts.tenant')

@section('section-tenant')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        @foreach ($warehouses as $warehouse)
            @if ($warehouse->warehouse_subscription()->exists())
                <div class="col-xl-4 col-lg-4 col-md-6 order-1 order-md-0 mb-5">
                    <div class="card">
                        <div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden swiper-container" id="swiper-with-progress">
                            <div class="swiper-wrapper" id="swiper-wrapper-{{ $warehouse->id }}" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                            @foreach ($warehouse->getMedia('warehouse_images') as $media)
                                <div class="swiper-slide" style="background-image: url({{ $media->getUrl() }})" role="group"></div>
                            @endforeach
                            </div>
                            <div class="swiper-pagination swiper-pagination-progressbar swiper-pagination-horizontal"><span class="swiper-pagination-progressbar-fill" style="transform: translate3d(0px, 0px, 0px) scaleX(0.4) scaleY(1); transition-duration: 300ms;"></span></div>
                            <div class="swiper-button-next swiper-button-white custom-icon" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-{{ $warehouse->id }}" aria-disabled="false"></div>
                            <div class="swiper-button-prev swiper-button-white custom-icon" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-{{ $warehouse->id }}" aria-disabled="false"></div>
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
                            <li class="list-group-item"><b>Rental Price</b><br>
                                <div class="demo-inline-spacing mt-3">
                                    <ol class="list-group list-group-numbered">
                                    @foreach ($warehouse->warehouse_subscription->sortBy('subscription.month_duration') as $subscription)
                                        <li class="list-group-item">
                                            {{ $subscription->subscription->name }} | @convertMonthsToYearsAndMonths($subscription->subscription->month_duration)
                                            <span style="float: right;" class="fw-bold">@rupiah($subscription->total_price)</span>
                                        </li>
                                    @endforeach
                                    </ol>
                                </div>
                            </li>
                        </ul>
                        <div class="card-body">
                            <form action="{{ route('pricing.store.cart', $warehouse->id) }}" method="post" class="d-flex flex-row">
                                @csrf
                                <a href="" class="btn btn-primary btn-md w-100 me-3"><i class="menu-icon tf-icons ti ti-file-description"></i> Details</a>
                                @if (!$warehouse->temp_transaction()->exists())
                                    <button type="submit" class="btn btn-info w-100 btn-md"><i class="menu-icon tf-icons ti ti-receipt"></i> Book Now</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            {{-- @else
            <div class="misc-wrapper mt-5">
                <h2 class="mb-1 mx-2 d-flex justify-content-center">Not Available!</h2>
                <p class="mb-4 mx-2 d-flex justify-content-center">I apologize for any inconvenience; the warehouse is currently in the process of being set up by the system.</p>
                <div class="mt-4 d-flex justify-content-center">
                  <img src="{{ asset('assets/img/illustrations/page-misc-under-maintenance.png') }}" width="550" class="img-fluid">
                </div>
            </div> --}}
            @endif
        @endforeach
    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swipers = document.querySelectorAll('.swiper-container');

        swipers.forEach(function (swiperElement) {
            var swiper = new Swiper(swiperElement, {
                slidesPerView: 'auto',
                pagination: {
                    type: 'progressbar',
                    el: '.swiper-pagination'
                },
                navigation: {
                    prevEl: '.swiper-button-prev',
                    nextEl: '.swiper-button-next'
                }
            });
        });
    });
</script>
@endpush

@endsection