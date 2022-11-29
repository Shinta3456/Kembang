<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Pemesanan extends Model
{
   protected $fillable =[
       'nama_penerima', 'alamat', 'nama_produk', 'jumlah_barang', 'metode_pembayaran', 'total_pembayaran'
];
}
