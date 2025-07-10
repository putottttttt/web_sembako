<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Kolom yang bisa diisi secara massal.
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
    ];

    /**
     * Kolom yang akan disembunyikan saat model dikonversi ke array/JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Kolom yang akan dikonversi ke tipe data lain.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Laravel secara default mengisi created_at dan updated_at,
     * tapi karena kolom ini tidak ada di database, kita nonaktifkan.
     */
    public $timestamps = false;

    /**
     * Gunakan 'username' sebagai field login utama, bukan 'email'.
     */
    public function username()
    {
        return 'username';
    }
}
