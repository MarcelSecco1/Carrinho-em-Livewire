<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class ListarProdutos extends Component
{
    public function render()
    {
        $produtos = Produto::all();
        return view('livewire.listar-produtos', ['produtos' => $produtos]);
    }
}
