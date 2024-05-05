<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produto;

class ListarProdutos extends Component
{
    public $result = [];

    public function render()
    {
        $this->result = Produto::all(); // Para listar todos os produtos inicialmente

        return view('livewire.listar-produtos');
    }

}
