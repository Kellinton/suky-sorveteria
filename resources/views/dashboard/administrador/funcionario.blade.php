@extends('dashboard.layoutdash.index')

@section('title', 'Funcionários')
<style>
    select{
        border-radius: 2px;
        width: 250px!important;
        padding: 10!important;
    }

    optgroup {
        font-weight: bold; /* Define a fonte em negrito */
    }

</style>

@section('conteudo')
    <div class="row mb-4">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Despesa com Salários</p>
                    <h5 class="font-weight-bolder mb-0">
                        R$ {{ number_format($totalSalario, 2, ',', '.') }}
                    </h5>
                </div>
                </div>
                <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Média Salarial</p>
                    <h5 class="font-weight-bolder mb-0">
                        R$ {{ number_format($salarioMedio, 2, ',', '.') }}

                    </h5>
                </div>
                </div>
                <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-chart-pie-35 text-lg opacity-10" aria-hidden="true"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Funcionários</p>
                        <h5 class="font-weight-bolder mb-0">
                         {{ $totalFuncionarios }}

                        </h5>
                    </div>
                    </div>
                    <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <!-- Biblioteca Livewire para filtrar -->
                @livewire('buscar-funcionarios')
            </div>
        </div>
    </div>

@include('sweetalert::alert')

@endsection

