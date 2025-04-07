<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kerjasama extends Model
{
    /** @use HasFactory<\Database\Factories\KerjasamaFactory> */
    use HasFactory;
    protected $table = 'kerjasama';
    protected $guarded = [];
    protected $casts = [
        'harga01' => 'decimal:2',
        'harga02' => 'decimal:2',
    ];

    public function requestMitra(): BelongsTo
    {
        return $this->belongsTo(RequestMitra::class);
    }

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }

    // public function paketPernikahan(): BelongsToMany
    // {
    //     return $this->belongsToMany(PaketPernikahan::class, 'paket_pernikahan_kerjasama');
    // }
}
