@extends('layout.app')

@section('titulo', 'Editar Aula')
@section('conteudo')
<div class="content">
    <h1>Editar Aula</h1>
    
    <form action="{{ route('editar-aula', ['id' => $aula['aula_id']]) }}" method="POST">
        @csrf
        <input type="hidden" name="aula_id" value="{{ $aula['aula_id'] }}">
        
        <label for="nome_aula">Nome da Aula:</label>
        <input type="text" name="nome_aula" id="nome_aula" value="{{ $aula['nome_aula'] }}" required>
        
        <label for="instrutor_responsavel">Instrutor Responsável:</label>
        <input type="text" name="instrutor_responsavel" id="instrutor_responsavel" value="{{ $aula['instrutor_responsavel'] }}" required>
        
        <label for="dia_semana">Dia da Semana:</label>
        <select name="dia_semana" id="dia_semana" required>
            <option value="Segunda-feira" {{ $aula['dia_semana'] === 'Segunda-feira' ? 'selected' : '' }}>Segunda-feira</option>
            <option value="Terça-feira" {{ $aula['dia_semana'] === 'Terça-feira' ? 'selected' : '' }}>Terça-feira</option>
            <option value="Quarta-feira" {{ $aula['dia_semana'] === 'Quarta-feira' ? 'selected' : '' }}>Quarta-feira</option>
            <option value="Quinta-feira" {{ $aula['dia_semana'] === 'Quinta-feira' ? 'selected' : '' }}>Quinta-feira</option>
            <option value="Sexta-feira" {{ $aula['dia_semana'] === 'Sexta-feira' ? 'selected' : '' }}>Sexta-feira</option>
            <option value="Sábado" {{ $aula['dia_semana'] === 'Sábado' ? 'selected' : '' }}>Sábado</option>
            <option value="Domingo" {{ $aula['dia_semana'] === 'Domingo' ? 'selected' : '' }}>Domingo</option>
        </select>
        
        <button type="submit">Salvar</button>
    </form>
</div>
@endsection