@extends('layouts.app')

@section('title', 'Form Produk')

@section('content')
<form action="{{ isset($produk) ? route('produk.tambah.update', $produk->id) : route('produk.tambah.simpan') }}" method="post">
    @csrf
<div class="row">
    <div class="col-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($produk) ? 'Form Edit Produk' : 'Form Tambah Produk' }}</h6>
        </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="kode_produk">Kode Produk</label>
                    <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="{{ isset($produk) ? $produk->kode_produk : '' }}">
                </div>
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ isset($produk) ? $produk->nama_produk : '' }}">
                </div>
                <div class="form-group">
                    <label for="id_kategori">Kategori Produk</label>
							<select name="id_kategori" id="id_kategori" class="custom-select">
								<option value="" selected disabled hidden>-- Pilih Kategori --</option>
								@foreach ($kategori as $row)
									<option value="{{ $row->id }}" {{ isset($produk) ? ($produk->id_kategori == $row->id ? 'selected' : '') : '' }}>{{ $row->nama }}</option>
								@endforeach
							</select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Produk</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ isset($produk) ? $produk->harga : '' }}">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Produk</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ isset($produk) ? $produk->jumlah : '' }}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
    </div>
</form>
@endsection