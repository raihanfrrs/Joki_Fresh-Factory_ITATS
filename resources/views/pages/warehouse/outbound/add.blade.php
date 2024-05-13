@extends('layouts.warehouse')

@section('section-warehouse')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                  <h5 class="card-header">Customer</h5>
                  <div class="card-body">
                    <div>
                      <label for="customer_id" class="form-label">Choose Customer</label>
                      <select name="customer_id" id="customer_id">
                        @foreach ($customers as $customer)
                          <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                  <h5 class="card-header">Product</h5>
                  <div class="card-body">
                    <div>
                      <label for="prodict_id" class="form-label">Choose Product</label>
                      <select name="product_id" id="prodict_id">
                        @foreach ($products as $product)
                          <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                      </select>
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
                      <div>
                        <label for="defaultFormControlInput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="defaultFormControlInput" placeholder="John Doe" aria-describedby="defaultFormControlHelp">
                        <div id="defaultFormControlHelp" class="form-text">
                          We'll never share your details with anyone else.
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endSection