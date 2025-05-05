<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class, 'jenjang_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function wali_kelas()
    {
        return $this->belongsTo(User::class, 'wali_kelas_id');
    }

    public function mata_pelajarans()
    {
        return $this->belongsToMany(MataPelajaran::class);
    }
}
