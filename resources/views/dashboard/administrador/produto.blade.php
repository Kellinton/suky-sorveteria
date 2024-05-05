@extends('dashboard.layoutdash.index')

@section('title', 'Produtos')
<style>
    .filtro-ativo{
        background-color: #fff!important;
        color: #cb0c9f!important;
    }
</style>
@section('conteudo')

<div class="col-12 mt-4">

    <!-- Biblioteca Livewire para filtrar -->
    @livewire('buscar-produtos')

</div>

@include('dashboard.administrador.produto.create')
@endsection
