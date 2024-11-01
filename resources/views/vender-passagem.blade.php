<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vender Passagens</title>

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
        html {
            scroll-behavior: smooth;
            user-select: none;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        body {
            background-color: #2C3E50;
            margin: 0;
            padding: 0;
        }

        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
            top: 0;
            left: 0;
        }

        header {
            background: #fff;
            padding: 10px;
            border-radius: 0px 0px 25px 25px;
        }

        header nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 4rem;
        }

        .ul-list {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4rem;
            list-style: none;
            color: #2C3E50;
        }

        .ul-list li {
            transition: all 0.1s cubic-bezier(0.075, 0.82, 0.165, 1);
        }

        .ul-list li:hover {
            border-bottom: 3px solid #1bd1b5;
            color: #1bd1b5;
        }

        .profile-session {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .img-session {
            position: relative;
            bottom: 20px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 50vh;
            padding: 20px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            gap: 2rem;
            color: #fff;
        }

        .img-session::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ asset('assets/bgdVendas.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.4;
            z-index: -1;
        }

        .img-session h1 {
            font-size: 38px;
        }

        .img-session h1 span {
            border-bottom: 7px solid #1bd1b5;
        }

        .img-session button {
            padding: 5px 15px;
            border: none;
            outline: none;
            color: #fff;
            background: #1bd1b5;
            border-radius: 7px;
            font-size: 22px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .img-session button:hover {
            background: #07806d;
        }

        .text-slider {
            position: relative;
            width: 100%;
            height: 50px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .text-slide {
            position: absolute;
            width: 100%;
            text-align: center;
            transform: translateX(100%);
            transition: transform 0.8s cubic-bezier(0.25, 0.8, 0.25, 1);
            color: #1bd1b5;
            padding-bottom: 10px;
            box-sizing: border-box;
        }

        .text-slide.active {
            transform: translateX(0);
        }

        .text-slide.exit {
            transform: translateX(-100%);
        }

        .modal-sell,
        .modal-passagem,
        .modal-bus {
            display: none;
            align-items: center;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 30rem;
            height: 30rem;
            background-color: #fff;
            z-index: 11;
            border-radius: 15px;
            border: 3px solid #2C3E50;
            padding: 20px;
            color: #2C3E50;
        }

        .modal-sell {
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            width: 600px;
            background-color: #fff;
            color: #2C3E50;
            border-radius: 15px;
            border: 3px solid #2C3E50;
            height: 565px;
            gap: 10px;
        }

        .modal-sell form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .form-grid {
            display: grid;
            align-items: center;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            width: 100%;
        }

        .grid-item label {
            display: flex;
            flex-direction: column;
            font-weight: 600;
            font-size: 14px;
            color: #2C3E50;
        }

        .grid-item select,
        .grid-item input {
            height: 35px;
            padding: 5px 10px;
            border: 1px solid #2C3E50;
            border-radius: 5px;
            font-size: 16px;
            color: #2C3E50;
        }

        .grid-item input[type="date"] {
            padding: 0 10px;
        }

        .grid-item select:focus,
        .grid-item input:focus {
            border-color: #06111d;
            outline: 1px solid #06111d;
            box-shadow: 0px 3px 10px -4px rgba(6, 17, 29, 0.5);
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #1bd1b5;
            border: none;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button[type="submit"]:hover {
            background-color: #07806d;
        }

        .linha-dados {
            display: grid;
            grid-template-columns: 17fr 8fr 9fr 1fr 1fr 1fr;
            align-items: center;
            padding: 10px;
            margin: 10px 0;
            border-bottom: 1px solid #d4d4d4;
            gap: 1rem;
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

        .listagem-passagens-vendidas {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 96vw;
            margin: 2rem auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 15px;
        }

        .input-empresa {
            background-color: rgb(0 0 0 / 24%);
        }

        .container-visualizacao-passagem {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
        }

        .container-visualizacao-passagem .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 28rem;
            font-size: 20px;
            border-bottom: 0.1rem solid #d4d4d4;
        }

        .btn-voltar-modal {
            padding: 5px 10px;
            border-radius: 7px;
            color: #fff;
            background-color: #2C3E50;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            margin-top: 2rem;
            font-size: 18px;
        }

        .btn-voltar-modal:hover {
            background-color: #112233;
        }

        #overlay {
            display: none;
            position: fixed;
            height: 100vh;
            width: 100vw;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 10;
        }

        #qrcode-container svg {
            position: fixed;
            z-index: 10;
            top: 0;
            width: 400px;
        }
    </style>

</head>

<body>

    <div id="overlay"></div>

    <header>
        <nav>
            <img src="{{ asset('assets/logo_buspay.jpg') }}" width="70px">
            <ul class="ul-list">
                <li>
                    <a href="{{ route('home') }}">Comprar</a>
                </li>
                <li><a href="{{ route('vender-passagem') }}">Vender</a></li>
            </ul>
            <div class="profile-session">

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 16.5V19C15 20.1046 14.1046 21 13 21H6C4.89543 21 4 20.1046 4 19V5C4 3.89543 4.89543 3 6 3H13C14.1046 3 15 3.89543 15 5V8.0625M11 12H21M21 12L18.5 9.5M21 12L18.5 14.5"
                            stroke="#A51111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </nav>
    </header>

    <div class="img-session">
        <h1>
            Venda suas Passagens de uma maneira
            <br />
            <div class="text-slider">
                <span class="text-slide">Prática!</span>
                <span class="text-slide">Rápida!</span>
                <span class="text-slide">Simples!</span>
            </div>
        </h1>
        <button onclick="showModalSell()">Vender</button>
        <button onclick="showModalBus()">Cadastrar Ônibus</button>
    </div>

    <div class="listagem-passagens-vendidas">
        <h3 style="color: #2C3E50">Passagens Anunciadas da sua Empresa</h3>
        @foreach ($passagens as $passagem)
            <div class="linha-dados">
                <p>{{ $passagem->PAS_CIDADEIDA }}/{{ $passagem->PAS_ESTADOIDA }} -
                    {{ $passagem->PAS_CIDADEVOLTA }}/{{ $passagem->PAS_ESTADOVOLTA }}</p>
                <p>R${{ number_format($passagem->PAS_PRECO, 2, ',', '.') }}</p>
                <p>{{ \Carbon\Carbon::parse($passagem->PAS_HORASIDA)->setTimezone('America/Sao_Paulo')->format('H:i') }}
                </p>
                <button
                    onclick="showModalPassagem({
                    cidadeIda: '{{ $passagem->PAS_CIDADEIDA }} - {{ $passagem->PAS_ESTADOIDA }}',
                    estadoIda: '{{ $passagem->PAS_ESTADOIDA }}',
                    cidadeVolta: '{{ $passagem->PAS_CIDADEVOLTA }} - {{ $passagem->PAS_ESTADOVOLTA }}',
                    estadoVolta: '{{ $passagem->PAS_ESTADOVOLTA }}',
                    horarioIda: '{{ \Carbon\Carbon::parse($passagem->PAS_HORASIDA)->setTimezone('America/Sao_Paulo')->format('H:i') }}',
                    horarioVolta: '{{ \Carbon\Carbon::parse($passagem->PAS_HORASVOLTA)->setTimezone('America/Sao_Paulo')->format('H:i') }}',
                    diaIda: '{{ $passagem->PAS_DIAIDA }}',
                    diaVolta: '{{ $passagem->PAS_DIAVOLTA }}',
                    preco: '{{ number_format($passagem->PAS_PRECO, 2, ',', '.') }}'
                })">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.75 12C9.75 10.7574 10.7574 9.75 12 9.75C13.2426 9.75 14.25 10.7574 14.25 12C14.25 13.2426 13.2426 14.25 12 14.25C10.7574 14.25 9.75 13.2426 9.75 12Z"
                            fill="#fff" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2 12C2 13.6394 2.42496 14.1915 3.27489 15.2957C4.97196 17.5004 7.81811 20 12 20C16.1819 20 19.028 17.5004 20.7251 15.2957C21.575 14.1915 22 13.6394 22 12C22 10.3606 21.575 9.80853 20.7251 8.70433C19.028 6.49956 16.1819 4 12 4C7.81811 4 4.97196 6.49956 3.27489 8.70433C2.42496 9.80853 2 10.3606 2 12ZM12 8.25C9.92893 8.25 8.25 9.92893 8.25 12C8.25 14.0711 9.92893 15.75 12 15.75C14.0711 15.75 15.75 14.0711 15.75 12C15.75 9.92893 14.0711 8.25 12 8.25Z"
                            fill="#fff" />
                    </svg>
                </button>
                <div>
                    <form action="{{ route('passagens.destroy', $passagem->id) }}" method="POST"
                        onsubmit="return confirm('Deseja realmente deletar?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6"
                                    stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="listagem-passagens-vendidas">
        <h3 style="color: #2C3E50">Ônibus da sua Empresa</h3>
        @foreach ($onibus as $onibu)
            <div class="linha-dados">
                <p>{{ $onibu->ON_MARCA }}</p>
                <p>{{ $onibu->ON_QTDEPOLTRONAS }}</p>
                <p>{{ $onibu->ON_PLACA }}</p>
                <div>
                    <form action="{{ route('deletar-onibus', $onibu->id) }}" method="POST" onsubmit="return confirm('Deseja realmente deletar?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6"
                                    stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="modal-sell">
        <h1>Cadastrar Passagem</h1>
        <form action="{{ route('passagens.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="grid-item">
                    <label for="PAS_ESTADOIDA">
                        Estado Ida:
                        <select name="PAS_ESTADOIDA" id="PAS_ESTADOIDA">
                            <option value="">Selecione um Estado</option>
                        </select>
                    </label>
                </div>
                <div class="grid-item">
                    <label for="PAS_CIDADEIDA">
                        Cidade Ida:
                        <select name="PAS_CIDADEIDA" id="PAS_CIDADEIDA">
                            <option value="">Selecione uma Cidade</option>
                        </select>
                    </label>
                </div>
                <div class="grid-item">
                    <label for="PAS_ESTADOVOLTA">
                        Estado Volta:
                        <select name="PAS_ESTADOVOLTA" id="PAS_ESTADOVOLTA">
                            <option value="">Selecione um Estado</option>
                        </select>
                    </label>
                </div>
                <div class="grid-item">
                    <label for="PAS_CIDADEVOLTA">
                        Cidade Volta:
                        <select name="PAS_CIDADEVOLTA" id="PAS_CIDADEVOLTA">
                            <option value="">Selecione uma Cidade</option>
                        </select>
                    </label>
                </div>
                <div class="grid-item">
                    <label for="PAS_HORASIDA">
                        Horário Ida:
                        <input type="text" name="PAS_HORASIDA" id="PAS_HORASIDA" maxlength="5"
                            oninput="formatTime(this)" onkeypress="allowOnlyNumbers(event)">
                    </label>
                </div>
                <div class="grid-item">
                    <label for="PAS_HORASVOLTA">
                        Horário Volta:
                        <input type="text" name="PAS_HORASVOLTA" id="PAS_HORASVOLTA" maxlength="5"
                            oninput="formatTime(this)" onkeypress="allowOnlyNumbers(event)">
                    </label>
                </div>
                <div class="grid-item">
                    <label for="PAS_DIAIDA">
                        Dia Ida:
                        <input type="date" name="PAS_DIAIDA" id="PAS_DIAIDA">
                    </label>
                </div>
                <div class="grid-item">
                    <label for="PAS_DIAVOLTA">
                        Dia Volta:
                        <input type="date" name="PAS_DIAVOLTA" id="PAS_DIAVOLTA">
                    </label>
                </div>
                <div class="grid-item">
                    <label for="PAS_PRECO">
                        Preço da Passagem:
                        <input type="text" inputmode="numeric" name="PAS_PRECO" id="PAS_PRECO"
                            onblur="formatPrice(this)" onkeypress="allowOnlyNumbers(event)">
                    </label>
                </div>
                <div class="grid-item">
                    <label for="PAS_ONIBUS_ID">
                        Ônibus:
                        <select name="PAS_ONIBUS_ID" id="PAS_ONIBUS_ID">
                            <option value="">Selecione um Ônibus</option>
                            @foreach ($onibus as $onibu)
                                <option value="{{ $onibu->id }}">{{ $onibu->ON_MARCA }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="grid-item">
                    <label for="PAS_EMPRESA">
                        Empresa:
                        <input class="input-empresa" type="text" name="PAS_EMPRESA" id="PAS_EMPRESA"
                            value="{{ $empresaNome }}" readonly>
                    </label>
                </div>
            </div>
            <button type="submit">Anunciar</button>
        </form>
    </div>

    <div class="modal-bus">
        <h1>Cadastrar Ônibus</h1>
        <form action="{{ route('cadastrar-onibus') }}" method="post" style="display: flex; flex-direction: column; align-items: center">
            @csrf
            <div class="form-grid">
                <div class="grid-item">
                    <label for="ON_MARCA">
                        Marca:
                        <input type="text" name="ON_MARCA" id="ON_MARCA">
                    </label>
                </div>
                <div class="grid-item">
                    <label for="ON_QTDEPOLTRONAS">
                        Qtde Poltronas:
                        <input type="number" name="ON_QTDEPOLTRONAS" id="ON_QTDEPOLTRONAS">
                    </label>
                </div>
                <div class="grid-item">
                    <label for="ON_PLACA">
                        Placa:
                        <input type="text" name="ON_PLACA" id="ON_PLACA">
                    </label>
                </div>
                <div class="grid-item">
                    <label for="ON_EMPRESA_ID">
                        Empresa:
                        <input class="input-empresa" type="text" name="ON_EMPRESA_ID" id="ON_EMPRESA_ID"
                            value="{{ $empresaId }}" readonly>
                    </label>
                </div>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
        <div></div>
    </div>

    <div class="modal-passagem">
        <h2>Passagem selecionada:</h2>
        <div class="container-visualizacao-passagem">
            <div class="container">
                <span>Cidade Ida:</span>
                <p></p>
            </div>
            <div class="container">
                <span>Cidade Volta:</span>
                <p></p>
            </div>
            <div class="container">
                <span>Horário Ida:</span>
                <p></p>
            </div>
            <div class="container">
                <span>Horário Volta:</span>
                <p></p>
            </div>
            <div class="container">
                <span>Dia Ida:</span>
                <p></p>
            </div>
            <div class="container">
                <span>Dia Volta:</span>
                <p></p>
            </div>
            <div class="container">
                <span>Preço:</span>
                <p></p>
            </div>
            <button onclick="closeModal()" class="btn-voltar-modal">Voltar</button>
        </div>
        <span></span>
    </div>

    <div class="modal-edit" style="display: none;">
        <h1>Editar Passagem</h1>
        <form id="edit-form" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="edit-id">
            <div class="form-grid">
                <div class="grid-item">
                    <label for="edit-estado-ida">Estado Ida:</label>
                    <select name="PAS_ESTADOIDA" id="edit-estado-ida">
                        <option value="">Selecione um Estado</option>
                    </select>
                </div>
                <div class="grid-item">
                    <label for="edit-cidade-ida">Cidade Ida:</label>
                    <select name="PAS_CIDADEIDA" id="edit-cidade-ida">
                        <option value="">Selecione uma Cidade</option>
                    </select>
                </div>
                <div class="grid-item">
                    <label for="edit-estado-volta">Estado Volta:</label>
                    <select name="PAS_ESTADOVOLTA" id="edit-estado-volta">
                        <option value="">Selecione um Estado</option>
                    </select>
                </div>
                <div class="grid-item">
                    <label for="edit-cidade-volta">Cidade Volta:</label>
                    <select name="PAS_CIDADEVOLTA" id="edit-cidade-volta">
                        <option value="">Selecione uma Cidade</option>
                    </select>
                </div>
                <div class="grid-item">
                    <label for="edit-horario-ida">Horário Ida:</label>
                    <input type="text" name="PAS_HORASIDA" id="edit-horario-ida">
                </div>
                <div class="grid-item">
                    <label for="edit-horario-volta">Horário Volta:</label>
                    <input type="text" name="PAS_HORASVOLTA" id="edit-horario-volta">
                </div>
                <div class="grid-item">
                    <label for="edit-dia-ida">Dia Ida:</label>
                    <input type="date" name="PAS_DIAIDA" id="edit-dia-ida">
                </div>
                <div class="grid-item">
                    <label for="edit-dia-volta">Dia Volta:</label>
                    <input type="date" name="PAS_DIAVOLTA" id="edit-dia-volta">
                </div>
                <div class="grid-item">
                    <label for="edit-preco">Preço:</label>
                    <input type="text" name="PAS_PRECO" id="edit-preco">
                </div>
            </div>
            <button type="submit">Salvar Alterações</button>
            <button type="button" onclick="closeEditModal()">Cancelar</button>
        </form>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script type="text/javascript">
        const teste = async () => {
            try {
                const response = await axios.post('/generate-qr-code', {}, {
                    responseType: 'text'
                });

                document.getElementById('qrcode-container').innerHTML = response.data;
            } catch (error) {
                console.error('Erro ao gerar QR Code:', error);
            }
        }
    </script>
    <script>
        function openEditModal(passagem) {
            document.getElementById('edit-id').value = passagem.id;
            document.getElementById('edit-estado-ida').value = passagem.estadoIda;
            document.getElementById('edit-cidade-ida').value = passagem.cidadeIda;
            document.getElementById('edit-estado-volta').value = passagem.estadoVolta || '';
            document.getElementById('edit-cidade-volta').value = passagem.cidadeVolta || '';
            document.getElementById('edit-horario-ida').value = passagem.horarioIda;
            document.getElementById('edit-horario-volta').value = passagem.horarioVolta || '';
            document.getElementById('edit-dia-ida').value = passagem.diaIda;
            document.getElementById('edit-dia-volta').value = passagem.diaVolta || '';
            document.getElementById('edit-preco').value = passagem.preco;

            document.querySelector('.modal-edit').style.display = 'flex';
            document.getElementById('overlay').style.display = 'block';
        }

        function closeEditModal() {
            document.querySelector('.modal-edit').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>

    <script>
        document.getElementById('edit-form').onsubmit = function(event) {
            event.preventDefault();

            const id = document.getElementById('edit-id').value;
            const formData = new FormData(this);

            axios.post(`/passagens/${id}`, formData, {
                    headers: {
                        'X-HTTP-Method-Override': 'PUT'
                    }
                })
                .then(response => {
                    Toastify({
                        text: "Passagem atualizada com sucesso!",
                        className: "info",
                        style: {
                            background: "#96c93d",
                        }
                    }).showToast();
                    window.location.reload();
                })
                .catch(error => {
                    Toastify({
                        text: "Erro ao atualizar a passagem.",
                        className: "error",
                        style: {
                            background: "rgba(255, 0, 0, 0.5)",
                        }
                    }).showToast();
                });
        };
    </script>

    <script>
        function openEditModal(passagem) {
            document.getElementById('edit-id').value = passagem.id;
            document.getElementById('edit-estado-ida').value = passagem.estadoIda;
            document.getElementById('edit-cidade-ida').value = passagem.cidadeIda;
            document.getElementById('edit-estado-volta').value = passagem.estadoVolta;
            document.getElementById('edit-cidade-volta').value = passagem.cidadeVolta;
            document.getElementById('edit-horario-ida').value = passagem.horarioIda;
            document.getElementById('edit-horario-volta').value = passagem.horarioVolta;
            document.getElementById('edit-dia-ida').value = passagem.diaIda;
            document.getElementById('edit-dia-volta').value = passagem.diaVolta;
            document.getElementById('edit-preco').value = passagem.preco;

            document.querySelector('.modal-edit').style.display = 'flex';
            document.getElementById('overlay').style.display = 'block';
        }

        function closeEditModal() {
            document.querySelector('.modal-edit').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>

    <script>
        const showModalPassagem = (passagem) => {
            const modalPassagem = document.querySelector('.modal-passagem');
            const overlayBackground = document.getElementById('overlay');

            if (modalPassagem) {
                const containers = modalPassagem.querySelectorAll('.container-visualizacao-passagem .container');

                const diaIda = passagem.diaIda;
                const diaFormatado = moment(diaIda).format('DD/MM/YYYY');

                const diaVolta = passagem.diaVolta;
                const diaVoltaFormatado = moment(diaVolta).format('DD/MM/YYYY');

                containers[0].querySelector('p').textContent = passagem.cidadeIda;
                containers[1].querySelector('p').textContent = passagem.cidadeVolta;
                containers[2].querySelector('p').textContent = passagem.horarioIda;
                containers[3].querySelector('p').textContent = passagem.horarioVolta;
                containers[4].querySelector('p').textContent = diaFormatado;
                containers[5].querySelector('p').textContent = diaVoltaFormatado;
                containers[6].querySelector('p').textContent = 'R$ ' + passagem.preco;

                modalPassagem.style.display = 'flex';
                overlayBackground.style.display = 'block';

                const closeModal = () => {
                    modalPassagem.style.display = 'none';
                    overlayBackground.style.display = 'none';
                }

                overlayBackground.addEventListener('click', closeModal);
            } else {
                console.error('Modal não encontrado!');
            }
        }

        function closeModal() {
            const modalPassagem = document.querySelector('.modal-passagem');
            const overlayBackground = document.getElementById('overlay');
            modalPassagem.style.display = 'none';
            overlayBackground.style.display = 'none';
        }
    </script>

    <script>
        function formatPrice(input) {
            let value = input.value.trim();

            if (value !== "") {
                let num = Number(value.replace(',', '.'));

                if (!isNaN(num)) {
                    input.value = num.toFixed(2).replace('.', ',');
                }
            }
        }

        function allowOnlyNumbers(event) {
            let charCode = event.which ? event.which : event.keyCode;
            if (charCode < 48 || charCode > 57) {
                event.preventDefault();
            }
        }

        function formatTime(input) {
            let value = input.value.replace(/\D/g, '');

            if (value.length >= 2) {
                value = value.slice(0, 2) + ':' + value.slice(2, 4);
            }

            input.value = value;
        }
    </script>

    <script>
        async function getCidades(estadoId, cidadeSelectId) {
            try {
                const response = await axios.get(
                    `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoId}/municipios?orderBy=nome`
                );
                const cidades = response.data;

                const cidadeSelect = document.getElementById(cidadeSelectId);
                cidadeSelect.innerHTML = '<option value="">Selecione uma Cidade</option>';

                cidades.forEach((cidade) => {
                    const option = document.createElement('option');
                    option.value = cidade.nome;
                    option.textContent = cidade.nome;
                    cidadeSelect.appendChild(option);
                });
            } catch (e) {
                console.log('Erro ao buscar cidades: ', e);
            }
        }


        let estadoMap = {};

        async function getEstados() {
            try {
                const response = await axios.get(
                    'https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome');
                const estados = response.data;

                const estadoIdaSelect = document.getElementById('PAS_ESTADOIDA');
                const estadoVoltaSelect = document.getElementById('PAS_ESTADOVOLTA');
                estadoIdaSelect.innerHTML = '<option value="">Selecione um Estado</option>';
                estadoVoltaSelect.innerHTML = '<option value="">Selecione um Estado</option>';

                estados.forEach((estado) => {
                    estadoMap[estado.id] = estado.sigla;

                    const optionIda = document.createElement('option');
                    optionIda.value = estado.sigla;
                    optionIda.textContent = estado.sigla;
                    estadoIdaSelect.appendChild(optionIda);

                    const optionVolta = document.createElement('option');
                    optionVolta.value = estado.sigla;
                    optionVolta.textContent = estado.sigla;
                    estadoVoltaSelect.appendChild(optionVolta);
                });
            } catch (e) {
                console.log('Erro ao buscar estados: ', e);
            }
        }

        function formatTime(input) {
            let value = input.value.replace(/\D/g, '');

            if (value.length >= 2) {
                let hours = value.slice(0, 2);
                let minutes = value.slice(2, 4) || '00';
                value = `${hours}:${minutes}`;
            }

            input.value = value;
        }

        function addSeconds(input) {
            let value = input.value;

            if (value.length === 5) {
                value = `${value}:00`;
            }

            input.value = value;
        }

        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();

            addSeconds(document.getElementById('PAS_HORASIDA'));
            addSeconds(document.getElementById('PAS_HORASVOLTA'));

            let formData = new FormData(this);

            axios.post(this.action, formData)
                .then(function(response) {
                    if (response.status === 200) {
                        Toastify({
                            text: "Passagem cadastrada com sucesso!",
                            className: "info",
                            style: {
                                background: "#96c93d",
                            }
                        }).showToast();
                        window.location.href = '/vender-passagem';
                    }
                })
                .catch(function(error) {
                    Toastify({
                        text: "Erro ao cadastrar a passagem.",
                        className: "error",
                        style: {
                            background: "rgba(255, 0, 0, 0.5)",
                        }
                    }).showToast();
                });
        });
    </script>

    <script>
        document.getElementById('PAS_ESTADOIDA').addEventListener('change', function() {
            const estadoId = this.value;
            if (estadoId) {
                getCidades(estadoId, 'PAS_CIDADEIDA');
            } else {
                document.getElementById('PAS_CIDADEIDA').innerHTML =
                    '<option value="">Selecione uma Cidade</option>';
            }
        });

        document.getElementById('PAS_ESTADOVOLTA').addEventListener('change', function() {
            const estadoId = this.value;
            if (estadoId) {
                getCidades(estadoId, 'PAS_CIDADEVOLTA');
            } else {
                document.getElementById('PAS_CIDADEVOLTA').innerHTML =
                    '<option value="">Selecione uma Cidade</option>';
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.text-slide');
            let currentSlide = 0;

            slides[currentSlide].classList.add('active');

            setInterval(() => {
                const nextSlide = (currentSlide + 1) % slides.length;

                slides[currentSlide].classList.remove('active');
                slides[currentSlide].classList.add('exit');

                slides[nextSlide].classList.add('enter');

                setTimeout(() => {
                    slides[currentSlide].classList.remove('exit');
                    slides[nextSlide].classList.remove('enter');
                    slides[nextSlide].classList.add('active');
                    currentSlide = nextSlide;
                }, 1000);
            }, 3000);
        });
    </script>

    <script>
        function showModalSell() {
            const modalSell = document.querySelector('.modal-sell');
            const overlayBackground = document.getElementById('overlay');

            modalSell.style.display = 'flex';
            overlayBackground.style.display = 'block';

            getEstados();
            getCidades();

            function closeModal() {
                modalSell.style.display = 'none';
                overlayBackground.style.display = 'none';
            }

            overlayBackground.addEventListener('click', closeModal);

            document.querySelector('.filter').addEventListener('click', function(e) {
                e.stopPropagation();
                modalSell.style.display = 'flex';
                overlayBackground.style.display = 'block';
            });
        }

        function showModalBus() {
            const modalBus = document.querySelector('.modal-bus');
            const overlayBackground = document.getElementById('overlay');

            modalBus.style.display = 'flex';
            overlayBackground.style.display = 'block';

            function closeModal() {
                modalBus.style.display = 'none';
                overlayBackground.style.display = 'none';
            }

            overlayBackground.addEventListener('click', closeModal);

            document.querySelector('.filter').addEventListener('click', function(e) {
                e.stopPropagation();
                modalBus.style.display = 'flex';
                overlayBackground.style.display = 'block';
            });
        }
    </script>

    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
        };

        @if (Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif

        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @endif
    </script>
</body>

</html>
