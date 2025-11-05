@extends('layout')
@section('body')
 <!--[ Main Content ] start-->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Tabler Icons</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">Icons</a></li>
                  <li class="breadcrumb-item" aria-current="page">Tabler Icons</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!--[ Main Content ] start-->
        <div class="row">
          <!--[ tabler-icon ] start-->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Tabler</h5>
                <p>Use icon with <code>&lt;i class="&lt;&lt; Copied code &gt;&gt;"&gt;</code> in you html code </p>
              </div>
              <div class="card-body text-center">
                <div class="row justify-content-center">
                  <div class="col-sm-6">
                    <input type="text" id="icon-search" class="form-control mb-4" placeholder="search . . " >
                  </div>
                </div>
                <div class="i-main" id="icon-wrapper"></div>
              </div>
            </div>
          </div>
          <!--[ tabler-icon ] end-->
        </div>
        <!--[ Main Content ] end-->
      </div>
    </div>
    <!--[ Main Content ] end-->
@endsection