<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    /** @use HasFactory<\Database\Factories\PembayaranFactory> */
    use HasFactory;
    protected $table = 'pembayaran';
    protected $guarded = [];
    protected $casts = [
        'tgl_pembayaran' => 'datetime',
    ];

    public function pesanan():BelongsTo
    {
        return $this->belongsTo(Pesanan::class);
    }
}
