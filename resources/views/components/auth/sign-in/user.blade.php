@extends('layouts.tenant')

@section('authentication')
<div class="unix-login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-3">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="index.html"><span>LOGO</span></a>
                    </div>
                    <div class="login-form">
                        <h4>Tenant Sign In</h4>
                        <form action="/sign-in/tenant" method="POST">
                            @csrf
                            <div class="form-group">
                                <label id="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" required autocomplete="off">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label id="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-flat m-b-15 m-t-15">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection