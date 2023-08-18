@extends('layouts.app')

@section('title', 'Data Produk')

@section('content')
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
                        </div>
                        <div class="card-body">
                        @if (auth()->user()->level == 'Admin')
                            <a href="{{ route('produk.tambah') }}" class="btn btn-primary mb-3">Tambah Produk</a>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            @if (auth()->user()->level == 'Admin')
                                                <th>Aksi</th>
							                @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($no = 1)
                                        @foreach ($data as $row)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{ $row->kode_produk }}</td>
                                            <td>{{ $row->nama_produk }}</td>
                                            <td>{{ $row->kategori->nama }}</td>
                                            <td>{{ $row->harga }}</td>
                                            <td>{{ $row->jumlah }}</td>
                                                    @if (auth()->user()->level == 'Admin')
                                            <td>
                                                <a href="{{ route('produk.edit', $row->id) }}" class=" btn btn-warning">Edit</a>
                                                <a href="{{ route('produk.hapus', $row->id) }}" class=" btn btn-danger">Hapus</a>
                                            </td>
                                                    @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection