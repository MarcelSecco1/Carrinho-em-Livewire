<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class ListarProdutos extends Component
{
    public $cart = [];

    public function render()
    {
        $produtos = Produto::all();
        return view('livewire.listar-produtos', ['produtos' => $produtos]);
    }

    public function addCart($id)
    {
        $product = Produto::findOrFail($id);

        if ($product) {
            // Verifica se o produto já está no carrinho
            if (array_key_exists($id, $this->cart)) {
                // Se o produto já está no carrinho, atualiza a quantidade
                $this->cart[$id]['quantidade'] = +1;
            } else {
                // Se o produto não está no carrinho, adiciona um novo item
                $this->cart[$id] = [
                    'nome' => $product->nome,
                    'preco' => $product->preco,
                    'quantidade' => 3
                ];
            }

            // Atualiza a interface do usuário
            dd($this->cart);
        }
    }
}