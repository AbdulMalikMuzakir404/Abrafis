<?php

namespace App\Models;

use App\Models\hadir;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public function hadir()
    {
        return $this->hasMany(hadir::class);
    }

    public function sakit()
    {
        return $this->hasMany(sakit::class);
    }

    public function izin()
    {
        return $this->hasMany(izin::class);
    }

    public function alfa()
    {
        return $this->hasMany(alfa::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tgl_lahir',
        'jk',
        'jurusan',
        'jurusan_berapa',
        'kelas',
        'nama_ortu',
        'no_wa',
        'no_hp',
        'alamat',
        'is_admin',
        'nis',
        'images'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
