<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linhas extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_linha',
        'municipio',
        'nome',
        'empresa_id',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresas::class);
    }
}
