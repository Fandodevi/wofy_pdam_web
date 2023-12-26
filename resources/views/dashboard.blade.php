
@extends('template')
@section('subjudul')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>
@endsection
@section('content')


    {{-- Bagian atas jumlah --}}
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card" >
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Transaksi</p>
                    {{-- <a href="{{ route('admin.transaksi') }}">
                    <h5 class="font-weight-bolder">
                      {{$jumlah_transaksi}}
                    </h5></a> --}}
                    {{-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+55%</span>
                      since yesterday
                    </p> --}}
                  </div>
                </div>

                <div class="col-4 text-end">

                  {{-- <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle"> --}}
                    <img  src="/icon/menuicon/transaksi.png" class="icon icon-shape icon-sm">
                    {{-- <img  src="/icon/menuicon/transaksi.png" class="navbar-brand-img h-50 text-center me-2 d-flex align-items-center justify-content-center" alt="main_logo"> --}}
                 
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers" >
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Customers</p>
                    {{-- <a href="{{ route('admin.PageCustomers') }}">
                    <h5 class="font-weight-bolder">
                      {{$jumlah_cust}}
                    </h5> </a> --}}
                    {{-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+3%</span>
                      since last week
                    </p> --}}
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Aset</p>
                    {{-- <a href="{{ route('admin.PageAset') }}">
                    <h5 class="font-weight-bolder">
                      {{$jumlah_aset}}
                    </h5> </a> --}}
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        {{-- <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Aset</p>
                    <h5 class="font-weight-bolder">
                      $103,430
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
   
      
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-9">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize">Grafik Penyewaan</h6>
              {{-- <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 2021
              </p> --}}
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
       
        {{-- <div class="col-lg-5">
          <div class="card z-index-9 h-100">
              <div class="card-header">
                <img src="/icon/Pose.png" style="max-height: 300px; max-width: 400px; justify-content: center; background-size: cover; align-items: center;" >
              </div>
              </div>
            </div>
          </div>
        </div> --}}

        <div class="col-lg-5" >
          <div class="card z-index-9 h-100 d-flex justify-content-center align-items-center">
            <div class="card-header" >
              <img src="/icon/Pose.png" style="max-height: 300px; max-width: 400px; object-fit: cover;" >
              <p class="text-center text-black">Selamat datang admin!!</p>
            </div>
          </div>
        </div>
        
          @endsection

       