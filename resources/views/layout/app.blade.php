<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <style>
        .content {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
            max-width: 400px;
            margin: 0 auto;
        }

        .content h1 {
            text-align: center;
        }

        .content form {
            display: flex;
            flex-direction: column;
        }

        .content label {
            margin-bottom: 5px;
        }

        .content input[type="text"],
        .content textarea,
        .content input[type="number"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        .content button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            margin-top: 20px;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .content button[type="submit"]:hover {
            background-color: #45a049;
        }
        .logout-button {
        background-color: #f2f2f2;
        color: #333;
        padding: 8px 16px;
        border: none;
        cursor: pointer;
        float: right;
        margin-top: 10px;
    }

    .logout-button:hover {
        background-color: #ccc;
    }

        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("../images/fundo.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.7;
            /* Defina a opacidade desejada (0.0 a 1.0) */
            z-index: -1;}
    </style>
    @yield('scripts')
</head>

<body>
    <div class="background-image"></div>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Academia Control</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="clienteDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cliente
                        </a>
                        <div class="dropdown-menu" aria-labelledby="clienteDropdown">
                            <a class="dropdown-item" href="/cadastro-cliente">Cadastro</a>
                            <a class="dropdown-item" href="/lista-cliente">Listar</a>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="planoDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Plano
                        </a>
                        <div class="dropdown-menu" aria-labelledby="planoDropdown">
                            <a class="dropdown-item" href="/cadastro-plano">Cadastro</a>
                            <a class="dropdown-item" href="/lista-plano">Listar</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="aulaDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aula
                        </a>
                        <div class="dropdown-menu" aria-labelledby="aulaDropdown">
                            <a class="dropdown-item" href="/cadastro-aula">Cadastro</a>
                            <a class="dropdown-item" href="/lista-aula">Listar</a>
                        </div>
                    </li>
                    <li class="nav-item">
                       <form method="POST" action="/logout">
                        @csrf
                        <button class="logout-button"> Logout</button>
                       </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
    
      @yield('conteudo')

    </div>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.nav-item.dropdown').hover(function() {
        $(this).addClass('show').find('.dropdown-menu').addClass('show');
    }, function() {
        $(this).removeClass('show').find('.dropdown-menu').removeClass('show');
    });
</script>
