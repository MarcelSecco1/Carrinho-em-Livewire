<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', //integer
        'produto_id', // integer    
        'quantidade', // integer        
    ];


    public function user()
    {
        //um user tem um carrinho
        return $this->belongsTo(User::class);
    }
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}