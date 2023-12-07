<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $fillable = [
        'coustumer_id',
        'kendaraan_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'harga',
        'status',
    ];

    public function coustumer()
    {
        return $this->belongsTo(coustumer::class, 'coustumer_id');
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }
}
