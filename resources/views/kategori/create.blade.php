@extends('layouts.master')
<title>Insert | Kategori</title>
@section('content')
<title>Insert | Kategori</title>
    <h2 class="mt-3">Tambah Kategori</h2>
    <div class="card mt-3 p-3 " style="width: 70%;">
        <form action="{{url('kategori')}}" method="post">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                 name="nama" value="{{old('nama')}}" placeholder="Nama Kategori">
                @error('nama')
                    {{$message}}
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-sm">Tambah Data</button>
                <a href="/kategori" class="btn btn-secondary btn-sm ms-2">Kembali</a>
            </div>
        </form>
    </div>
@endsection