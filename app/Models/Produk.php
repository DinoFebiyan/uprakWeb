<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'jenis_produk_id',
    ];

    // Relasi ke JenisProduk (Many-to-One)
    public function jenisProduk()
    {
        return $this->belongsTo(JenisProduk::class);
    }
}
