<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Funcionario;



class BuscarFuncionarios extends Component
{
    public $search = '';
    public $selectedFuncao = '';
    public $selectedDisponibilidade = '';

    public function aplicarFiltro()
    {
        $this->render();
    }

    public function render()
    {

        return view('livewire.buscar-funcionarios', [
            'funcionarios' => $this->getFuncionarios()
        ]);
    }

    public function getFuncionarios()
    {


        $funcionarios = Funcionario::query();

        if ($this->search) {
                $funcionarios->where('nomeFuncionario', 'like', '%' . $this->search . '%')
                            ->orWhere('sobrenomeFuncionario', 'like', '%' . $this->search . '%');

        }

        if ($this->selectedFuncao) {
                $funcionarios->where('tipo_funcionario', $this->selectedFuncao);

        }

        if ($this->selectedDisponibilidade) {
            $funcionarios->where('statusFuncionario', $this->selectedDisponibilidade);
        }



        return $funcionarios->get();
    }
}
