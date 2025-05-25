<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Kerjasama
    public function kerjasamas()
    {
        return Kerjasama::whereHas('requestMitra.pelanggan', function ($query) {
            $query->where('user_id', $this->id);
        });
    }
    
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
    
    public function isCustomer(): bool
    {
        return $this->role === 'customer';
    }

    public function pelanggan(): HasMany
    {
        return $this->hasMany(Pelanggan::class);
    }

    public function pesanan(): HasManyThrough
    {
        // return $this->hasManyThrough(Pesanan::class, Pelanggan::class, 'user_id', 'pelanggan_id', 'id', 'id');
        return $this->hasManyThrough(
            Pesanan::class,     // Model tujuan akhir (anak cucu): Pesanan
            Pelanggan::class,   // Model perantara (anak): Pelanggan
            'user_id',          // foreign key di tabel pelanggan yang menunjuk ke tabel users
            'pelanggan_id',     // foreign key di tabel pesanan yang menunjuk ke tabel pelanggan
            'id',               // local key di tabel users
            'id'                // local key di tabel pelanggan
        );
    }

    public function pembayaran()
    {
        return $this->hasManyThrough(Pembayaran::class, Pesanan::class);
    }

    public function ulasan(): HasMany
    {
        return $this->hasMany(Ulasan::class);
    }
}
