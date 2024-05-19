@extends('layouts.warehouse')

@section('section-warehouse')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-4">
                  <h5 class="card-header">Customer</h5>
                  <div class="card-body">
                    <div>
                      <label for="customer_id" class="form-label">Choose Customer</label>
                      <select name="customer_id" id="customer_id" class="form-control">
                        @foreach ($customers as $customer)
                          <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                      </select>
                      <div class="row">
                        <div class="col-md">
                          <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="radio" name="new_customer" id="customer_exist" checked>
                            <label class="form-check-label" for="customer_exist">Exist</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="new_customer" id="customer_not_exist">
                            <label class="form-check-label" for="customer_not_exist">Not Exist</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                  <h5 class="card-header">Product</h5>
                  <div class="card-body">
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

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Cart</h5>
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Project</th>
                              <th>Client</th>
                              <th>Users</th>
                              <th>Status</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                            <tr>
                              <td>
                                <i class="ti ti-brand-angular ti-lg text-danger me-3"></i> <strong>Angular Project</strong>
                              </td>
                              <td>Albert Cook</td>
                              <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                  </li>
                                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                  </li>
                                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                                  </li>
                                </ul>
                              </td>
                              <td><span class="badge bg-label-primary me-1">Active</span></td>
                              <td>
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-pencil me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash me-1"></i> Delete</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="ti ti-brand-react-native ti-lg text-info me-3"></i> <strong>React Project</strong>
                              </td>
                              <td>Barry Hunter</td>
                              <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                  </li>
                                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                  </li>
                                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                                  </li>
                                </ul>
                              </td>
                              <td><span class="badge bg-label-success me-1">Completed</span></td>
                              <td>
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-pencil me-2"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash me-2"></i> Delete</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><i class="ti ti-brand-vue ti-lg text-success me-3"></i> <strong>VueJs Project</strong></td>
                              <td>Trevor Baker</td>
                              <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                  </li>
                                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                  </li>
                                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                                  </li>
                                </ul>
                              </td>
                              <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                              <td>
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-pencil me-2"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash me-2"></i> Delete</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="ti ti-brand-bootstrap ti-lg text-primary me-3"></i>
                                <strong>Bootstrap Project</strong>
                              </td>
                              <td>Jerry Milton</td>
                              <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                  </li>
                                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                  </li>
                                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                                  </li>
                                </ul>
                              </td>
                              <td><span class="badge bg-label-warning me-1">Pending</span></td>
                              <td>
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-pencil me-2"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash me-2"></i> Delete</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endSection