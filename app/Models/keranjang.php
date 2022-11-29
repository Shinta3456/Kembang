<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    protected $fillable =[
        'nama_barang', 'jumlah_barang', 'total_harga'
];
}
