@extends('layouts.master')
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success mt-3" role="alert">
        <i class="fa-solid fa-circle-check"></i> {{Session::get('success')}} 
    </div>
@endif

@if (Session::has('update'))
    <div class="alert alert-primary mt-3" role="alert">
      <i class="fa-solid fa-circle-check"></i> {{Session::get('update')}} 
    </div>
@endif

@if (Session::has('delete'))
    <div class="alert alert-danger mt-3" role="alert">
        <i class="fa-solid fa-circle-check"></i> {{Session::get('delete')}} 
    </div>
@endif
        

    <h2 class="mt-3">Halaman Produk</h2>
    <a href="produk/create" class="btn btn-primary mb-3 btn btn-sm">Tambah Data Produk</a>
    <div class="card p-3 ">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama produk</th>
                    <th>Harga produk</th>
                    <th>Deskripsi Produk</th>
                    <th>Kategori produk</th>
                    <th>Tgl update produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
                @foreach ($produks as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->harga}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td>{{$item->kategori->nama}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>
                        <form action="/produk/{{$item->id}}" method="post">
                            <a href="produk/{{$item->id}}/edit" class="btn btn-primary btn-sm">edit</a>
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('ingin menghapus data ?')" type="submit">hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
@endsection
