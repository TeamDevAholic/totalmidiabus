<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsaveis extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'nome',
        'email',
        'whatsapp',
        'celular',
        'setor',
        'data_aniversario'
    ];
    public $timestamps = true;
}
