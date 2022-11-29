<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class produk extends Model
{
   protected $fillable =[
           'nama_barang', 'jenis_barang', 'harga'
   ];
}
