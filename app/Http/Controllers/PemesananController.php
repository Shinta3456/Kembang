<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
   public function index()
   {
       $Pemesanan = Pemesanan::all();
       return $Pemesanan;
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
        $table = Pemesanan::create([
            "nama_penerima" => $request->nama_penerima,
            "alamat" => $request->alamat,
            "nama_produk" => $request->nama_produk,
            "jumlah_barang" => $request->jumlah_barang,
            "metode_pembayaran" => $request->metode_pembayaran,
            "total_pembayaran" => $request->total_pembayaran
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
        $Pemesanan = Pemesanan::find($id);
        if ($Pemesanan) {
            return response()->json([
                'status' => 200,
                'data' => $Pemesanan
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
        $Pemesanan = Pemesanan::find($id);
        if($Pemesanan) {
            $Pemesanan->nama_penerima = $request->nama_penerima ? $request->nama_penerima : $Pemesanan->nama_penerima;
            $Pemesanan->alamat = $request->alamat ? $request->alamat : $Pemesanan->alamat;
            $Pemesanan->nama_produk = $request->nama_produk ? $request->nama_produk : $Pemesanan->nama_produk;
            $Pemesanan->jumlah_barang = $request->jumlah_barang ? $request->jumlah_barang : $Pemesanan->jumlah_barang;
            $Pemesanan->metode_pembayaran = $request->metode_pembayaran ? $request->metode_pembayaran : $Pemesanan->metode_pembayaran;
            $Pemesanan->total_pembayaran = $request->total_pembayaran ? $request->total_pembayaran : $Pemesanan->total_pembayaran;
            $Pemesanan->save();
            return response()->json([
                'status' => 200,
                'data' => $Pemesanan
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
        //
    }
}
