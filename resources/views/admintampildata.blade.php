@extends('template')

@section('subjudul')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Admin</li>
  </ol>
  <h6 class="font-weight-bolder text-white mb-0">Admin</h6>
</nav>
@endsection

@section('content')
<body class="bg-light">
  <main class="container">
  <form action="/pdam/updatedata/{{$data->id}}" method='POST' enctype="multipart/form-data">
 
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        {{-- <div class="mb-3 row">
            <label for="idAdmin" class="col-sm-2  col-form-label">id</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='idAdmin' id="nim" value="{{$data->id}}" >
            </div>
        </div> --}}
       
        <div class="mb-3 row">
          <label for="jurusan" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name='name' id="jurusan" value="{{$data->name}}">
          </div>
          <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='email' id="jurusan" value="{{$data->email}}">
            </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name='password' id="jurusan" value="{{$data->password}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">No Telepon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='number' id="jurusan" value="{{$data->number}}">
            </div>
      </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
      </form>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
@endsection
  

  
