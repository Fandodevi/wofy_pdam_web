@extends('template')

@section('subjudul')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Aset</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Aset</h6>
    </nav>
@endsection

@section('content')

    <body class="bg-light">
        <main class="container">
            <!-- START DATA -->
            <div class="my-3 p-3 bg-body rounded shadow-sm">

                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-2">
                    <a href='asettambah' class="btn btn-primary">+ Tambah Data</a>
                </div>

                <!-- FORM PENCARIAN -->
              
                <div class="col-md-3">
                    <div class="form-group">
                        <form action="/pdam/aset" method="GET">
                            <div class="input-group">
                            <input id="input" name="search" class="form-control"
                                 placeholder="Search...">
                                </div>
                                {{-- <button class="btn btn-success">Cari</button> --}}
                        </form>
                    </div>
                </div>
                
                <div class="pb-2">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-succes" role="alert">
                            {{ $message }}
                        </div>
                    @endif
                </div>

                {{-- "table table-bordered dataTable" --}}
             <div class="table-responsive p-0">
                <table class="table align-items-center mb-0"  >
                    <thead style="font-size: 10pt">
                        <tr style="background-color: rgb(196, 215, 243)">
                            <th class="col-md-2">id</th>
                            <th class="col-md-2">Gambar</th>
                            <th class="col-md-1">Nama Aset</th>
                            <th class="col-md-1">Kategori</th>
                            <th class="col-md-1">Tipe</th>
                            <th class="col-md-2">Alamat</th>
                            <th class="col-md-1">Harga</th>
                            <th class="col-md-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered dataTable">
                        {{-- @if($data->count() > 0) --}}
                        @foreach ($data as $item)
                            <tr style="font-size: 10pt">
                                <td>{{ $item->id }}</td>
                                <td><img src="{{ asset('product/'. $item->image) }}" alt="Gambar"width="100" height="auto"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->tipe }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <a href="/pdam/asettampildata/{{ $item->id }}"  >
                                        <img src="/icon/menuicon/edit.png" style="max-height: 20px; max-width: 20px">
                                    </a>
                                    <a href="/pdam/asetdelete/{{ $item->id }}"  >
                                        <img src="/icon/menuicon/delete.png" style="max-height: 20px; max-width: 20px">
                                    </a>
                                    {{-- <a href="/pdam/asettampildata/{{ $item->idAset }}" class="btn btn-success btn-sm">Edit</a>
                                    <a href="/pdam/asetdelete/{{ $item->idAset }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                </td>
                            </tr>
                        @endforeach
                        {{-- @else
                                <p>Tidak ada data.</p>
                            @endif --}}
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
            </div>
            <!-- AKHIR DATA -->
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
    </body>
@endsection
