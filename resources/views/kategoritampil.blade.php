@extends('template')

@section('subjudul')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kategori</li>
  </ol>
  <h6 class="font-weight-bolder text-white mb-0">Kategori</h6>
</nav>
@endsection

@section('content')
<body class="bg-light">
  <main class="container">
<form action="/pdam/kategoriupdatedata/{{$data->id}}" method='POST' enctype="multipart/form-data">
 
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        {{-- <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id' id="nama" value="{{$data->idKategori}}">
            </div>
        </div> --}}
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' id="jurusan" value="{{$data->nama}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
@endsection
  

  
