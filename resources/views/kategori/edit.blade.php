@extends('layouts.master')
<title>Edit | Kategori</title>
@section('content')
    <h2>Tambah Kategori</h2>
    <div class="card mt-3 p-3 " style="width: 70%;">
        <form action="/kategori/{{$kategoris->id}}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <label  class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                 name="nama" value="{{$kategoris->nama}}" placeholder="Nama Kategori">
                @error('nama')
                    {{$message}}
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                <a href="/kategori" class="btn btn-secondary btn-sm ms-2">Kembali</a>
            </div>
        </form>
    </div>
@endsection