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

{{-- <style>
    .centered {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50vh
    }
</style> --}}

@section('content')

    <body class="bg-light">
        <main class="container">
            <form action="/pdam/asetupdatedata/{{ $data->id}}" method='POST' enctype="multipart/form-data">
                @csrf
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <div class="col-sm-10">
                            <div class="centered">
                                @if ($data->image)
                                    <img src="{{ asset('product/' . $data->image) }}" alt=""
                                        style="max-height: 450px; max-width: 450px">
                                @else
                                    <h3>Tidak Ada Gambar</h3>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row" style="display: none">
                        <label for="idAset" class="col-sm-2  col-form-label">id Aset</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id' id="nim"
                                value="{{ $data->id }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='name' id="nama"
                                value="{{ $data->name }}">
                        </div>
                    </div>
{{-- 
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='deskripsi' id="nama"
                                value="{{ $data->deskripsi }}">
                        </div>
                    </div> --}}

                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='keterangan' id="jurusan"
                                value="{{ $data->keterangan }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">Tipe</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="tipe">
                                <option value=""><b>--PILIH TIPE--</b></option>
                                @if($tipe->count()> 0)
                                @foreach ($tipe as $tipes)
                                    <option value="{{ $tipes->nama }}" {{$tipes->nama == $data->tipe ? 'selected' : ''}}>{{ $tipes->nama }}</option>
                                @endforeach
                                @else
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">Tipe Bangunan</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="category">
                                <option value=""><b>--PILIH KATEGORI--</b></option>
                                 @if($kategori->count()> 0)
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->nama}}" {{$item->nama == $data->category ? 'selected' : ''}}>{{ $item->nama }}</option>
                                @endforeach
                                @else
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='price' id="jurusan"
                                value="{{ $data->price }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="image" class="col-sm-2 col-form-label">Unggah Gambar</label>
                        <div class="col-sm-10">
                        <img class="img-preview img-fluid">
                            <input class="form-control" name="image" type="file" id="image" onchange="preImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
                    </div>
            </form>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
         <script>
            function preImage() {
                const image = document.querySelector('#image');
                const imgPre = document.querySelector('.img-preview');

                imgPre.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPre.src = oFREvent.target.result;
                }
            }
        </script>
    </body>
@endsection
