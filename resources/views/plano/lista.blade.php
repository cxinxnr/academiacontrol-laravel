@extends('layout.app')

@section('titulo', 'Lista de Planos')

@section('conteudo')
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            background-color: #f2f2f2;
        }

        th {
            background-color: #ccc;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .filtro-container {
            float: right;
            text-align: right;
            margin-right: 15px;
        }
    </style>

    <div class="filtro-container">
        <select id="campoOrdenacao">
            <option value="plano_id">ID</option>
            <option value="nome_plano">Nome</option>
            <option value="descricao">Descrição</option>
            <option value="valor">Valor</option>
            <option value="beneficios">Benefícios</option>
        </select>

        <select id="ordemClassificacao">
            <option value="ascendente">Crescente</option>
            <option value="descendente">Decrescente</option>
        </select>
        <button onclick="ordenarTabela()">Ordenar</button>
    </div>

    <h1>Lista de Planos</h1>
    <table id="tabela-planos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Benefícios</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($planos as $plano)
                <tr>
                    <td data-search="plano_id">{{ $plano->plano_id }}</td>
                    <td data-search="nome_plano">{{ $plano->nome_plano }}</td>
                    <td data-search="descricao">{{ $plano->descricao }}</td>
                    <td data-search="valor">{{ $plano->valor }}</td>
                    <td data-search="beneficios">{{ $plano->beneficios }}</td>
                    <td>
                        <a href="{{ route('editar-plano', ['id' => $plano->plano_id]) }}">Editar</a>
                        <button onclick="confirmarExclusao({{ $plano->plano_id }})">Excluir</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <script>
        var colunaOrdenacao = 'nome_plano';

        function confirmarExclusao(id) {
            if (confirm('Deseja realmente excluir este Plano?')) {
                window.location.href = '/excluir-plano/' + id;
            }
        }

        function ordenarTabela() {
            var campoOrdenacao = document.getElementById("campoOrdenacao").value;
            var ordemClassificacao = document.getElementById("ordemClassificacao").value;

            var tabela = document.querySelector("table");
            var tbody = tabela.querySelector("tbody");
            var linhas = Array.from(tbody.querySelectorAll("tr"));

            linhas.sort(function(a, b) {
                var valorA = a.querySelector(`td[data-search="${campoOrdenacao}"]`).innerText.toLowerCase();
                var valorB = b.querySelector(`td[data-search="${campoOrdenacao}"]`).innerText.toLowerCase();

                if (ordemClassificacao === "ascendente") {
                    if (valorA < valorB) {
                        return -1;
                    } else if (valorA > valorB) {
                        return 1;
                    } else {
                        return 0;
                    }
                } else if (ordemClassificacao === "descendente") {
                    if (valorA > valorB) {
                        return -1;
                    } else if (valorA < valorB) {
                        return 1;
                    } else {
                        return 0;
                    }
                }
            });

            tbody.innerHTML = "";
            linhas.forEach(function(linha) {
                tbody.appendChild(linha);
            });
        }
    </script>
@endsection
