<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Buspay | Home</title>

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

        .carrossel {
            max-width: 1200px;
            margin: 0 auto;
            overflow: hidden;
        }

        .carrossel .slick-slide img {
            width: 100%;
        }

        .title {
            text-align: center;
            color: #fff;
        }

        .primeira-dobra {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }

        .lado-esquerdo {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 80vw;
            gap: 1rem;
        }

        .lado-esquerdo h1 {
            color: #fff;
            font-size: 48px;
            /* animation: mudar-cor 3s infinite; */
        }

        .lado-esquerdo h1 span {
            border-bottom: 5px solid #1bd1b5;
        }

        .lado-esquerdo p {
            color: #fff;
            font-weight: 300;
        }

        .lado-esquerdo a button {
            padding: 10px 25px;
            color: #fff;
            background-color: #0f9984;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            animation: mudar-cor 3s infinite;
            transition: all 0.3s ease-in-out;
        }

        .lado-esquerdo a button:hover {
            transform: scale(1.1);
        }

        @keyframes mudar-cor {
            0% {
                background-color: #0f9984;
            }

            25% {
                background-color: #1bd1b5;
            }

            50% {
                background-color: #7affeb;
            }

            75% {
                background-color: #1bd1b5;
            }

            100% {
                background-color: #0f9984;
            }
        }

        .lado-direito {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(3, 1fr);
            gap: 10px;
            width: 50%;
            max-width: 600px;
            max-height: 600px;
        }

        .lado-direito img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }

        .lado-direito img:nth-child(1) {
            grid-column: span 3;
            grid-row: span 2;
        }

        .lado-direito img:nth-child(2) {
            grid-column: span 1;
            grid-row: span 2;
        }

        .lado-direito img:nth-child(3) {
            grid-column: span 1;
            grid-row: span 1;
        }

        .lado-direito img:nth-child(4) {
            grid-column: span 2;
            grid-row: span 1;
        }

        .lado-direito img:nth-child(5) {
            grid-column: span 1;
            grid-row: span 1;
        }

        .lado-direito img:nth-child(6) {
            grid-column: span 3;
            grid-row: span 1;
        }

        .lado-direito img:nth-child(7) {
            grid-column: span 1;
            grid-row: span 1;
        }

        .filter {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #2C3E50;
            cursor: pointer;
            transition: all 0.3s;
        }

        .filter svg {
            height: 16px;
            fill: #2C3E50;
            transition: all 0.3s;
        }

        .filter:hover {
            background-color: #2C3E50;
            border: 1px solid #fff;
        }

        .filter:hover svg {
            fill: white;
        }

        .segunda-dobra {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 96vw;
            margin: 2rem auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 15px;
        }

        .filtros-passagens {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            width: 100%;
            border-bottom: 0.1rem solid #d4d4d4;
        }

        .separator-div,
        .container-datas,
        form {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .separator-div p,
        .container-datas p {
            color: #2C3E50;
            font-weight: 700;
        }

        .separator-div input {
            width: 30rem;
            height: 30px;
            outline: none;
            border: 1px solid #2C3E50;
            border-radius: 5px;
            background-color: #fff;
            padding: 10px;
            color: #2C3E50;
            font-size: 400;
        }

        .container-datas input {
            height: 30px;
            outline: none;
            border: 1px solid #2C3E50;
            border-radius: 5px;
            background-color: #fff;
            padding: 10px;
            color: #2C3E50;
            font-size: 400;
        }

        .linha-dados {
            display: grid;
            grid-template-columns: 17fr 8fr 9fr 1fr 1fr;
            align-items: center;
            padding: 10px;
            margin: 10px 0;
            border-bottom: 1px solid #d4d4d4;
            gap: 1rem;
        }

        .linha-dados button,
        .container-datas button {
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

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            font-family: "Poppins", sans-serif;
            color: #fff;
        }

        .pagination a {
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

        .modal-filtro,
        .modal-registra-empresa {
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
        }

        .div-title-subtitle {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #2C3E50;
        }

        .modal-registra-empresa button {
            padding: 5px 15px;
            border-radius: 7px;
            color: #fff;
            background-color: #2C3E50;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            font-size: 18px;
            font-weight: 300;
        }

        .modal-registra-empresa button:hover {
            background-color: #112233;
        }

        .modal-filtro h3 {
            color: #2C3E50;
            font-size: 26px;
        }

        .span span {
            opacity: 0;
            user-select: none;
        }

        .inputs-filter {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .label-filter {
            display: flex;
            flex-direction: column;
            width: 25rem;
            color: #2C3E50;
        }

        .label-filter input {
            height: 40px;
            padding: 10px;
            outline: none;
            border: 1px solid #2C3E50;
            border-radius: 10px;
        }

        .btn-filter {
            background: #2C3E50;
            color: #fff;
            outline: none;
            border: none;
            padding: 5px 15px;
            border-radius: 10px;
            width: 150px;
            height: 45px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .btn-filter:hover {
            background: #112233;
        }

        #overlay {
            display: none;
            position: fixed;
            height: 100vh;
            width: 100vw;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 10;
        }

        header,
        .lado-esquerdo h1,
        .lado-esquerdo p,
        .lado-esquerdo a,
        .lado-direito img,
        .segunda-dobra {
            position: relative;
            z-index: 9 !important;
        }
    </style>

</head>

<body>
    <div id="particles-js" style="z-index: 8"></div>

    <div id="overlay"></div>


    <header>
        <nav>
            <img src="{{ asset('assets/logo_buspay.jpg') }}" width="70px">
            <ul class="ul-list">
                <li>
                    <a href="#passagens-lista">Comprar</a>
                </li>
                <li>
                    @if (Auth::user()->US_TIPOCOMPRADOR == 'Vendedor')
                        <a href="{{ route('vender-passagem') }}">Vender</a>
                    @else
                        <a href="" onclick="event.preventDefault(); ShowModalRegister()">Vender</a>
                    @endif
                </li>
            </ul>
            <div class="profile-session">
                <a href="#">
                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                            stroke="#2C3E50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>

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

    <div class="primeira-dobra">
        <div class="lado-esquerdo">
            <h1>Venha se aventurar <span>conosco!</span></h1>
            <p style="width: 60%">Aqui, você encontra as melhores ofertas de passagens de ônibus, com diversas opções de
                rotas, horários e
                empresas para escolher. Compare preços, selecione seu assento preferido e compre sua passagem com
                segurança e rapidez, tudo em um só lugar.
            </p>
            <a href="#passagens-lista">
                <button class="btn-comprar">Compre sua Passagem</button>
            </a>
        </div>
        <div class="lado-direito">
            <img src="{{ asset('assets/imgbus1.png') }}" width="300px">
            <img src="{{ asset('assets/imgbus2.png') }}" width="220px">
            <img src="{{ asset('assets/imgbus3.png') }}" width="180px">
            <img src="{{ asset('assets/imgbus4.png') }}" width="220px">
            <img src="{{ asset('assets/imgbus5.png') }}" width="220px">
            <img src="{{ asset('assets/imgbus6.png') }}" width="220px">
            <img src="{{ asset('assets/imgbus7.png') }}" width="220px">
        </div>
    </div>

    <div class="segunda-dobra" id="passagens-lista">
        <div class="filtros-passagens">
            <div class="separator-div">
                <p>BUSCAR PASSAGEM</p>
                <input type="text" name="" placeholder="Digite a Cidade" id="">
                <button title="filter" class="filter" onclick="handleOpenModalFiltros()">
                    <svg viewBox="0 0 512 512" height="1em">
                        <path
                            d="M0 416c0 17.7 14.3 32 32 32l54.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-246.7 0c-12.3-28.3-40.5-48-73.3-48s-61 19.7-73.3 48L32 384c-17.7 0-32 14.3-32 32zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM320 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32-80c-32.8 0-61 19.7-73.3 48L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l246.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48l54.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-54.7 0c-12.3-28.3-40.5-48-73.3-48zM192 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm73.3-64C253 35.7 224.8 16 192 16s-61 19.7-73.3 48L32 64C14.3 64 0 78.3 0 96s14.3 32 32 32l86.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 128c17.7 0 32-14.3 32-32s-14.3-32-32-32L265.3 64z">
                        </path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('passagens.index') }}" method="GET">
                <div class="container-datas">
                    <p>DE: </p>
                    <input type="date" name="date_from" id="date_from">
                    <p>A: </p>
                    <input type="date" name="date_to" id="date_to">
                    <button type="submit">
                        <svg height="20px" width="20px" version="1.1" id="_x32_"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 512 512" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill: #fff;
                                }
                            </style>
                            <g>
                                <path class="st0" d="M172.625,102.4c-42.674,0-77.392,34.739-77.392,77.438c0,5.932,4.806,10.74,10.733,10.74
  c5.928,0,10.733-4.808,10.733-10.74c0-30.856,25.088-55.959,55.926-55.959c5.928,0,10.733-4.808,10.733-10.74
  C183.358,107.208,178.553,102.4,172.625,102.4z" />
                                <path class="st0"
                                    d="M361.657,301.511c19.402-30.436,30.645-66.546,30.645-105.244C392.302,88.036,304.318,0,196.151,0
  c-38.676,0-74.765,11.25-105.182,30.663C66.734,46.123,46.11,66.759,30.659,91.008C11.257,121.444,0,157.568,0,196.267
  c0,108.217,87.998,196.266,196.151,196.266c38.676,0,74.779-11.264,105.197-30.677C325.582,346.396,346.206,325.76,361.657,301.511
  z M259.758,320.242c-19.075,9.842-40.708,15.403-63.607,15.403c-76.797,0-139.296-62.535-139.296-139.378
  c0-22.912,5.558-44.558,15.394-63.644c13.318-25.856,34.483-47.019,60.323-60.331c19.075-9.842,40.694-15.403,63.578-15.403
  c76.812,0,139.296,62.521,139.296,139.378c0,22.898-5.558,44.53-15.394,63.616C306.749,285.739,285.598,306.916,259.758,320.242z" />
                                <path class="st0"
                                    d="M499.516,439.154L386.275,326.13c-16.119,23.552-36.771,44.202-60.309,60.345l113.241,113.024
  c8.329,8.334,19.246,12.501,30.148,12.501c10.916,0,21.833-4.167,30.162-12.501C516.161,482.83,516.161,455.822,499.516,439.154z" />
                            </g>
                        </svg>
                    </button>
                </div>
            </form>

        </div>
        <div class="dados-passagens">
            @foreach ($passagens as $passagem)
                <div class="linha-dados">
                    <p>{{ $passagem->PAS_CIDADEIDA }}/{{ $passagem->PAS_ESTADOIDA }} -
                        {{ $passagem->PAS_CIDADEVOLTA }}/{{ $passagem->PAS_ESTADOVOLTA }}
                    </p>
                    <p>R${{ number_format($passagem->PAS_PRECO, 2, ',', '.') }}</p>
                    <p>{{ \Carbon\Carbon::parse($passagem->PAS_HORASIDA)->setTimezone('America/Sao_Paulo')->format('H:i') }}
                    </p>
                    <button class="salvar-passagem" data-id="{{ $passagem->id }}">
                        <svg fill="#fff" width="20px" height="20px" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.808,11.079C19.829,16.132,12,20.5,12,20.5s-7.829-4.368-8.808-9.421C2.227,6.1,5.066,3.5,8,3.5a4.444,4.444,0,0,1,4,2,4.444,4.444,0,0,1,4-2C18.934,3.5,21.773,6.1,20.808,11.079Z" />
                        </svg>
                    </button>
                    <a href="{{ route('buy-ticket', ['id' => $passagem->id]) }}">
                        <button>
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21 5L19 12H7.37671M20 16H8L6 3H3M16 5.5H13.5M13.5 5.5H11M13.5 5.5V8M13.5 5.5V3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                    stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            @php
                $totalPages = ceil($total / $perPage);
            @endphp

            @if ($currentPage > 1)
                <a href="{{ url()->current() }}?page={{ $currentPage - 1 }}" class="pagination-prev">
                    < </a>
                    @else
                        <span class="pagination-prev disabled">
                            < </span>
            @endif

            @for ($i = 1; $i <= $totalPages; $i++)
                @if ($i == $currentPage)
                    <span class="pagination-page current">{{ $i }}</span>
                @else
                    <a href="{{ url()->current() }}?page={{ $i }}"
                        class="pagination-page">{{ $i }}</a>
                @endif
            @endfor

            @if ($currentPage < $totalPages)
                <a href="{{ url()->current() }}?page={{ $currentPage + 1 }}" class="pagination-next"> > </a>
            @else
                <span class="pagination-next disabled"> > </span>
            @endif
        </div>

    </div>

    <div class="modal-filtro">
        <h3>FILTROS PERSONALIZADOS</h3>
        <div class="inputs-filter">
            <label class="label-filter" for="busca-cidade-ida">
                Busca por Cidade Ida
                <input type="text" name="busca-cidade-ida" id="busca-cidade-ida"
                    placeholder="Digite a Cidade de Ida">
            </label>
            <label class="label-filter" for="busca-cidade-volta">
                Busca por Cidade Volta
                <input type="text" name="busca-cidade-volta" id="busca-cidade-volta"
                    placeholder="Digite a Cidade de Volta">
            </label>
            <label class="label-filter" for="busca-empresa">
                Busca por Empresa
                <input type="text" name="busca-empresa" id="busca-empresa" placeholder="Digite a Empresa">
            </label>
            <button class="btn-filter">Filtrar</button>
        </div>
        <div class="span">
            <span>.</span>
        </div>
    </div>

    <div class="modal-registra-empresa">
        <div class="div-title-subtitle">
            <h1>Registre sua Empresa</h1>
            <p>E venda suas Passagens!</p>
        </div>
        <a href="{{ route('cadastro') }}">
            <button>Cadastrar Empresa</button>
        </a>
        <p></p>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://sdk.mercadopago.com/js/v2"></script>


