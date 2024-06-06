@extends('layouts.warehouse')

@section('title')
    Dashboard - {{ $warehouse->name }}
@endsection

@section('section-warehouse')
<div class="container-xxl flex-grow-1 container-p-y">
    
    <div class="row">

        <div class="col-xl-4 mb-4 col-lg-5 col-12">
            <div class="row">

                <div class="col-xl-6 col-md-3 col-6">
                    <div class="card">
                      <div class="card-header pb-0">
                        <h5 class="card-title mb-0">Pengguna</h5>
                        <small class="text-muted">Bulan Terakhir</small>
                      </div>
                      <div class="card-body">
                        <div id="profitLastMonth"></div>
                        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                          <h4 class="mb-0" id="value-user-analytic">0</h4>
                          <small class="" id="percent-user-analytic">+0%</small>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-3 col-6">
                    <div class="card">
                      <div class="card-header pb-0">
                        <h5 class="card-title mb-0">Keuntungan</h5>
                        <small class="text-muted">Bulan Terakhir</small>
                      </div>
                      <div class="card-body">
                        <div id="profitLastMonth"></div>
                        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                          <h4 class="mb-0" id="value-total-profit-last-month-analytic">0</h4>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-12 col-xl-12 mt-4">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title m-0 me-2">
                        <h5 class="m-0 me-2">Produk Populer</h5>
                        <small class="text-muted">Total <span id="value-product-popular-analytic">0</span> Produk</small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="popularProduct"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="popularProduct">
                          <a class="dropdown-item" href="javascript:void(0);" id="date-product-popular-filter" data-date="last-month">Bulan Terakhir</a>
                          <a class="dropdown-item" href="javascript:void(0);" id="date-product-popular-filter" data-date="last-year">Tahun Kemarin</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="data-product-popular-analytic"></div>
                    </div>
                  </div>
              </div>

            </div>
        </div>
    
        <div class="col-lg-8 mb-4 h-25">
          <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex justify-content-between">
                      <small class="d-block mb-1 text-muted">Ringkasan Pengguna</small>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-4">
                        <div class="d-flex gap-2 align-items-center mb-2">
                          <span class="badge bg-label-info p-1 rounded"
                            ><i class="ti ti-diamond"></i></span>
                          <p class="mb-0">Langganan</p>
                        </div>
                        <h5 class="mb-0 pt-1 text-nowrap" id="percent-total-brand-subscription-analytic">0%</h5>
                        <small class="text-muted" id="value-total-brand-subscription-analytic">0</small>
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
                          <p class="mb-0">Gratis</p>
                          <span class="badge bg-label-primary p-1 rounded"><i class="ti ti-diamond-off"></i></span>
                        </div>
                        <h5 class="mb-0 pt-1 text-nowrap ms-lg-n3 ms-xl-0" id="percent-total-brand-free-analytic">0%</h5>
                        <small class="text-muted" id="value-total-brand-free-analytic">0</small>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>
@endsection