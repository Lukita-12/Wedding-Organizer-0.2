<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kerjasama extends Model
{
    /** @use HasFactory<\Database\Factories\KerjasamaFactory> */
    use HasFactory;
    protected $table = 'kerjasama';
    protected $guarded = [];

    public function requestMitra(): BelongsTo
    {
        return $this->belongsTo(RequestMitra::class);
    }

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function gambarPromosi(): HasMany
    {
        return $this->hasMany(GambarPromosi::class);
    }
}
