@extends('layout.app')

@section('titulo', 'Editar Plano')
@section('conteudo')
<div class="content">
    <h1>Editar Plano</h1>

    <form action="{{ route('editar-plano', ['id' => $plano['plano_id']]) }}" method="POST">
        @csrf
        <input type="hidden" name="plano_id" value="{{ $plano['plano_id'] }}">
        
        <label for="nome_plano">Nome do Plano:</label>
        <input type="text" name="nome_plano" id="nome_plano" value="{{ $plano->nome_plano }}" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required>{{ $plano->descricao }}</textarea>

        <label for="valor">Valor:</label>
        <input type="number" name="valor" id="valor" step="0.01" value="{{ $plano->valor }}" required>

        <label for="beneficios">Benefícios:</label>
        <textarea name="beneficios" id="beneficios" required>{{ $plano->beneficios }}</textarea>

        <button type="submit">Salvar</button>
    </form>
</div>
@endsection