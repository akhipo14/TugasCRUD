@extends('layouts.master')
<title>Kategori</title>
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

<h2 class="mt-3">Halaman Kategori</h2>
<a href="kategori/create" class="btn btn-primary mb-3 btn btn-sm">Tambah Kategori</a>
<div class="card p-3 ">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama kategori</th>
                <th>tgl create kategori</th>
                <th>Tgl update kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
            @foreach ($kategoris as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->updated_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td>
                    <form action="kategori/{{$item->id}}" method="post">
                        <a href="/kategori/{{$item->id}}/edit" class="btn btn-primary btn-sm">edit</a>
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