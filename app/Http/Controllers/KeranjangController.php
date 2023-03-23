<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('keranjang.index',[
            'keranjangs'=>Keranjang::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keranjang/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'produk_id'=>'required',
            'jumlah'=>'required|integer|min:1'
        ]);
        $cek=Keranjang::where('produk_id',$request->produk_id)->first();
        //cek apakah produk udah ada di keranjang
        if($cek){
        //kalau misalkan produk udah ada update jumlah produk yang ada di keranjang
        Keranjang::where('id',$cek->id)->update(['jumlah'=>$cek->jumlah + $request->jumlah]);
        //kalau tidak ada berarti tambahkan produk ke keranjang      
        }else{
            Keranjang::create($validatedData);
        }
        return redirect('/')->with('success','Data berhasil masuk keranjang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('keranjang.create',[
            'produks'=>Produk::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('keranjang.edit',[
            'keranjangs'=>Keranjang::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'produk_id'=>'required',
            'jumlah'=>'required|integer|min:1'
        ]);


    Keranjang::where('id',$id)->update($validatedData);
    return redirect('keranjang')->with('update','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Keranjang::destroy($id);
        return redirect('/keranjang')->with('delete','berhasil hapus data keranjang!');
    }
}
