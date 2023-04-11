<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produk</title>
 
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-5">
                <div class="card-body">
                    <a href="{{url('/halproduk')}}" class="btn btn-secondary"><< Kembali</a>
<h3 class="text-center">Edit Produk</h3>
 <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
    @csrf 
    @foreach ($data as $data)
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-0 row">
                <label for="nama" class="col-sm-4 col-form-label">Nama produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama" value="{{$data->nama}}">
                    <input type="hidden" class="form-control" name='id' id="id" value="{{$data->id}}">
                </div>
            </div>
            <div class="mb-0 row">
                <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='deskripsi' id="deskripsi" value="{{$data->deskripsi}}">
                </div>
            </div>
             <div class="mb-0 row">
                <label for="deskripsi" class="col-sm-4 col-form-label">harga</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='harga' id="harga" value="{{$data->harga}}">
                </div>
            </div>
            <div class="mb-0 row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
            @endforeach
          </form>
        </div>
</body>
</html>
