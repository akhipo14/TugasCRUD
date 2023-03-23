@extends('layouts.master')
<title>Home</title>
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-success mt-3" role="alert">
        <i class="fa-solid fa-circle-check"></i> {{Session::get('success')}} 
      </div>
          
    @endif

<div class="pembungkus-kartu" >


        @foreach ($produks as $item)

                <div class="kartu"  >
                    <div class="gambar">
                        <img src="/img/1.png" alt="">
                    </div>
                    <div class="nama">
                        <h4>{{$item->nama}}</h4>
                    </div>
                    <div class="deskripsi">
                        <p>{{$item->deskripsi}}</p>
                    </div>
                    <div class="harga">
                        <h4>Rp.{{$item->harga}}</h4>
                    </div>
                    <div class="keranjang ">
                        <a href="/keranjang/{{$item->id}}">Tambah ke Keranjang</a>
                    </div>
                </div>
        @endforeach
    </div>

@endsection
