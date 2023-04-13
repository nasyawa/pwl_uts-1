<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class daftar extends Model
{
    use HasFactory;
    protected $table = 'daftar';
    protected $primaryKey = 'id_daftar';

    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'id_user',
        'keluhan'
    ];
}
