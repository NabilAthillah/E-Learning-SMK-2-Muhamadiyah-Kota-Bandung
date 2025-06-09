<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasUuids;

    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = [];

    public function pengajaran()
    {
        return $this->hasMany(Pengajaran::class, 'mapel_id');
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'pengajaran', 'mapel_id', 'kelas_id');
    }

    public function guru() {
        return $this->belongsTo(User::class, 'pengajar', 'id');
    }
}
