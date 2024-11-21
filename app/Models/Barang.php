<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'harga_barang',
        'stok_barang',
        'deskripsi_barang',
        'gambar_barang',
        'kategori_id', // Tambahkan kategori_id ke fillable
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function barangRusak()
    {
        return $this->hasOne(BarangRusak::class);
    }
}
