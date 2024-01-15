@extends('layouts.admin')

@section('section-admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-header border-bottom">
        <h5 class="card-title mb-3">List Warehouses</h5>
      </div>
      <div class="card-datatable table-responsive">
        <table class="table border-top" id="listWarehousesTable">
          <thead>
            <tr>
              <th></th>
              <th class="text-center">No</th>
              <th class="text-center">Warehouse</th>
              <th class="text-center">Category</th>
              <th class="text-center">Capacity</th>
              <th class="text-center">Facility</th>
              <th class="text-center">Rental Price</th>
              <th class="text-center">Surface Area</th>
              <th class="text-center">Building Area</th>
              <th class="text-center">City</th>
              <th class="text-center">Address</th>
              <th class="text-center">Description</th>
              <th class="text-center">Payment Duration</th>
              <th class="text-center">Registered By</th>
              <th class="text-center">Registered At</th>
              <th class="text-center">Status</th>
            </tr>
          </thead>
        </table>
      </div>

      <div
        class="offcanvas offcanvas-end"
        tabindex="-1"
        id="offcanvasAddUser"
        aria-labelledby="offcanvasAddUserLabel">
        <div class="offcanvas-header">
          <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Form Warehouse</h5>
          <button
            type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
          <form action="" method="POST" class="add-new-user pt-0" id="addNewAdminForm" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="name">Warehouse</label>
              <input
                type="text"
                class="form-control"
                placeholder="John Doe"
                aria-label="John Doe"
                id="name"
                name="name"
                value="{{ old('name') }}" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="warehouse_category_id">Category</label>
              <select name="warehouse_category_id" id="warehouse_category_id" class="form-control">
                @foreach ($warehouse_categories as $warehouse_category)
                  <option value="{{ $warehouse_category->id }}">{{ $warehouse_category->category }}</option>
                @endforeach
              </select>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="capacity">Capacity</label>
                <input
                  type="text"
                  id="capacity"
                  class="form-control"
                  name="capacity"
                  value="{{ old('capacity') }}" />
                  @error('capacity')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="facility">Facility</label>
                <input
                  type="text"
                  id="facility"
                  class="form-control"
                  name="facility"
                  value="{{ old('facility') }}" />
                  @error('facility')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="rental_price">Rental Price</label>
                <input
                  type="text"
                  id="rental_price"
                  class="form-control"
                  name="rental_price"
                  value="{{ old('rental_price') }}" />
                  @error('rental_price')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="surface_area">Surface Area</label>
                <input
                  type="text"
                  id="surface_area"
                  class="form-control"
                  name="surface_area"
                  value="{{ old('surface_area') }}" />
                  @error('surface_area')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="building_area">Building Area</label>
                <input
                  type="text"
                  id="building_area"
                  class="form-control"
                  name="building_area"
                  value="{{ old('building_area') }}" />
                  @error('building_area')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="city">City</label>
                <input
                  type="text"
                  id="city"
                  class="form-control"
                  name="city"
                  value="{{ old('city') }}" />
                  @error('city')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="address">Address</label>
              <textarea class="form-control" name="address" id="address" cols="10" rows="10">{{ old('address') }}</textarea>
            </div>
            <div class="mb-3">
              <label class="form-label" for="description">Description</label>
              <textarea class="form-control" name="description" id="description" cols="10" rows="10">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
              <label class="form-label" for="warehouse_image">Image</label>
              <input type="file" class="form-control" name="warehouse_image" id="warehouse_image">
            </div>
            <div class="mb-3">
              <label class="form-label" for="payment_time">Payment Duration</label>
              <select name="payment_time" id="payment_time" class="form-control">
                  <option value="daily">Daily</option>
                  <option value="monthly">Monthly</option>
                  <option value="yearly">Yearly</option>
              </select>
                @error('payment_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection