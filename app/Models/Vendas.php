<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = [
        'lista_produtos',
        'numero_pi',
        'qtd_parcelas',
        'inicio_campanha',
        'anexo_pdf',
        'numero_nf',
        'valor_bruto',
        'valor_imposto',
        'valor_depositado',
        'pagamento_colagem',
        'pagamento_garagem',
        'fotos_comprovacao',
        'fluxo',
        'status'
    ];
    public $timestamps = true;
}
