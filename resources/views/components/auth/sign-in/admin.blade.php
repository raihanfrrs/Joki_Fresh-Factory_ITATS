@extends('layouts.admin')

@section('authentication')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="d-flex flex-column justify-content-between">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="card card-default mb-0">
            <div class="card-header pb-0">
              <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                <a class="w-auto pl-0" href="{{ URL::current() }}">
                  <img src="{{ asset('asset/images/logos/logo-black.png') }}" alt="warehouse">
                </a>
              </div>
            </div>
            <div class="card-body px-5 pb-5 pt-0">

              <h4 class="text-dark mb-6 text-center">Sign In</h4>

              <form action="/sign-in/admin" method="POST">
                @csrf
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input type="text" class="form-control input-lg @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" required autocomplete="off">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group col-md-12 ">
                    <input type="password" class="form-control input-lg @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-pill mb-4">Sign In</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection