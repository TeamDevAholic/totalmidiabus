<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensVendas extends Model
{
    use HasFactory;

    protected $fillable = [
        'orcamento_id',
        'venda_id',
        'produto_id',
        'qtd_produto',
        'data_inicio',
        'data_final',
        'valor',
        'custo_colagem_produto',
        'custo_linha_onibus'
    ];
    public $timestamps = true;
}
