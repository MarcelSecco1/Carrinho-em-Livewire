<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Produto;
use Livewire\Component;

use Livewire\Attributes\On;

class CartItens extends Component
{
    protected $listeners = ['addToCart'];

    public $cartItem;
    public $cartProdutos;
    public $quantiaItens = 0;
    public $itensCartEstoque;
    protected $quantia;

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        if (auth()->user()) {
            $this->cartItem = Cart::where('user_id', auth()->user()->id)->get();

            $this->cartProdutos = null;
            if ($this->cartItem->isNotEmpty()) {
                $idProdutos = [];

                // Obter os IDs dos produtos dos itens do carrinho
                foreach ($this->cartItem as $item) {
                    $idCart[] = $item->id;
                    $idProdutos[] = $item->produto_id;
                    $quantidades[$item->produto_id] = $item->quantia;
                }

                // Obter os produtos correspondentes aos IDs
                $this->cartProdutos = Produto::whereIn('id', $idProdutos)->get();

                foreach ($this->cartProdutos as $produto) {

                    if (isset($quantidades[$produto->id])) {
                        if ($produto->quantidade >= $quantidades[$produto->id]) {
                            session()->flash('produto' . $produto->id, $quantidades[$produto->id]);
                        }
                    }
                }
            }
            $this->quantiaItens = Cart::where('user_id', auth()->user()->id)->count();
        }
    }


    #[On('addCart')]
    public function addCart($id)
    {
        if (auth()->user()) {
            $product = Produto::findOrFail($id);
            if ($product) {
                if ($product->quantidade >= 1) {

                    $existingCartItem = Cart::where('user_id', auth()->user()->id)
                        ->where('produto_id', $id)
                        ->first();

                    // Verifica se o produto já está no carrinho
                    if ($existingCartItem) {
                        $existingCartItem->quantia++;
                        $existingCartItem->save();
                        $this->dispatch('item-adicionado', 'Adicionado mais uma quantia deste item!');
                    } else {
                        Cart::create(
                            [
                                'produto_id' => $id,
                                'user_id' => auth()->user()->id,
                            ]
                        );
                        $this->dispatch('item-adicionado', 'Item adicionado!');
                    }
                } else {
                    $this->dispatch('no-have-itens', 'No momento estamos sem estoque desse produto.');
                }
            }
            $this->updateCart();

            $this->dispatch('itemAdicionado');
        } else {
            return redirect(route('login'));
        }
    }

    public function clearCart()
    {
        if (auth()->user()) {
            $cart = Cart::where('user_id', auth()->user()->id)->delete();
            if ($cart) {
                $this->updateCart();
                $this->dispatch('clear-cart', 'Seu carrinho está vazio agora!');
            } else {
                $this->updateCart();
                $this->dispatch('no-have-itens', 'Não há itens no seu carrinho!!');
            }
        }
    }

    public function render()
    {
        return view(
            'livewire.cartItens',
            [
                'produtosInCart' => $this->cartProdutos,
            ]
        );
    }
}
