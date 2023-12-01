<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', // nome
        'promocao', //true ou false
        'preco', // preco
        'desconto', // porcentagem
        'quantidade', // integer
        'imagem', //img
    ];

    public function getPrecoAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    
}
