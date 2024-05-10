@extends('layouts.tenant')

@section('section-tenant')
<style>
table tr th, td {
    padding-top: 1rem; 
}

table tr th {
    width: 10rem;
}
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Navigation -->
        <div class="col-lg-3 col-md-4 col-12 mb-md-0 mb-3">
          <div class="d-flex justify-content-between flex-column mb-2 mb-md-0">
            <ul class="nav nav-align-left nav-pills flex-column" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#payment" aria-selected="true" role="tab">
                  <i class="ti ti-building me-1 ti-sm"></i>
                  <span class="align-middle fw-semibold">Property</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#delivery" aria-selected="false" tabindex="-1" role="tab">
                  <i class="ti ti-briefcase me-1 ti-sm"></i>
                  <span class="align-middle fw-semibold">Subscription</span>
                </button>
              </li>
            </ul>
          </div>
        </div>
        <!-- /Navigation -->

        <!-- FAQ's -->
        <div class="col-lg-9 col-md-8 col-12">
          <div class="tab-content py-0">
            <div class="tab-pane fade show active" id="payment" role="tabpanel">
              <div class="d-flex mb-3 gap-3">
                <div>
                  <span class="badge bg-label-primary rounded-2 p-2">
                    <i class="ti ti-building ti-lg"></i>
                  </span>
                </div>
                <div>
                  <h4 class="mb-0">
                    <span class="align-middle">Property</span>
                  </h4>
                  <small>Showing All Property Details</small>
                </div>
              </div>
              <div id="accordionPayment" class="accordion">
                <div class="card accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#accordionPayment-1" aria-controls="accordionPayment-1">
                      Property Type
                    </button>
                  </h2>

                  <div id="accordionPayment-1" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
                                <table style="width:100%">
                                    <tr>
                                      <th>Name:</th>
                                      <td>{{ $warehouse->name }}</td>
                                    </tr>
                                    <tr>
                                      <th>Category:</th>
                                      <td>{{ $warehouse->warehouse_category->category }}</td>
                                    </tr>
                                    <tr>
                                      <th>City:</th>
                                      <td>{{ $warehouse->city }}</td>
                                    </tr>
                                    <tr>
                                      <th>Address:</th>
                                      <td>{{ $warehouse->address }}</td>
                                    </tr>
                                    <tr>
                                      <th>Zip Code:</th>
                                      <td>{{ $warehouse->zip_code }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="card accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionPayment-2" aria-controls="accordionPayment-2">
                      Covered Area
                    </button>
                  </h2>
                  <div id="accordionPayment-2" class="accordion-collapse collapse">
                    <div class="accordion-body">
                      
                    </div>
                  </div>
                </div>

                <div class="card accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionPayment-3" aria-controls="accordionPayment-3">
                      Storage Features
                    </button>
                  </h2>
                  <div id="accordionPayment-3" class="accordion-collapse collapse">
                    <div class="accordion-body">
                      For any technical difficulties you are experiencing with our website, please contact us at
                      our
                      <a href="javascript:void(0);">support portal</a>, or you can call us toll-free at
                      <strong>1-000-000-000</strong>, or email us at
                      <a href="javascript:void(0);">order@companymail.com</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="delivery" role="tabpanel">
              <div class="d-flex mb-3 gap-3">
                <div>
                  <span class="badge bg-label-primary rounded-2 p-2">
                    <i class="ti ti-briefcase ti-lg"></i>
                  </span>
                </div>
                <div>
                  <h4 class="mb-0">
                    <span class="align-middle">Delivery</span>
                  </h4>
                  <small>Lorem ipsum, dolor sit amet.</small>
                </div>
              </div>
              <div id="accordionDelivery" class="accordion">
                <div class="card accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#accordionDelivery-1" aria-controls="accordionDelivery-1">
                      How would you ship my order?
                    </button>
                  </h2>

                  <div id="accordionDelivery-1" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                      For large products, we deliver your product via a third party logistics company offering
                      you the “room of choice” scheduled delivery service. For small products, we offer free
                      parcel delivery.
                    </div>
                  </div>
                </div>

                <div class="card accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionDelivery-2" aria-controls="accordionDelivery-2">
                      What is the delivery cost of my order?
                    </button>
                  </h2>
                  <div id="accordionDelivery-2" class="accordion-collapse collapse">
                    <div class="accordion-body">
                      The cost of scheduled delivery is $69 or $99 per order, depending on the destination
                      postal code. The parcel delivery is free.
                    </div>
                  </div>
                </div>

                <div class="card accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionDelivery-4" aria-controls="accordionDelivery-4">
                      What to do if my product arrives damaged?
                    </button>
                  </h2>
                  <div id="accordionDelivery-4" class="accordion-collapse collapse">
                    <div class="accordion-body">
                      We will promptly replace any product that is damaged in transit. Just contact our
                      <a href="javascript:void(0);">support team</a>, to notify us of the situation within 48
                      hours of product arrival.
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /FAQ's -->
    </div>
</div>
@endsection