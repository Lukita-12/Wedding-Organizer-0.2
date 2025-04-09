<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PaketPernikahan extends Model
{
    /** @use HasFactory<\Database\Factories\PaketPernikahanFactory> */
    use HasFactory;
    protected $table = 'paket_pernikahan';

    protected $guarded = [];

    // Relasi ke Kerjasama (vendor)
    public function venueUsaha()
    {
        return $this->belongsTo(Kerjasama::class, 'venue');
    }

    public function dekorasiUsaha()
    {
        return $this->belongsTo(Kerjasama::class, 'dekorasi');
    }

    public function tataRiasUsaha()
    {
        return $this->belongsTo(Kerjasama::class, 'tata_rias');
    }

    public function cateringUsaha()
    {
        return $this->belongsTo(Kerjasama::class, 'catering');
    }

    public function kuePernikahanUsaha()
    {
        return $this->belongsTo(Kerjasama::class, 'kue_pernikahan');
    }

    public function fotograferUsaha()
    {
        return $this->belongsTo(Kerjasama::class, 'fotografer');
    }

    public function entertainmentUsaha()
    {
        return $this->belongsTo(Kerjasama::class, 'entertainment');
    }

    // Pesanan eloquent-key
    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class);
    }

    // Custom paket pernikahan
    public function customerEkslusif()
    {
        return $this->belongsTo(User::class, 'custom_paket_for');
    }
}
