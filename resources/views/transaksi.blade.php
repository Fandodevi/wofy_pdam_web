

@extends('template')

@section('subjudul')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Transaksi</li>
  </ol>
  <h6 class="font-weight-bolder text-white mb-0">Transaksi</h6>
</nav>
@endsection

@section('content')

      <body class="bg-light">
        <main class="container">
            <!-- START DATA -->
            <div class="my-3 p-3 bg-body rounded shadow-sm">

                    <!-- FORM PENCARIAN -->
                    {{-- <div class="row g-3 align-items-center">
                      <div class="col-auto">
                        <form action="/transaksi" method="GET">
                          <input type="search" id="input" name="search" class="-control" aria-describedby="password">
                        </form>
                      </div>
                    </div> --}}
                    
                    <div class="col-md-3">
                      <div class="form-group">
                          <form action="/pdam/transaksi" method="GET">
                              <div class="input-group">
                              <input id="input" name="search" class="form-control"
                                   placeholder="Search...">
                              {{-- <button type="submit" class="btn btn-primary">Search </button> --}}
                              </div>
                          </form>
                      </div>
                  </div>
                    {{-- <div class="pb-2">
                      @if($message = Session::get('success'))
                       <div class="alert alert-succes" role="alert" >
                        {{$message}}
                       </div>
                      @endif
                    </div> --}}
                  
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead style="font-size: 10pt">
                            <tr style="background-color: rgb(196, 215, 243)">
                                <th class="col-md-1">Id</th>
                                <th class="col-md-1">Nama</th>
                                <th class="col-md-1">Email</th>
                                <th class="col-md-1">No Telepon</th>
                                <th class="col-md-1">Alamat</th>
                                <th class="col-md-1">Metode Bayar</th>
                                <th class="col-md-1">Total Waktu</th>
                                <th class="col-md-1">Total Harga</th>
                                <th class="col-md-1">Waktu Order</th>
                                <th class="col-md-2">Waktu Sewa</th>
                                <th class="col-md-2">Status Order</th>
                                <th class="col-md-2">Bukti bayar</th>
                                <th class="col-md-2">Status Pembayaran</th>
                                
                                {{-- <th class="col-md-2">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody class="table-bordered">
                          
                          @foreach ($data as $result)
                        <tr style="font-size: 10pt">
                          <td>{{$result->id}}</td>
                          <td>{{$result->name}}</td>
                          <td>{{$result->email}}</td>
                          <td>{{$result->number}}</td>
                          <td>{{$result->address}}</td>
                          <td>{{$result->method}}</td>
                          <td>{{$result->total_products}}</td>
                          <td>{{$result->total_price}}</td>
                          <td>{{$result->order_time}}</td>
                          <td>{{$result->event_time}}</td>
                          <td>{{$result->order_status}}</td>
                          <td>{{$result->proof_payment}}</td>
                          <td>{{$result->payment_status}}</td>
                         </tr>
                          @endforeach
                          

                        </tbody>
                    </table>
                    {{-- {{$result->links()}} --}}
                  </div>
              </div>
              <!-- AKHIR DATA -->
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
      </body>
@endsection

