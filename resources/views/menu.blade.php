<div class="min-height-300 bg-primary position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 me-4" id="sidenav-main">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
          <img src="/icon/logopdam.png" class="navbar-brand-img h-100" alt="main_logo">
          {{-- <span class="ms-1 font-weight-bold">PDAM Surya Sembada</span> --}}
        </a>
      </div>
  
    
    <div class="horizontal dark mt-0  ">
      {{-- <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main"> --}}
  
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link {{set_active('admin.dashboard')}}" href="{{route('admin.dashboard')}}">
              <img  src="/icon/menuicon/dashboard.png" class="navbar-brand-img h-50 2em text-center me-2"
              style="max-height: 30px; max-width: 25px" alt="main_logo">
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          {{-- </li>{{ request()->routeIs('home') ? 'active' : '' }}" --}}
  
          <li class="nav-item ">
            <a class="nav-link {{set_active('admin.transaksi')}}" href="{{route('admin.transaksi')}}">
              <img  src="/icon/menuicon/transaksi.png" class="navbar-brand-img h-50 2em text-center me-2" alt="main_logo"
              style="max-height: 30px; max-width: 25px" >
              <span class="nav-link-text ms-1">Transaksi</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{set_active('admin.customers')}}" href="{{route('admin.customers')}}">
              <img  src="/icon/menuicon/customers.png" class="navbar-brand-img h-50 text-center me-2 " alt="main_logo"
              style="max-height: 30px; max-width: 25px">
              <span class="nav-link-text ms-1">Customers</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{set_active('admin.aset')}}" href="{{route('admin.aset')}}">
              <img  src="/icon/menuicon/aset.png" class="navbar-brand-img h-50 text-center me-2 " alt="main_logo"
              style="max-height: 30px; max-width: 25px">
              <span class="nav-link-text ms-1">Aset</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{set_active('admin.tipe')}}" href="{{route('admin.tipe')}}">
              <img  src="/icon/menuicon/tipe.png" class="navbar-brand-img h-50 text-center me-2 " alt="main_logo"
              style="max-height: 30px; max-width: 25px">
              <span class="nav-link-text ms-1">Tipe</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{set_active('admin.kategori')}}" href="{{route('admin.kategori')}}">
              <img  src="/icon/menuicon/kategori.png" class="navbar-brand-img h-50 text-center me-2" alt="main_logo"
              style="max-height: 30px; max-width: 25px">
              <span class="nav-link-text ms-1">Kategori</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link {{set_active('admin.admins')}}" href="{{route('admin.admins')}}">
              <img  src="/icon/menuicon/admin.png" class="navbar-brand-img h-50 text-center me-2" alt="main_logo"
              style="max-height: 30px; max-width: 25px">
              <span class="nav-link-text ms-1">Admin</span>
            </a>
          </li>

            <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.actionlogout')}}">
              <img src="/icon/menuicon/sign-out.png" class="navbar-brand-img h-50 text-center me-2 " alt="main_logo"
              style="max-height: 30px; max-width: 25px">
              <span class="nav-link-text ms-1">Sign Out</span>
            </a>
          </li>
  
          {{-- <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
          </li> --}}
        
        </ul>
      </div>
    </div>

  
      {{-- <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
          <img class="w-50 mx-auto" src="style/assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
          <div class="card-body text-center p-3 w-100 pt-0">
            <div class="docs-info">
              <h6 class="mb-0">Need help?</h6>
              <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
            </div>
          </div>
        </div>
        <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
        <a class="btn btn-primary btn-sm mb-0 w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div> --}}
    </aside>