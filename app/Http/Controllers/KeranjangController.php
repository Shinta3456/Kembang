<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keranjang;

class KeranjangController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $keranjang = keranjang::all();
       return $keranjang;
   }
 
   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       //
   }
/**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $table = keranjang::create([
            "nama_barang" => $request->nama_barang,
            "jumlah_barang" => $request->jumlah_barang,
            "total_harga" => $request->total_harga
        ]);
  
        return response()->json([
            'succes' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $table
        ], 201);
    }
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keranjang = keranjang::find($id);
        if ($keranjang) {
            return response()->json([
                'status' => 200,
                'data' => $keranjang
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas ' . $id . ' tidak ditemukan'
            ], 400);
        }
    }
  
    /**
 * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $keranjang = keranjang::find($id);
        if($keranjang) {
            $keranjang->nama_barang = $request->nama_barang ? $request->nama_barang : $keranjang->nama_barang;
            $keranjang->jumlah_barang = $request->jumlah_barang ? $request->jumlah_barang : $keranjang->jumlah_barang;
            $keranjang->total_harga = $request->total_harga ? $request->total_harga : $keranjang->total_harga;
            $keranjang->save();
            return response()->json([
                'status' => 200,
                'data' => $keranjang
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => $id . ' tidak ditemukan'
            ], 404);
        }
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keranjang = keranjang::where('id', $id)->first();
        if($keranjang){
            $keranjang->delete();
            return response()->json([
                'status' => 200,
                'data' => $keranjang
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . ' tidak ditemukan'
            ], 404);
        }
    }
 }