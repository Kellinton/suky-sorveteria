<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produto;

class BuscarProdutos extends Component
{
    public $search = '';
    public $selectedCategoria = '';

    public function render()
    {
        $produtos = $this->getProdutos();
        return view('livewire.buscar-produtos', compact('produtos'));
    }

    public function getProdutos()
    {
        $produtos = Produto::query();

        if ($this->search) {
            $produtos->where('nomeProduto', 'like', '%' . $this->search . '%')
                     ->orWhere('descricaoProduto', 'like', '%' . $this->search . '%');

        }

        if ($this->selectedCategoria) {
            $produtos->where('categoriaProduto', $this->selectedCategoria)
                     ->orWhere('statusProduto', $this->selectedCategoria);
        }

        return $produtos->get();
    }
}
