<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class KelasUser extends Model
{
    use HasUuids;

    protected $table = 'kelas_user';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = [];
}
