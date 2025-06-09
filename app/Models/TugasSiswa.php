<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TugasSiswa extends Model implements HasMedia
{
    use HasUuids, InteractsWithMedia;

    protected $table= 'tugas_siswa';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = [];

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class);
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }
}
