@extends('layouts.master')
@section('content')
<h2 class="mt-3 mb-3">Tambah Data Produk</h2>
<div class="card p-3"  style="width:70%;">
    <div class="row">
    <div class="gambarr  col-4">
        <img src="/img/1.png" alt="">
    </div>

    <div class="col-8">
        <form action="{{url('keranjang')}}" method="post"  >
            @csrf
            <div class="mb-3">
                <label  class="form-label">Nama Produk</label>
                <input type="text" class="form-control " value="{{$produks->nama}}"disabled>
                <input type="text" class="form-control " value="{{$produks->id}}" name="produk_id" hidden>

            </div>
            <div class="mb-3">
                <label  class="form-label">Deskripsi Produk</label>
                <input type="text" class="form-control " value="{{$produks->deskripsi}}" name="deskripsi"  disabled>
            </div>
            <div class="mb-3">
                <label  class="form-label">Harga Produk</label>
                <input type="number" class="form-control " value="{{$produks->harga}}" name="harga"  disabled>
            </div>
            <div class="mb-3">
                <label  class="form-label">Jumlah</label>
                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"  
                value="" name="jumlah" placeholder="Jumlah Produk yang ingin dibeli" >
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
</div>
</div>
@endsection
