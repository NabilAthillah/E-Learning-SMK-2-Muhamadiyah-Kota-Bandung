<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Pertemuan extends Model implements HasMedia
{
    use HasUuids, InteractsWithMedia;

    protected $table = 'pertemuan';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = [];

    public function pengajaran()
    {
        return $this->belongsTo(Pengajaran::class);
    }

    public function tugasSiswa()
    {
        return $this->hasMany(TugasSiswa::class);
    }
}