<script>
    const mpPublicKey = "{{ env('PUBLIC_KEY_MP') }}";
    const mp = new MercadoPago(mpPublicKey);
    const bricksBuilder = mp.bricks();
    console.log(mp, 'mpmpmpmpmpmpmp');

    mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            preferenceId: "<PREFERENCE_ID>",
        },
        customization: {
            texts: {
                valueProp: 'smart_option',
            },
        },
    });
</script>

<script>
    function ShowModalRegister() {
        Toastify({
            text: "Oops..Sua conta não é de Vendedor.",
            className: "info",
            style: {
                background: "rgba(255, 0, 0, 0.5)",
            }
        }).showToast();
        const modalRegistraEmpresa = document.querySelector('.modal-registra-empresa');

        const overlayBackground = document.getElementById('overlay');

        modalRegistraEmpresa.style.display = 'flex';
        overlayBackground.style.display = 'block';

        function closeModal() {
            modalRegistraEmpresa.style.display = 'none';
            overlayBackground.style.display = 'none';
        }

        overlayBackground.addEventListener('click', closeModal);
    }
</script>

<script>
    const btnSalvar = document.querySelectorAll('.salvar-passagem');

    btnSalvar.forEach((button) => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const passagemId = this.getAttribute('data-id');

            fetch('{{ route('passagens.salvar') }}', {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: passagemId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    Toastify({
                        text: "Passagem salvada com sucesso!",
                        className: "info",
                        style: {
                            background: "#96c93d",
                        }
                    }).showToast();
                })
                .catch(error => {
                    console.error('Erro:', error);
                    Toastify({
                        text: "Falha ao salvar passagem.",
                        className: "info",
                        style: {
                            background: rgba(255, 0, 0, 0.5),
                        }
                    }).showToast();
                });
        });
    });
