@extends('layout.app')

@section('titulo', 'Editar Cliente')

@section('conteudo')
<style>

</style>
<div class="content">
    <h1>Editar Cliente</h1>

    <form action="{{ route('editar-cliente', ['id' => $cliente['cliente_id']]) }}" method="POST">
        @csrf
        <input type="hidden" name="cliente_id" value="{{ $cliente['cliente_id'] }}">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ $cliente['nome'] }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $cliente['email'] }}" required>

        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" id="telefone" value="{{ $cliente['telefone'] }}" required>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" value="{{ $cliente['data_nascimento'] }}" required>

        <label for="genero">Gênero:</label>
        <select name="genero" id="genero" required>
            <option value="Masculino" {{ $cliente['genero'] === 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Feminino" {{ $cliente['genero'] === 'Feminino' ? 'selected' : '' }}>Feminino</option>
            <option value="Outro" {{ $cliente['genero'] === 'Outro' ? 'selected' : '' }}>Outro</option>
        </select>

        <label for="altura">Altura (cm):</label>
        <input type="number" name="altura" id="altura" value="{{ $cliente['altura'] }}" required>

        <label for="peso">Peso (kg):</label>
        <input type="number" name="peso" id="peso" value="{{ $cliente['peso'] }}" required>

        <label for="objetivo">Objetivo:</label>
        <textarea name="objetivo" id="objetivo" required>{{ $cliente['objetivo'] }}</textarea>

        <button type="submit">Salvar</button>
    </form>
</div>
@endsection
