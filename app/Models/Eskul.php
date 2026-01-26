<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;
use App\Models\DaftarEskul;

class Eskul extends Model
{
    protected $fillable = ['nama_eskul', 'nama_pembina','no_hp','alamat', 'foto', 'deskripsi'];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function daftarEskuls()
    {
        return $this->hasMany(DaftarEskul::class);
    }
}
