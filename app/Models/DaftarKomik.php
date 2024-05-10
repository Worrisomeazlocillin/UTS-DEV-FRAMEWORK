<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DaftarKomik extends Model
{

        // use HasFactory;
        protected $table = 'daftar_komik';
        public function komik(): HasMany
        {
            return $this->hasMany(komik::class, 'id_daftar_Komik', 'id');
        }
    
}
