<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Penulis extends Model
{
    protected $table = 'penulis';
    public $timestamps = false;

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'user_name',
        'password',
        'foto',
    ];

    protected $hidden = ['password'];

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'id_penulis');
    }

    public function getNamaLengkapAttribute(): string
    {
        return trim($this->nama_depan . ' ' . $this->nama_belakang);
    }

    public function setPasswordAttribute($value): void
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}

