<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intinerarios extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'linha_id'];
    public $timestamps = true;

    public function linha()
    {
        return $this->belongsTo(Linha::class, 'linha_id');
    }
}
