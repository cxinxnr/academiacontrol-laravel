@extends('layout.app')

@section('titulo', 'Listagem de Aulas')

<head>
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
            margin-bottom: 25px;
        }

        .filtro-container {
            float: right;
            text-align: right;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    @section('conteudo')
        <div class="filtro-container">
            <select id="campoOrdenacao">
                <option value="aula_id">ID</option>
                <option value="nome_aula">Nome da Aula</option>
                <option value="instrutor_responsavel">Instrutor Responsavel</option>
                <option value="dia_semana">Dia da Semana</option>
            </select>

            <select id="ordemClassificacao">
                <option value="ascendente">Crescente</option>
                <option value="descendente">Decrescente</option>
            </select>
            <button onclick="ordenarTabela()">Ordenar</button>
        </div>
        <h1>Lista de Aulas</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome da Aula</th>
                    <th>Instrutor</th>
                    <th>Dia da Semana</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aulas as $aula)
                    <tr>
                        <td data-search="aula_id">{{ $aula['aula_id'] }}</td>
                        <td data-search="nome_aula">{{ $aula['nome_aula'] }}</td>
                        <td data-search="instrutor_responsavel">{{ $aula['instrutor_responsavel'] }}</td>
                        <td data-search="dia_semana">{{ $aula['dia_semana'] }}</td>
                        <td>
                            <a href="{{ '/editar-aula/' . $aula['aula_id'] }}">Editar</a>
                            <button onclick="confirmarExclusao({{ $aula['aula_id'] }})">Excluir</button>
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
                if (confirm('Deseja realmente excluir esta Aula?')) {
                    window.location.href = '/excluir-aula/' + id;
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
</body>