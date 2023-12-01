<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;



class CadastrarProduto extends Component
{
    use WithFileUploads;

    public $nome, $promocao, $preco, $desconto, $quantidade, $imagem;




    protected $rules = [
        'nome' => 'required|min:3',
        'promocao' => 'required',
        'preco' => 'required|numeric',
        'desconto' => 'nullable|numeric',
        'quantidade' => 'required|integer',
        'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];
    public function render()
    {

        return view('livewire.cadastrar-produto');
    }

    public function cadastrar()
    {

        $this->validate();
        $nameFile = Str::Slug($this->nome) . '.' . $this->imagem->getClientOriginalExtension();
        $path = $this->imagem->storeAs("public/" . $nameFile);

        if ($path) {
            if ($this->promocao == "false") {
                $this->promocao = false;
            } else {
                $this->promocao = true;
            }
            Produto::create(
                [
                    'nome' => $this->nome,
                    'promocao' => $this->promocao,
                    'preco' => $this->preco,
                    'desconto' => $this->desconto,
                    'quantidade' => $this->quantidade,
                    'imagem' => $nameFile,
                ]
            );

            $this->nome = '';
            $this->promocao = '';
            $this->preco = '';
            $this->desconto = '';
            $this->quantidade = '';
            $this->imagem = '';
            session()->flash('message', 'Produto cadastrado com sucesso!');
        } else {
            session()->flash('error', 'Houve um erro ao cadastrar o Produto!');
        }
    }
}
