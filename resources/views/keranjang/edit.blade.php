@extends('layouts.master')
@section('content')
<h2 class="mt-3 mb-3">Tambah Data Produk</h2>
<div class="card p-3" style="width: 70%">
    <form action="/keranjang/{{$keranjangs->id}}" method="post" >
        @method('put')
        @csrf
        <div class="mb-3">
            <label  class="form-label">Nama Produk</label>
            <input type="text" class="form-control " value="{{$keranjangs->produk->nama}}"disabled>
            <input type="text" class="form-control " value="{{$keranjangs->produk_id}}" name="produk_id" hidden>

        </div>
        <div class="mb-3">
            <label  class="form-label">Deskripsi Produk</label>
            <input type="text" class="form-control " value="{{$keranjangs->produk->deskripsi}}" name="deskripsi"  disabled>
        </div>
        <div class="mb-3">
            <label  class="form-label">Harga Produk</label>
            <input type="number" class="form-control " value="{{$keranjangs->produk->harga}}" name="harga"  disabled>
        </div>
        <div class="mb-3">
            <label  class="form-label">Jumlah</label>
            <input type="number" class="form-control @error('jumlah') is-invalid @enderror"  
            value="{{$keranjangs->jumlah}}" name="jumlah" placeholder="Jumlah Produk yang ingin dibeli" >
        </div>
          @error('jumlah')
          <div class="text-danger">
            <p style="margin-top: -10px; font-size: .9em">Mohon isi kolom jumlah dengan benar</p>
        </div>            
          @enderror      
        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-primary btn-sm" type="submit">Simpan Ke Keranjang</button>
            <a href="/" class="btn btn-secondary btn-sm ms-3">Kembali</a>
        </div>
    </form>
</div>
@endsection
