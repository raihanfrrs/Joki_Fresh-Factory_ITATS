<div class="modal fade" id="modal-add-admin" tabindex="-1" role="dialog" aria-labelledby="modalAddAdmin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="/" method="POST" enctype="multipart/form-data" id="admin-form">
                @csrf
                <div class="modal-header px-4">
                    <h5 class="modal-title">Create New Admin</h5>
                </div>
                <div class="modal-body px-4">

                    <div class="form-group row mb-6">
                        <label for="image" class="col-sm-4 col-lg-2 col-form-label">Admin Image</label>
                        <div class="col-sm-8 col-lg-10">
                            <div class="custom-file mb-1">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="image" required>
                                <label class="custom-file-label" for="image">Choose file...</label>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fullName">Fullname</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="fullName" placeholder="John Doe" required autocomplete="off" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div id="name" class="text-danger error-messages"></div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group mb-4">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="JohnDoe123" required autocomplete="off" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div id="username" class="text-danger error-messages"></div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div id="password" class="text-danger error-messages"></div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="johndoe123@example.com" required autocomplete="off" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div id="email" class="text-danger error-messages"></div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" required autocomplete="off" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div id="phone" class="text-danger error-messages"></div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="pob">Place of Birth</label>
                                <input type="text" class="form-control @error('pob') is-invalid @enderror" name="pob" id="pob" required autocomplete="off" value="{{ old('pob') }}">
                                @error('pob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div id="pob" class="text-danger error-messages"></div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob" required autocomplete="off" value="{{ old('dob') }}">
                                @error('dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div id="dob" class="text-danger error-messages"></div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label>Gender</label>
                                <div class="custom-control custom-radio d-inline-block ml-5 mr-3 mb-3">
                                    <input type="radio" id="male" name="gender" class="custom-control-input" checked value="male">
                                    <label class="custom-control-label" for="male">Male</label>
                                </div>
                                  
                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                    <input type="radio" id="female" name="gender" class="custom-control-input" value="female">
                                    <label class="custom-control-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="address">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" rows="3" name="address" autocomplete="off" required></textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div id="address" class="text-danger error-messages"></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-smoke btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-pill" id="admin-form-btn">Save Contact</button>
                </div>
            </form>
        </div>
    </div>
</div>