<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index() 
    {
        $produk = Produk::get();

        return view('produk.index', ['data' => $produk]);
    }

    public function tambah()
    {
        $kategori = Kategori::get();

        return view('produk.form', ['kategori' => $kategori]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'kode_produk'=>$request->kode_produk,
            'nama_produk'=>$request->nama_produk,
            'id_kategori'=>$request->id_kategori,
            'harga'=>$request->harga,
            'jumlah'=>$request->jumlah,
        ];

        Produk::create($data);

        return redirect()->route('produk');
    }

    public function edit($id)
    {
        $produk = Produk::where('id', $id)->first();
        $kategori = Kategori::get();

        return view('produk.form', ['produk' => $produk, 'kategori' => $kategori]);
    }
    
    public function update($id, Request $request)
    {
        $data = [
            'kode_produk'=>$request->kode_produk,
            'nama_produk'=>$request->nama_produk,
            'id_kategori'=>$request->id_kategori,
            'harga'=>$request->harga,
            'jumlah'=>$request->jumlah,
        ];

        Produk::find($id)->update($data);

        return redirect()->route('produk');
    }
    public function hapus($id)
    {
        Produk::find($id)->delete();

        return redirect()->route('produk');
    }
}
