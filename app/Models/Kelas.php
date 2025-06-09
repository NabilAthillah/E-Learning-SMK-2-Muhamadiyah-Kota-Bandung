<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = [];

    public function waliKelas()
    {
        return $this->belongsTo(User::class, 'wali_kelas_id');
    }

    public function siswa()
    {
        return $this->belongsToMany(User::class, 'kelas_user');
    }

    public function pengajaran()
    {
        return $this->hasMany(Pengajaran::class);
    }

    public function mataPelajaran()
    {
        return $this->belongsToMany(MataPelajaran::class, 'pengajaran', 'kelas_id', 'mapel_id');
    }
}
