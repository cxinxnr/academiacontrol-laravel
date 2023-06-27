@extends('layout.app')

@section('titulo', 'Lista de Clientes')

@section('conteudo')
<head>
    <title>Lista de Clientes</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto; 
            border: 1px solid #ccc;
        }

        th, td {
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
            float: center;
            text-align: center;
        }
        .filtro-container {
            float: right;
            text-align: right;
            margin:20px;
        }
    </style>
</head>
<body>
    <div class="filtro-container">
        <select id="campoOrdenacao">
            <option value="cliente_id">ID</option>
            <option value="nome">Nome</option>
            <option value="email">Email</option>
            <option value="telefone">Telefone</option>
            <option value="data_nascimento">Data Nascimento</option>
            <option value="genero">Gênero</option>
            <option value="altura">Altura</option>
            <option value="peso">Peso</option>
            <option value="objetivo">Objetivo</option>
        </select>

        <select id="ordemClassificacao">
            <option value="ascendente">Crescente</option>
            <option value="descendente">Decrescente</option>
        </select>
        <button onclick="ordenarTabela()">Ordenar</button>
    </div>

    <h1>Lista de Clientes</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Data Nascimento</th>
                <th>Gênero</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>Objetivo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td data-search="cliente_id">{{ $cliente['cliente_id'] }}</td>
                    <td data-search="nome">{{ $cliente['nome'] }}</td>
                    <td data-search="email">{{ $cliente['email'] }}</td>
                    <td data-search="telefone">{{ $cliente['telefone'] }}</td>
                    <td data-search="data_nascimento">{{ $cliente['data_nascimento'] }}</td>
                    <td data-search="genero">{{ $cliente['genero'] }}</td>
                    <td data-search="altura">{{ $cliente['altura'] }}</td>
                    <td data-search="peso">{{ $cliente['peso'] }}</td>
                    <td data-search="objetivo">{{ $cliente['objetivo'] }}</td>
                    <td>
                        <a href="{{ route('editar-cliente', ['id' => $cliente->cliente_id]) }}">Editar</a>
                        <button onclick="confirmarExclusao({{ $cliente->cliente_id }})">Excluir</button>
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
        var colunaOrdenacao = 'nome';
        function confirmarExclusao(id) {
            if (confirm('Deseja realmente excluir este Cliente?')) {
                window.location.href = '/excluir-cliente/' + id;
            }
        }
        function ordenarTabela() {
            var campoOrdenacao = document.getElementById("campoOrdenacao").value;
            var ordemClassificacao = document.getElementById("ordemClassificacao").value;

            var tabela = document.querySelector("table");
            var tbody = tabela.querySelector("tbody");
            var linhas = Array.from(tbody.querySelectorAll("tr"));

            linhas.sort(function (a, b) {
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
            linhas.forEach(function (linha) {
                tbody.appendChild(linha);
            });
        }
    </script>
</body>
@endsection
