<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produk.index',[
            'produks'=>Produk::latest('updated_at')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create',[
            'kategoris'=>Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required',
            'harga'=>'required|numeric',
            'deskripsi'=>'required|max:50',
            'kategori_id'=>'required'
        ]);

        Produk::create($validatedData);
        return redirect('/produk')->with('success','Berhasil Menambah Produk');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('produk.edit',[
            'produks'=>Produk::find($id),
            'kategoris'=>kategori::all()
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama'=>'required|max:50|string',
            'harga'=>'required|numeric',
            'kategori_id'=>'required',
            'deskripsi'=>'required|max:50',
        
        ]);

        Produk::where('id',$id)->update($validatedData);
        return redirect('produk')->with('update','Berhasil Mengedit Produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Produk::destroy($id);
        return redirect('produk')->with('delete','Berhasil Menghapus Produk');
    }


}
