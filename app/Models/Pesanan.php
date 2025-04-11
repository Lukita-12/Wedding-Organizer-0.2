<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    /** @use HasFactory<\Database\Factories\PesananFactory> */
    use HasFactory;
    protected $table = 'pesanan';
    protected $guarded = [];
    protected $casts = [
        'tanggal_acara'      => 'datetime',
        'tanggal_diskusi'    => 'datetime',
        'tgl_pesanan'        => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paketPernikahan()
    {
        return $this->belongsTo(PaketPernikahan::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
