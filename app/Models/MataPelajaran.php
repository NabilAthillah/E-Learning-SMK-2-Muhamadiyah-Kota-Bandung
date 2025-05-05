<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }
    public function pengajar()
    {
        return $this->belongsTo(User::class);
    }
}
