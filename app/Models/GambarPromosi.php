<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GambarPromosi extends Model
{
    /** @use HasFactory<\Database\Factories\GambarPromosiFactory> */
    use HasFactory;

    protected $table = 'gambar_promosi';
    protected $guarded = [];

    public function kerjasama(): BelongsTo
    {
        return $this->belongsTo(Kerjasama::class);
    }
}
