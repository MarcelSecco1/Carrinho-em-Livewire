<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = ['addToCart'];

   


    public function render()
    {
        return view('livewire.cart');
    }
}