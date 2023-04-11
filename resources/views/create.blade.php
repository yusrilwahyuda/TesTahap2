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
<h3 class="text-center">Tambah Produk</h3>
 <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
    @csrf 
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-0 row">
                <label for="nama" class="col-sm-4 col-form-label">Nama produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama">
                </div>
            </div>
            <div class="mb-0 row">
                <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='deskripsi' id="deskripsi">
                </div>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori">
                @foreach ($kategori as $kategori)
                    <option value="{{$kategori->id}}">
                        {{$kategori->kategori}}
                    </option>
                @endforeach
                </select>
            </div>
            <div class="mb-0 row">
                <label for="warna" class="col-sm-4 col-form-label">Warna</label>
                <div class="col-sm-10">
                    @foreach($data as $warna)
                        <input type="checkbox" name="warna[]" value="<?=$warna['warna']?>"><?=$warna['warna']?>
                    @endforeach
                </div>
            </div>
            <div class="mb-0 row">
                <label for="warna" class="col-sm-4 col-form-label">Ukuran</label>
                <div class="col-sm-10">
                    @foreach($ukuran as $ukuran)
                        <input type="checkbox" name="ukuran[]" value="<?=$ukuran['ukuran']?>"><?=$ukuran['ukuran']?>
                    @endforeach
                </div>
            </div>
            <div class="mb-0 row">
                <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='harga' id="harga">
                </div>
            </div>
            <div class="form-group">
                <label>Gambar</label><br>
                <input type="file" name="gambar">
            </div>
            <div class="mb-0 row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
          </form>
        </div>
</body>
</html>
