@extends('layouts.master')
@section('content')
<h2 class="mt-3 mb-3">Edit Data Produk</h2>
<div class="card p-3">
    <form action="/produk/{{$produks->id}}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label  class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
            value="{{$produks->nama}}" name="nama"placeholder="nama produk">
            @error('nama')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Harga Produk</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror"  
            value="{{$produks->harga}}" name="harga" placeholder="harga produk">
            @error('harga')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Deskripsi Produk</label>
            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"  
            value="{{$produks->deskripsi}}" name="deskripsi" placeholder="Deskripsi produk">
            @error('deskripsi')
                {{$message}}
            @enderror
        </div>
        <label  class="form-label">Kategori Produk</label>
        <select class="form-select" aria-label="Default select example" name="kategori_id" >
            @foreach ($kategoris as $item)
            @if ($produks->kategori_id == $item->id)
            <option value="{{$item->id}} " selected>{{$item->nama}}</option>
            @else
            <option value="{{$item->id}}">{{$item->nama}}</option>
            @endif
            @endforeach
        </select>
        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-primary btn-sm" type="submit">Simpan Data</button>
            <a href="{{url('produk')}}" class="btn btn-secondary btn-sm ms-3">Kembali</a>
        </div>
    </form>
</div>
@endsection