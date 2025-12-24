@extends('layouts.app')

@section('content')
<!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
<!-- [ Pre-loader ] End -->

  <div class="auth-main">
    <div class="auth-wrapper v3">
      <div class="auth-form">
        <div class="card my-4">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-end mb-4">
              <h3 class="mb-0"><b>Login</b></h3>
              <a href="{{Route('register')}}" class="link-primary">Don't have an account?</a>
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
             <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-group mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Email Address">
                  </div>
                  <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                  <div class="d-flex mt-1 justify-content-between">
                  </div>
                  <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary" value="login">Login</button>
                  </div>
               </form>
       <!-- Divider -->
                    <div class="text-center my-4 position-relative">
                        <span class="bg-white px-3 text-muted small">OR</span>
                        <hr class="position-absolute w-100 top-50 start-0">
                    </div>

                    <!-- Google Login -->
                    <div class="d-grid">
                        <a href="{{ route('google.login') }}"
                           class="btn btn-light border d-flex align-items-center justify-content-center gap-2">
                            <img src="{{ asset('assets/images/authentication/google.svg') }}" width="18">
                            <span>Login with Google</span>
                        </a>
                    </div>
          </div>
        </div>
       
        <div class="auth-footer row">
          <!-- <div class=""> -->
            <div class="col my-1">
              <p class="m-0">Copyright © <a href="#">CapyTeam</a></p>
            </div>
          <!-- </div> -->
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->
  <!-- Required Js -->
  <script src="../assets/js/plugins/popper.min.js"></script>
  <script src="../assets/js/plugins/simplebar.min.js"></script>
  <script src="../assets/js/plugins/bootstrap.min.js"></script>
  <script src="../assets/js/fonts/custom-font.js"></script>
  <script src="../assets/js/pcoded.js"></script>
  <script src="../assets/js/plugins/feather.min.js"></script>

  <script>layout_change('light');</script>
  
  <script>change_box_container('false');</script>
  
  
  
  <script>layout_rtl_change('false');</script>
  
  
  <script>preset_change("preset-1");</script>
  
  
  <script>font_change("Public-Sans");</script>
  
  
@endsection
