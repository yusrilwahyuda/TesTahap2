<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warna;
use App\Models\Ukuran;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class API_Produk extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getdata()
    {
        return Produk::all();
    }


    public function show($id)
    {
        return Produk::where('id',$id)->get();
    }

    public function destroy($id)
    {
        return Produk::where('id',$id)->delete();
    }
}
