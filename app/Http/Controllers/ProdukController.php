<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warna;
use App\Models\Ukuran;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if(strlen($katakunci)){
            $data = DB::table('produks')->join('kategoris','produks.kategori','=','kategoris.id')->select('produks.id','produks.nama', 'produks.warna','produks.ukuran','produks.ukuran', 'produks.gambar', 'produks.harga','kategoris.kategori')->where('produks.nama','like', "%$katakunci%")->paginate(5);
        }else{
            $data = DB::table('produks')->join('kategoris','produks.kategori','=','kategoris.id')->select('produks.nama','produks.id', 'produks.warna','produks.ukuran','produks.ukuran', 'produks.gambar', 'produks.harga','kategoris.kategori')->paginate(5);
        }
        return view('halproduk', compact('data'));
    }

    public function create()
    {
        $data = Warna::all();
        $ukuran = Ukuran::all();
        $kategori =Kategori::all();
        return view('create',compact('data','ukuran','kategori'));
    }

    public function store(Request $request)
    {
        if(!empty($request->warna)){
            $cekwarna = join(',',$request->warna);
        }else{
            $cekwarna ='';
        }
        if(!empty($request->ukuran)){
            $cekukuran = join(',',$request->ukuran);
        }else{
            $cekukuran ='';
        }
        
        $file = $request->file('gambar');
        $tujuan_upload = 'gambar_produk';

        $file->move($tujuan_upload,$file->getClientOriginalName());
        $data =  [
            'nama'=>$request->nama,
            'deskripsi'=>$request->deskripsi,
            'kategori'=>$request->kategori,
            'warna'=>$cekwarna,
            'ukuran'=>$cekukuran,
            'harga'=> $request->harga,
            'gambar'=> $file->getClientOriginalName(),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
            
        ];
        Produk::create($data);
        return redirect()->to('halproduk');
    }

    public function edit($id)
    {
        $data = Produk::where('id', $id)->get();
        return view('editproduk', compact('data'));
    }

    public function update(Request $request)
    {   
        $produk = Produk::where('id', $request->id)->update([
            'nama'         => $request->nama,
            'deskripsi'    => $request->deskripsi,
            'harga'        => $request->harga,
            'updated_at'   => date("Y-m-d H:i:s")
        ]);
        return redirect()->to('halproduk');
    }

    public function destroy($id)
    {
        Produk::where('id',$id)->delete();
        return redirect()->to('halproduk');
    }

    public function hal_awal()
    {
        return view('hal_awal');
    }
}
