@extends('layouts.warehouse')

@section('section-warehouse')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="" method="post">
        @csrf

        <div class="accordion mb-2" id="accordionWithIcon">
          <div class="card accordion-item">
            <h2 class="accordion-header d-flex align-items-center">
              <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionWithIcon-1" aria-expanded="false">
                <i class="ti ti-user ti-xs me-2"></i>
                Choose Customer
              </button>
            </h2>

            <div id="accordionWithIcon-1" class="accordion-collapse collapse" style="">
              <div class="accordion-body">
                <div class="col-md-12">
                  <div class="card-datatable table-responsive">
                    <table class="table border-top" id="listWarehouseCustomersOutboundTable" data-id="{{ $warehouse->id }}">
                      <thead>
                        <tr>
                          <th></th>
                          <th class="text-center">Customer</th>
                          <th class="text-center">Email</th>
                          <th class="text-center">Phone</th>
                          <th class="text-center">Address</th>
                          <th class="text-center">Type</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card accordion-item active" id="div-product-outbound">
            <h2 class="accordion-header d-flex align-items-center">
              <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionWithIcon-2" aria-expanded="false">
                <i class="me-2 ti ti-box ti-xs"></i>
                Choose Product
              </button>
            </h2>
            <div id="accordionWithIcon-2" class="accordion-collapse collapse show" style="">
              <div class="accordion-body">
                <div class="col-md-12">
                  <div class="card-datatable table-responsive">
                    <table class="table border-top" id="listWarehouseProductsOutboundTable" data-id="{{ $warehouse->id }}">
                      <thead>
                        <tr>
                          <th></th>
                          <th class="text-center"><input type="checkbox" name="" id="select_all_product_ids" class="form-check-input"></th>
                          <th class="text-center">Product</th>
                          <th class="text-center">Category</th>
                          <th class="text-center">Rack</th>
                          <th class="text-center">Act. Stock</th>
                          <th class="text-center">Sale Price</th>
                          <th class="text-center">Weight</th>
                          <th class="text-center">Dimension</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card accordion-item active" id="div-cart-outbound">
            <h2 class="accordion-header d-flex align-items-center">
              <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionWithIcon-3" aria-expanded="false">
                <i class="me-2 ti ti-shopping-cart ti-xs"></i>
                Cart
              </button>
            </h2>
            <div id="accordionWithIcon-3" class="accordion-collapse collapse show" style="">
              <div class="accordion-body">
                <div class="col-md-12">
                  <div class="table-responsive border-top">
                    <table class="table m-0">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Category</th>
                          <th>Rack</th>
                          <th>Sale Price</th>
                          <th>Quantity</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($tempOutbounds as $tempOutbound)
                        <tr>
                          <td class="text-nowrap">{{ $tempOutbound->product->name }}</td>
                          <td class="text-nowrap">{{ $tempOutbound->product->product_category->name }}</td>
                          <td class="text-nowrap">{{ $tempOutbound->product->rack->name }}</td>
                          <td class="text-nowrap">@rupiah($tempOutbound->product->sale_price)</td>
                          <td class="text-nowrap">{{ $tempOutbound->quantity }}</td>
                          <td class="text-nowrap">@rupiah($tempOutbound->subtotal)</td>
                        </tr>
                        @endforeach
                        <tr>
                          <td colspan="4" class="align-top px-4 py-4">
                            <span class="ms-3">Customer : 
                              @if (!empty($tempOutbound->customer))
                                {{ $tempOutbound->customer->name }}
                              @else
                                <span class="text-primary">None</span>
                              @endif
                          </td>
                          <td class="text-end pe-3 py-4">
                            <p class="mb-0 pb-3">Grand Total:</p>
                          </td>
                          <td class="ps-2 py-4">
                            <p class="fw-semibold mb-0 pb-3">@rupiah($tempOutbound->sum('subtotal'))</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>
</div>
@endSection