<form action="{{ route('master.warehouse.update', $warehouse->id) }}" method="POST" class="row g-3">
    @csrf
    @method('PATCH')
    <div class="col-12 col-md-6">
      <label class="form-label" for="name">Warehouse</label>
      <input
        type="text"
        id="name"
        name="name"
        class="form-control"
        value="{{ old('name', $warehouse->name) }}" 
        required/>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 col-md-6">
      <label class="form-label" for="warehouse_category_id">Category</label>
      <select name="warehouse_category_id" id="warehouse_category_id" class="form-select">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('warehouse_category_id', $warehouse->warehouse_category_id) == $category->id ? 'selected' : '' }}>{{ $category->category }}</option>
        @endforeach
      </select>
        @error('warehouse_category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 col-md-12">
        <label class="form-label" for="facility">Facility</label>
        <input
          type="text"
          id="facility"
          name="facility"
          class="form-control"
          value="{{ old('facility', $warehouse->facility) }}" 
          required/>
          @error('facility')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
    </div>
    <div class="col-12 col-md-4">
        <label class="form-label" for="capacity">Capacity</label>
        <div class="input-group input-group-merge">
            <input type="text" id="capacity" name="capacity" class="form-control" placeholder="300" required value="{{ old('capacity', $warehouse->capacity) }}">
            <span class="input-group-text">m<sup>3</sup></span>
            @error('capacity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-4">
        <label class="form-label" for="surface_area">Surface Area</label>
        <div class="input-group input-group-merge">
            <input type="text" id="surface_area" name="surface_area" class="form-control" placeholder="300" required value="{{ old('surface_area', $warehouse->surface_area) }}">
            <span class="input-group-text">m<sup>2</sup></span>
            @error('surface_area')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-4">
        <label class="form-label" for="building_area">Building Area</label>
        <div class="input-group input-group-merge">
            <input type="text" id="building_area" name="building_area" class="form-control" placeholder="300" required value="{{ old('building_area', $warehouse->building_area) }}">
            <span class="input-group-text">m<sup>2</sup></span>
            @error('building_area')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-12">
        <label class="form-label" for="city">City</label>
        <input
          type="text"
          id="city"
          name="city"
          class="form-control"
          value="{{ old('city', $warehouse->city) }}" 
          required/>
          @error('city')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="address">Address</label>
        <textarea class="form-select" name="address" id="address" cols="30" rows="10" required>{{ old('address', $warehouse->address) }}</textarea>
        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="description">Description</label>
        <textarea class="form-select" name="description" id="description" cols="30" rows="10" required>{{ old('address', $warehouse->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 text-center">
      <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
      <button
        type="reset"
        class="btn btn-label-secondary"
        data-bs-dismiss="modal"
        aria-label="Close">
        Cancel
      </button>
    </div>
</form>