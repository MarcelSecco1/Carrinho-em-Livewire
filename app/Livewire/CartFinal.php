<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartFinal extends Component
{
    public $cart;
    
    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id);
        return view('livewire.cart-final');
    }
}