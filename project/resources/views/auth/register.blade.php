@extends('layouts.app')

@section('content')

<div class="auth-main">
    <div class="auth-wrapper v3">
        <div class="auth-form">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-end mb-2">
                        <h3 class="mb-0"><b>Sign up</b></h3>
                        <a href="{{ route('login') }}" class="link-primary" style="font-size:16px;">Already have an account?</a>
                    </div>

                    <!-- HIỂN THỊ LỖI CHUNG -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group mb-1">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" 
                                   value="{{ old('name') }}" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Name" required>

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-1">
                            <label class="form-label">Email Address*</label>
                            <input type="email" name="email" 
                                   value="{{ old('email') }}" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   placeholder="Email Address" required>

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="Password" required>

                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" 
                                   class="form-control" 
                                   placeholder="Confirm Password">
                        </div>

                        <p class="mt-2 text-sm text-muted">
                            By Signing up, you agree to our 
                            <a href="#" class="text-primary">Terms of Service</a> 
                            and 
                            <a href="#" class="text-primary">Privacy Policy</a>.
                        </p>

                        <div class="d-grid mt-1">
                            <button type="submit" class="btn btn-primary">Create Account</button>
                        </div>

                    </form>

                    <!-- <div class="saprator mt-1">
                        <span>Sign up with</span>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="d-grid">
                                <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                                    <img src="../assets/images/authentication/google.svg"> 
                                    <span class="d-none d-sm-inline-block"> Google</span>
                                </button>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="d-grid">
                                <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                                    <img src="../assets/images/authentication/facebook.svg"> 
                                    <span class="d-none d-sm-inline-block"> Facebook</span>
                                </button>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
