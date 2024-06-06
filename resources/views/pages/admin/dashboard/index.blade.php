@extends('layouts.admin')

@section('title')
    Dashboard - Admin
@endsection

@section('section-admin')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">

      <div class="col-xl-4 mb-4 col-lg-5 col-12">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-7">
              <div class="card-body text-nowrap">
                <h5 class="card-title mb-0 text-capitalize">Congratulations {{ auth()->user()->level }}! 🎉</h5>
                <p class="mb-2">Highest Income This Year</p>
                <h4 class="text-primary mb-1">@rupiah($transactions[0]->subtotal)</h4>
                <a href="{{ route('report.yearly.sales') }}" class="btn btn-primary waves-effect waves-light">View Sales</a>
              </div>
            </div>
            <div class="col-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img src="../../assets/img/illustrations/card-advance-sale.png" height="140" alt="view sales">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-8 mb-4 col-lg-7 col-12">
        <div class="card h-100">
          <div class="card-header">
            <div class="d-flex justify-content-between mb-3">
              <h5 class="card-title mb-0">Statistics</h5>
              <small class="text-muted">Updated 1 month ago</small>
            </div>
          </div>
          <div class="card-body">
            <div class="row gy-3">
              <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                  <div class="badge rounded-pill bg-label-primary me-3 p-2">
                    <i class="ti ti-chart-pie-2 ti-sm"></i>
                  </div>
                  <div class="card-info">
                    <h5 class="mb-0">230k</h5>
                    <small>Sales</small>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                  <div class="badge rounded-pill bg-label-info me-3 p-2">
                    <i class="ti ti-users ti-sm"></i>
                  </div>
                  <div class="card-info">
                    <h5 class="mb-0">8.549k</h5>
                    <small>Customers</small>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                  <div class="badge rounded-pill bg-label-danger me-3 p-2">
                    <i class="ti ti-shopping-cart ti-sm"></i>
                  </div>
                  <div class="card-info">
                    <h5 class="mb-0">1.423k</h5>
                    <small>Products</small>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                  <div class="badge rounded-pill bg-label-success me-3 p-2">
                    <i class="ti ti-currency-dollar ti-sm"></i>
                  </div>
                  <div class="card-info">
                    <h5 class="mb-0">$9745</h5>
                    <small>Revenue</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6 mb-4">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <small class="d-block mb-1 text-muted">Sales Overview</small>
              <p class="card-text text-success">+18.2%</p>
            </div>
            <h4 class="card-title mb-1">$42.5k</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-4">
                <div class="d-flex gap-2 align-items-center mb-2">
                  <span class="badge bg-label-info p-1 rounded"><i class="ti ti-shopping-cart ti-xs"></i></span>
                  <p class="mb-0">Order</p>
                </div>
                <h5 class="mb-0 pt-1 text-nowrap">62.2%</h5>
                <small class="text-muted">6,440</small>
              </div>
              <div class="col-4">
                <div class="divider divider-vertical">
                  <div class="divider-text">
                    <span class="badge-divider-bg bg-label-secondary">VS</span>
                  </div>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="d-flex gap-2 justify-content-end align-items-center mb-2">
                  <p class="mb-0">Visits</p>
                  <span class="badge bg-label-primary p-1 rounded"><i class="ti ti-link ti-xs"></i></span>
                </div>
                <h5 class="mb-0 pt-1 text-nowrap ms-lg-n3 ms-xl-0">25.5%</h5>
                <small class="text-muted">12,749</small>
              </div>
            </div>
            <div class="d-flex align-items-center mt-4">
              <div class="progress w-100" style="height: 8px">
                <div class="progress-bar bg-info" style="width: 70%" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column">
                <div class="card-title mb-auto">
                  <h5 class="mb-1 text-nowrap">Revenue Growth</h5>
                  <small>Weekly Report</small>
                </div>
                <div class="chart-statistics">
                  <h3 class="card-title mb-1">$4,673</h3>
                  <span class="badge bg-label-success">+15.2%</span>
                </div>
              </div>
              <div id="revenueGrowth"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-4">
        <div
          class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg"
          id="swiper-with-pagination-cards">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="row">
                <div class="col-12">
                  <h5 class="text-white mb-0 mt-2">Website Analytics</h5>
                  <small>Total 28.5% Conversion Rate</small>
                </div>
                <div class="row">
                  <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                    <h6 class="text-white mt-0 mt-md-3 mb-3">Traffic</h6>
                    <div class="row">
                      <div class="col-6">
                        <ul class="list-unstyled mb-0">
                          <li class="d-flex mb-4 align-items-center">
                            <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">28%</p>
                            <p class="mb-0">Sessions</p>
                          </li>
                          <li class="d-flex align-items-center mb-2">
                            <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">1.2k</p>
                            <p class="mb-0">Leads</p>
                          </li>
                        </ul>
                      </div>
                      <div class="col-6">
                        <ul class="list-unstyled mb-0">
                          <li class="d-flex mb-4 align-items-center">
                            <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">3.1k</p>
                            <p class="mb-0">Page Views</p>
                          </li>
                          <li class="d-flex align-items-center mb-2">
                            <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">12%</p>
                            <p class="mb-0">Conversions</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                    <img
                      src="../../assets/img/illustrations/card-website-analytics-1.png"
                      alt="Website Analytics"
                      width="170"
                      class="card-website-analytics-img" />
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="row">
                <div class="col-12">
                  <h5 class="text-white mb-0 mt-2">Website Analytics</h5>
                  <small>Total 28.5% Conversion Rate</small>
                </div>
                <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                  <h6 class="text-white mt-0 mt-md-3 mb-3">Spending</h6>
                  <div class="row">
                    <div class="col-6">
                      <ul class="list-unstyled mb-0">
                        <li class="d-flex mb-4 align-items-center">
                          <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">12h</p>
                          <p class="mb-0">Spend</p>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                          <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">127</p>
                          <p class="mb-0">Order</p>
                        </li>
                      </ul>
                    </div>
                    <div class="col-6">
                      <ul class="list-unstyled mb-0">
                        <li class="d-flex mb-4 align-items-center">
                          <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">18</p>
                          <p class="mb-0">Order Size</p>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                          <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">2.3k</p>
                          <p class="mb-0">Items</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                  <img
                    src="../../assets/img/illustrations/card-website-analytics-2.png"
                    alt="Website Analytics"
                    width="170"
                    class="card-website-analytics-img" />
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="row">
                <div class="col-12">
                  <h5 class="text-white mb-0 mt-2">Website Analytics</h5>
                  <small>Total 28.5% Conversion Rate</small>
                </div>
                <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1">
                  <h6 class="text-white mt-0 mt-md-3 mb-3">Revenue Sources</h6>
                  <div class="row">
                    <div class="col-6">
                      <ul class="list-unstyled mb-0">
                        <li class="d-flex mb-4 align-items-center">
                          <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">268</p>
                          <p class="mb-0">Direct</p>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                          <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">62</p>
                          <p class="mb-0">Referral</p>
                        </li>
                      </ul>
                    </div>
                    <div class="col-6">
                      <ul class="list-unstyled mb-0">
                        <li class="d-flex mb-4 align-items-center">
                          <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">890</p>
                          <p class="mb-0">Organic</p>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                          <p class="mb-0 fw-semibold me-2 website-analytics-text-bg">1.2k</p>
                          <p class="mb-0">Campaign</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                  <img
                    src="../../assets/img/illustrations/card-website-analytics-3.png"
                    alt="Website Analytics"
                    width="170"
                    class="card-website-analytics-img" />
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title mb-0">
              <h5 class="mb-0">Active Project</h5>
              <small class="text-muted">Average 72% Completed</small>
            </div>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="activeProjects" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="activeProjects">
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                <a class="dropdown-item" href="javascript:void(0);">View All</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="p-0 m-0">
              <li class="mb-3 pb-1 d-flex">
                <div class="d-flex w-50 align-items-center me-3">
                  <img src="../../assets/img/icons/brands/laravel-logo.png" alt="laravel-logo" class="me-3" width="35">
                  <div>
                    <h6 class="mb-0">Laravel</h6>
                    <small class="text-muted">eCommerce</small>
                  </div>
                </div>
                <div class="d-flex flex-grow-1 align-items-center">
                  <div class="progress w-100 me-3" style="height: 8px">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="text-muted">54%</span>
                </div>
              </li>
              <li class="mb-3 pb-1 d-flex">
                <div class="d-flex w-50 align-items-center me-3">
                  <img src="../../assets/img/icons/brands/figma-logo.png" alt="figma-logo" class="me-3" width="35">
                  <div>
                    <h6 class="mb-0">Figma</h6>
                    <small class="text-muted">App UI Kit</small>
                  </div>
                </div>
                <div class="d-flex flex-grow-1 align-items-center">
                  <div class="progress w-100 me-3" style="height: 8px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 86%" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="text-muted">86%</span>
                </div>
              </li>
              <li class="mb-3 pb-1 d-flex">
                <div class="d-flex w-50 align-items-center me-3">
                  <img src="../../assets/img/icons/brands/vue-logo.png" alt="vue-logo" class="me-3" width="35">
                  <div>
                    <h6 class="mb-0">VueJs</h6>
                    <small class="text-muted">Calendar App</small>
                  </div>
                </div>
                <div class="d-flex flex-grow-1 align-items-center">
                  <div class="progress w-100 me-3" style="height: 8px">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="text-muted">90%</span>
                </div>
              </li>
              <li class="mb-3 pb-1 d-flex">
                <div class="d-flex w-50 align-items-center me-3">
                  <img src="../../assets/img/icons/brands/react-logo.png" alt="react-logo" class="me-3" width="35">
                  <div>
                    <h6 class="mb-0">React</h6>
                    <small class="text-muted">Dashboard</small>
                  </div>
                </div>
                <div class="d-flex flex-grow-1 align-items-center">
                  <div class="progress w-100 me-3" style="height: 8px">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="text-muted">37%</span>
                </div>
              </li>
              <li class="mb-3 pb-1 d-flex">
                <div class="d-flex w-50 align-items-center me-3">
                  <img src="../../assets/img/icons/brands/bootstrap-logo.png" alt="bootstrap-logo" class="me-3" width="35">
                  <div>
                    <h6 class="mb-0">Bootstrap</h6>
                    <small class="text-muted">Website</small>
                  </div>
                </div>
                <div class="d-flex flex-grow-1 align-items-center">
                  <div class="progress w-100 me-3" style="height: 8px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="text-muted">22%</span>
                </div>
              </li>
              <li class="d-flex">
                <div class="d-flex w-50 align-items-center me-3">
                  <img src="../../assets/img/icons/brands/sketch-logo.png" alt="sketch-logo" class="me-3" width="35">
                  <div>
                    <h6 class="mb-0">Sketch</h6>
                    <small class="text-muted">Website Design</small>
                  </div>
                </div>
                <div class="d-flex flex-grow-1 align-items-center">
                  <div class="progress w-100 me-3" style="height: 8px">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="text-muted">29%</span>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-4 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title m-0 me-2">
              <h5 class="m-0 me-2">Popular Products</h5>
              <small class="text-muted">Total 10.4k Visitors</small>
            </div>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="popularProduct" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="popularProduct">
                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
                <div class="me-3">
                  <img src="../../assets/img/products/iphone.png" alt="User" class="rounded" width="46">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Apple iPhone 13</h6>
                    <small class="text-muted d-block">Item: #FXZ-4567</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <p class="mb-0 fw-semibold">$999.29</p>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="me-3">
                  <img src="../../assets/img/products/nike-air-jordan.png" alt="User" class="rounded" width="46">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Nike Air Jordan</h6>
                    <small class="text-muted d-block">Item: #FXZ-3456</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <p class="mb-0 fw-semibold">$72.40</p>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="me-3">
                  <img src="../../assets/img/products/headphones.png" alt="User" class="rounded" width="46">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Beats Studio 2</h6>
                    <small class="text-muted d-block">Item: #FXZ-9485</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <p class="mb-0 fw-semibold">$99</p>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="me-3">
                  <img src="../../assets/img/products/apple-watch.png" alt="User" class="rounded" width="46">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Apple Watch Series 7</h6>
                    <small class="text-muted d-block">Item: #FXZ-2345</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <p class="mb-0 fw-semibold">$249.99</p>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="me-3">
                  <img src="../../assets/img/products/amazon-echo.png" alt="User" class="rounded" width="46">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Amazon Echo Dot</h6>
                    <small class="text-muted d-block">Item: #FXZ-8959</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <p class="mb-0 fw-semibold">$79.40</p>
                  </div>
                </div>
              </li>
              <li class="d-flex">
                <div class="me-3">
                  <img src="../../assets/img/products/play-station.png" alt="User" class="rounded" width="46">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Play Station Console</h6>
                    <small class="text-muted d-block">Item: #FXZ-7892</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <p class="mb-0 fw-semibold">$129.48</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="card h-100">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title m-0 me-2">
              <h5 class="m-0 me-2">Transactions</h5>
              <small class="text-muted">Total 58 Transactions done in this Month</small>
            </div>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="p-0 m-0">
              <li class="d-flex mb-3 pb-1 align-items-center">
                <div class="badge bg-label-primary me-3 rounded p-2">
                  <i class="ti ti-wallet ti-sm"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Wallet</h6>
                    <small class="text-muted d-block">Starbucks</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-danger">-$75</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-3 pb-1 align-items-center">
                <div class="badge bg-label-success rounded me-3 p-2">
                  <i class="ti ti-browser-check ti-sm"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Bank Transfer</h6>
                    <small class="text-muted d-block">Add Money</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-success">+$480</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-3 pb-1 align-items-center">
                <div class="badge bg-label-danger rounded me-3 p-2">
                  <i class="ti ti-brand-paypal ti-sm"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Paypal</h6>
                    <small class="text-muted d-block mb-1">Client Payment</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-success">+$268</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-3 pb-1 align-items-center">
                <div class="badge bg-label-secondary me-3 rounded p-2">
                  <i class="ti ti-credit-card ti-sm"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Master Card</h6>
                    <small class="text-muted d-block mb-1">Ordered iPhone 13</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-danger">-$699</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-3 pb-1 align-items-center">
                <div class="badge bg-label-info me-3 rounded p-2">
                  <i class="ti ti-currency-dollar ti-sm"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Bank Transactions</h6>
                    <small class="text-muted d-block mb-1">Refund</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-success">+$98</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-3 pb-1 align-items-center">
                <div class="badge bg-label-danger me-3 rounded p-2">
                  <i class="ti ti-brand-paypal ti-sm"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Paypal</h6>
                    <small class="text-muted d-block mb-1">Client Payment</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-success">+$126</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex align-items-center">
                <div class="badge bg-label-success me-3 rounded p-2">
                  <i class="ti ti-browser-check ti-sm"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Bank Transfer</h6>
                    <small class="text-muted d-block mb-1">Pay Office Rent</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0 text-danger">-$1290</h6>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>
</div>

@endsection