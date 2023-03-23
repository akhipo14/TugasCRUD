@extends('layouts.master')
@section('content')
<h2 class="mt-3 mb-3">Tambah Data Produk</h2>
      

<div class="card p-3" style="width: 70%">
    <form action="{{url('produk')}}" method="post" >
        @csrf
        <div class="mb-3">
            <label  class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
            value="{{old('nama')}}" name="nama"placeholder="nama produk">
            @error('nama')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Harga Produk</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror"  
            value="{{old('harga')}}" name="harga" placeholder="harga produk">
            @error('harga')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Deskripsi Produk</label>
            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"  
            value="{{old('deskripsi')}}" name="deskripsi" placeholder="Deskripsi produk">
            @error('deskripsi')
                {{$message}}
            @enderror
        </div>
        <label  class="form-label">Kategori Produk</label>
        <select class="form-select" aria-label="Default select example" name="kategori_id" >
            @foreach ($kategoris as $item)
            @if (old('kategori_id') == $item->id)
            <option value="{{$item->id}} " selected>{{$item->nama}}</option>
            @else
            <option value="{{$item->id}}">{{$item->nama}}</option>
            @endif
            @endforeach
        </select>
        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-primary btn-sm" type="submit">Tambah Data</button>
            <a href="{{url('produk')}}" class="btn btn-secondary btn-sm ms-3">Kembali</a>
        </div>
    </form>
</div>
@endsection