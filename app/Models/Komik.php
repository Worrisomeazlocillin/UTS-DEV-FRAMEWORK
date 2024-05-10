<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komik extends Model
{
    protected $table = 'komik';

    public function DaftarKomik(): BelongsTo
    {
        return $this->belongsTo(DaftarKomik::class, 'id_daftar_komik');
    }
}