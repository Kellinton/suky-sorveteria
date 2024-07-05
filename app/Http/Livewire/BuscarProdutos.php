<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produto;

class BuscarProdutos extends Component
{
    public $search = '';
    public $selectedCategoria = '';
    public $selectedDisponibilidade = '';

    public function aplicarFiltro()
    {
        $this->render();
    }

    public function render()
    {

        return view('livewire.buscar-produtos', [
            'produtos' => $this->getProdutos()
        ]);
    }

    public function getProdutos()
    {
        $produtos = Produto::query();

        if ($this->search) {
            $produtos->where('nomeProduto', 'like', '%' . $this->search . '%')
                     ->orWhere('descricaoProduto', 'like', '%' . $this->search . '%');

        }

        if ($this->selectedCategoria) {
            $produtos->where('categoriaProduto', $this->selectedCategoria);
        }

        if ($this->selectedDisponibilidade) {
            $produtos->where('statusProduto', $this->selectedDisponibilidade);
        }

        return $produtos->get();
    }
}
