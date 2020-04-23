<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'tb_barang';

    protected $fillable = [
        'id',
        'id_barang',
        'nama_barang',
        'tgl',
        'harga_awal',
        'deskripsi_barang',
        'image',
    ];
}
