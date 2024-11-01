<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Buspay ADM | Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            background: #2C3E50;
        }

        .menu-dashboard {
            width: 3rem;
            background: #fff;
            height: 100vh;
            border-radius: 0 12px 12px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 5px;
            transition: all 0.3s cubic-bezier(0.075, 0.82, 0.165, 1);
        }

        .button-expand-menu {
            position: relative;
            top: -20rem;
            right: 1rem;
        }

        .button-expand-menu button {
            border-radius: 50%;
            padding: 5px;
            border: none;
            outline: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .ul-list,
        .logo {
            display: none;
        }

        .container-cima {
            display: flex;
            flex-direction: column;
            gap: 5rem;
        }

        .ul-list {
            list-style: none;
            gap: 10px;
            flex-direction: column;
            color: #2C3E50;
        }

        .ul-list li {
            border-bottom: 3px solid white;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .ul-list li:hover {
            border-bottom: 3px solid #2C3E50;
        }

        .perfil-sair {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container-visualizacao-passagens,
        .container-visualizacao-clientes,
        .container-visualizacao-empresas,
        .container-visualizacao-onibus {
            display: none;
            flex-direction: column;
            width: 65%;
            height: 100%;
            background: #fff;
            padding: 10px 25px;
            border-radius: 25px;
            max-height: 700px;
            overflow: auto;
        }

        .container-visualizacao-passagens::-webkit-scrollbar,
        .container-visualizacao-clientes::-webkit-scrollbar,
        .container-visualizacao-empresas::-webkit-scrollbar,
        .container-visualizacao-onibus::-webkit-scrollbar {
            width: 8px;
        }

        .container-visualizacao-passagens::-webkit-scrollbar-track,
        .container-visualizacao-clientes::-webkit-scrollbar-track,
        .container-visualizacao-empresas::-webkit-scrollbar-track,
        .container-visualizacao-onibus::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .container-visualizacao-passagens::-webkit-scrollbar-thumb,
        .container-visualizacao-clientes::-webkit-scrollbar-thumb,
        .container-visualizacao-empresas::-webkit-scrollbar-thumb,
        .container-visualizacao-onibus::-webkit-scrollbar-thumb {
            background-color: #3498db;
            border-radius: 10px;
            border: 2px solid #f1f1f1;
        }

        .container-visualizacao-passagens,
        .container-visualizacao-clientes,
        .container-visualizacao-empresas,
        .container-visualizacao-onibus {
            scrollbar-width: thin;
            scrollbar-color: #3498db #f1f1f1;
        }

        .container-visualizacao-clientes,
        .container-visualizacao-empresas,
        .container-visualizacao-onibus {
            display: none;
        }

        .tela-lado-direito {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        .linha-dados {
            display: grid;
            grid-template-columns: 17fr 8fr 9fr 1fr 1fr;
            align-items: center;
            padding: 10px;
            margin: 10px 0;
            border-bottom: 1px solid #d4d4d4;
            gap: 1rem;
            color: #2C3E50;
            height: 50px;
        }

        .linha-dados button {
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 50%;
            background-color: #2C3E50;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .linha-dados button:hover {
            background-color: #112233;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #2C3E50;
        }

        .header button {
            padding: 5px 10px;
            color: #fff;
            background: #2C3E50;
            border: none;
            border-radius: 7px;
            cursor: pointer;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            font-family: "Poppins", sans-serif;
            color: #fff;
        }

        .pagination a,
        .pagination .current {
            padding: 10px 15px;
            margin: 0 5px;
            background-color: #2C3E50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .pagination a:hover {
            background-color: #1bd1b5;
        }

        .pagination .disabled {
            background-color: #6c757d;
            cursor: not-allowed;
            padding: 10px 15px;
            margin: 0 5px;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .pagination .current {
            background-color: #1bd1b5;
            padding: 10px 15px;
            margin: 0 5px;
            color: #fff;
            border-radius: 5px;
            cursor: default;
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="menu-dashboard">
            <div class="container-cima">
                <div class="logo">
                    <img src="{{ asset('assets/logo_buspay.jpg') }}" width="70px">
                </div>
                <ul class="ul-list">
                    <li id="passagens">Passagens</li>
                    <li id="clientes">Clientes</li>
                    <li id="empresas">Empresas</li>
                    <li id="onibus">Ônibus</li>
                </ul>
            </div>
            <div class="perfil-sair">
                <div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 16.5V19C15 20.1046 14.1046 21 13 21H6C4.89543 21 4 20.1046 4 19V5C4 3.89543 4.89543 3 6 3H13C14.1046 3 15 3.89543 15 5V8.0625M11 12H21M21 12L18.5 9.5M21 12L18.5 14.5"
                                stroke="#A51111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="button-expand-menu">
            <button id="btn-expand" onclick="openMenuLateral()">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11 16L15 12M15 12L11 8M15 12H3M4.51555 17C6.13007 19.412 8.87958 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C8.87958 3 6.13007 4.58803 4.51555 7"
                        stroke="#2C3E50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        <div class="tela-lado-direito">
            <div class="container-visualizacao-passagens">
                <div class="header">
                    <h1>Visualização de Passagens</h1>
                </div>
                <div class="listagem">
                    @foreach ($passagens as $passagem)
                        <div id="passagem-{{ $passagem->id }}" class="linha-dados">
                            <p>
                                {{ $passagem->PAS_CIDADEIDA }} / {{ $passagem->PAS_ESTADOIDA }} -
                                {{ $passagem->PAS_CIDADEVOLTA }} / {{ $passagem->PAS_ESTADOVOLTA }}
                            </p>
                            <p>R${{ number_format($passagem->PAS_PRECO, 2, ',', '.') }}</p>
                            <p>{{ $passagem->PAS_EMPRESA }}
                            </p>
                            <form method="post" action="{{ route('delete-passagem', ['id' => $passagem->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="container-visualizacao-clientes">
                <div class="header">
                    <h1>Visualização de Clientes</h1>
                </div>
                <div class="listagem">
                    @foreach ($clientes as $cliente)
                        <div class="linha-dados">
                            <p>{{ $cliente->US_NOME }}</p>
                            <p>{{ $cliente->US_EMAIL }}</p>
                            <p>{{ $cliente->US_DOCUMENTO }}</p>
                            <form method="post" action="{{ route('delete-cliente', ['id' => $cliente->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="container-visualizacao-empresas">
                <div class="header">
                    <h1>Visualização de Empresas</h1>
                </div>
                <div class="listagem">
                    @foreach ($empresas as $empresa)
                        <div class="linha-dados">
                            <p>{{ $empresa->US_NOME }}</p>
                            <p>{{ $empresa->US_EMAIL }}</p>
                            <p>{{ $empresa->US_DOCUMENTO }}</p>
                            <form method="post" action="{{ route('delete-empresa', ['id' => $empresa->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="container-visualizacao-onibus">
                <div class="header">
                    <h1>Visualização de Ônibus</h1>
                </div>
                <div class="listagem">
                    @foreach ($onibus as $onibu)
                        <div class="linha-dados">
                            <p>{{ $onibu->ON_MARCA }}</p>
                            <p>{{ $onibu->ON_QTDEPOLTRONAS }}</p>
                            <p>{{ $onibu->ON_PLACA }}</p>
                            <p>{{ $onibu->ON_EMPRESA_ID }}</p>
                            <form method="post" action="{{ route('delete-onibus', ['id' => $onibu->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script>
    const containerPassagens = document.querySelector('.container-visualizacao-passagens');
    const containerClientes = document.querySelector('.container-visualizacao-clientes');
    const containerEmpresas = document.querySelector('.container-visualizacao-empresas');
    const containerOnibus = document.querySelector('.container-visualizacao-onibus');
    const selectPassagem = document.getElementById('passagens');
    const selectClientes = document.getElementById('clientes');
    const selectEmpresas = document.getElementById('empresas');
    const selectOnibus = document.getElementById('onibus');

    selectPassagem.addEventListener('click', function(e) {
        e.preventDefault();
        containerPassagens.style.display = 'flex';
        containerClientes.style.display = 'none';
        containerEmpresas.style.display = 'none';
        containerOnibus.style.display = 'none';
    });

    selectClientes.addEventListener('click', function(e) {
        e.preventDefault();
        containerClientes.style.display = 'flex';
        containerPassagens.style.display = 'none';
        containerEmpresas.style.display = 'none';
        containerOnibus.style.display = 'none';
    });

    selectEmpresas.addEventListener('click', function(e) {
        e.preventDefault();
        containerEmpresas.style.display = 'flex';
        containerPassagens.style.display = 'none';
        containerClientes.style.display = 'none';
        containerOnibus.style.display = 'none';
    });

    selectOnibus.addEventListener('click', function(e) {
        e.preventDefault();
        containerOnibus.style.display = 'flex';
        containerEmpresas.style.display = 'none';
        containerPassagens.style.display = 'none';
        containerClientes.style.display = 'none';
    });
</script>

<script>
    function openMenuLateral() {
        const menuLateral = document.querySelector('.menu-dashboard');
        const buttonOpenMenu = document.getElementById('btn-expand');
        const divButton = document.querySelector('.button-expand-menu');
        const ulList = document.querySelector('.ul-list');
        const logo = document.querySelector('.logo');

        if (menuLateral.style.width === '3rem' || menuLateral.style.width === '') {
            menuLateral.style.width = '10rem';
            divButton.style.transform = 'rotate(180deg)';
            ulList.style.display = 'flex';
            logo.style.display = 'block';
        } else {
            menuLateral.style.width = '3rem';
            ulList.style.display = 'none';
            divButton.style.right = '1rem';
            divButton.style.transform = 'rotate(360deg)';
            logo.style.display = 'none';
        }
    }
</script>

@if (session('success'))
    <div style="
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50; /* verde para sucesso */
            color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            font-family: Arial, sans-serif;
        "
        id="toast-success">
        {{ session('success') }}
    </div>
@endif

<script>
    setTimeout(function() {
        document.getElementById('toast-success').style.display = 'none';
    }, 3000);
</script>

@if (session('error'))
    <div style="
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #f44336; /* vermelho para erro */
            color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            font-family: Arial, sans-serif;
        "
        id="toast-error">
        {{ session('error') }}
    </div>
@endif
<script>
    setTimeout(function() {
        document.getElementById('toast-error').style.display = 'none';
    }, 3000);
</script>

</html>