</script>

<script>
    function handleOpenModalFiltros() {
        const modalFiltros = document.querySelector('.modal-filtro');
        const overlayBackground = document.getElementById('overlay');

        modalFiltros.style.display = 'flex';
        overlayBackground.style.display = 'block';

        function closeModal() {
            modalFiltros.style.display = 'none';
            overlayBackground.style.display = 'none';
        }

        overlayBackground.addEventListener('click', closeModal);

        document.querySelector('.filter').addEventListener('click', function(e) {
            e.stopPropagation();
            modalFiltros.style.display = 'flex';
            overlayBackground.style.display = 'block';
        });
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const particlesJs = document.getElementById('particles-js');
        particlesJs.style.height = document.body.scrollHeight + 'px';
    });

    particlesJS("particles-js", {
        "particles": {
            "number": {
                "value": 100,
                "density": {
                    "enable": true,
                    "value_area": 1000
                }
            },
            "color": {
                "value": ["#00fffc", "#0f9984", "#1bd1b5", "#1bd1b5", "#7affeb"]
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                }
            },
            "opacity": {
                "value": 0.7,
                "random": true,
                "anim": {
                    "enable": true,
                    "speed": 0.5,
                    "opacity_min": 0.3,
                    "sync": false
                }
            },
            "size": {
                "value": 6,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 4,
                    "size_min": 0.3,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": false
            },
            "move": {
                "enable": true,
                "speed": 1,
                "direction": "none",
                "random": true,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 140,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 100,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });
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

</html>
