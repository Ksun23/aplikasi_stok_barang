<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangRusak extends Model
{
    protected $fillable = ['barang_id', 'jumlah_rusak'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
