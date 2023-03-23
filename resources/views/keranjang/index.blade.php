@extends('layouts.master')
<title>Keranjang</title>
@section('content')

@if (Session::has('delete'))
    <div class="alert alert-danger mt-3" role="alert">
        <i class="fa-solid fa-circle-check"></i> {{Session::get('delete')}} 
    </div>
@endif


<h2 class="mt-2 mb-3">Halaman Keranjang</h2>
            <div class="card p-3">
                <div class="row">
                    <div class="col-8">
                    <table class="table  overflow-auto"  >
                    <thead >
                        <tr>
                            <th class="col-xs-1">No</th>
                            <th class="col-xs-3">Nama Produk</th>
                            <th class="col-xs-2">Harga Produk</th>
                            <th class="col-xs-1">Jumlah</th>
                            <th class="col-xs-3">Total Harga</th>
                            <th class="col-xs-1">Update</th>
                            <th class="col-xs-1">Delete</th>
                        </tr>
                    </thead>
                    <?php
                        $total=0;
                    ?>
                    @foreach ($keranjangs as $item)

                    <tbody >
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->produk->nama}}</td>
                            <td>Rp. {{number_format($item->produk->harga)}},00</td>
                            <td>{{$item->jumlah}}</td>
                            <td>Rp.{{ number_format($item->produk->harga * $item->jumlah)}},00</td>
                            <td>
                                <a href="/keranjang/{{$item->id}}/edit" class="btn btn-primary btn-sm" >Edit </a>
                            </td>
                            <td>
                                <form action="/keranjang/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" 
                                    onclick="return confirm('yakin Ingin menghapus {{$item->produk->nama}}')" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                        $total += ($item->produk->harga * $item->jumlah);
                    ?>
                    @endforeach
                </table>
            </div>
            <div class="col-4">
                <div class="card " >
                    <h3 style="background-color: rgb(92, 91, 91);color:white;border-radius:5px 5px 0px 0px; text-align: center" class="p-3">Struk Pembelian</h3>
                    <table class="table " style="text-align: center;">
                        <div class="d-flex justify-content-center">
                            <th>Total Pembelian</th>
                            <td>Rp.{{number_format($total)}},00</td>
                            
                        </div>
                    </table>
                    <div class="d-flex justify-content-center mb-3">
                    <button class="btn btn-success">Lakukan Transaksi</button>
                </div>
                </div>    
            </div>
            </div>
            </div>
@endsection
