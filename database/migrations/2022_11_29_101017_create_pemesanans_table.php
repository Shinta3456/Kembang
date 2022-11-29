<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
class CreatePemesanansTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('pemesanans', function (Blueprint $table) {
           $table->id();
           $table->string('nama_penerima');
           $table->string('alamat');
           $table->string('nama_produk');
           $table->integer('jumlah_barang');
           $table->string('metode_pembayaran');
           $table->integer('total_pembayaran');
           $table->timestamps();
       });
   }
 
   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
       Schema::dropIfExists('pemesanans');
   }
}
