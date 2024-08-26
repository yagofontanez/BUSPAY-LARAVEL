<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Buspay</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <!-- Styles -->
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Poppins", sans-serif;
            }

            a {
                color: inherit;
            }

            body {
                background-image: url('{{ asset('assets/bgd2.jpg') }}');
                background-size: cover;
                background-position: top;
                background-repeat: no-repeat;
                margin: 0;
                padding: 0;
            }

            .blur-container {
                backdrop-filter: blur(10px);
                width: 100vw;
                height: 100vh;
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1;
            }

            .container-geral {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 50vw;
                height: 23rem;
                margin: 10rem auto;
                inset: 0;
                border-radius: 40px;
            }

            .container-esquerda {
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #fff;
                width: 50%;
                height: 100%;
                border-radius: 40px 0px 0px 40px;
            }

            .container-esquerda img {
                box-shadow: 7px 11px 21px -1px rgba(44,62,80,0.33);
                -webkit-box-shadow: 7px 11px 21px -1px rgba(44,62,80,0.33);
                -moz-box-shadow: 7px 11px 21px -1px rgba(44,62,80,0.33);
                transition: all 0.3s ease-in-out;
            }

            .container-esquerda img:hover {
                transform: scale(1.1);
            }

            .container-direita {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 1rem;
                width: 50%;
                height: 100%;
                background-color: #2C3E50;
                border-radius: 0px 40px 40px 0px;
            }

            .div-container-direita {
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-direction: column;
                gap: 4rem;
            }

            .div-container-direita h1 {
                font-size: 48px;
                color: #fff;
            }

            .div-container-direita h3 {
                font-size: 18px;
                color: #fff;
                font-weight: 300;
            }

            .buttons-container {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                justify-content: center;
                gap: 0.5rem;
            }

            .buttons-container a {
                color: #fff;
                font-size: 12px;
                font-weight: 300;
            }

            .buttons-container button {
                width: 15rem;
                height: 40px;
                border: none;
                outline: none;
                border-radius: 10px;
                cursor: pointer;
                transition: all 0.3s ease-in-out;
            }

            #btn-entrar {
                background-color: #112233;
                color: #fff;
            }

            #btn-entrar:hover {
                background-color: #06111d;
            }

            #btn-cadastrar {
                background-color: #fff;
                color: #112233;
            }

            #btn-cadastrar:hover {
                background-color: #d4d4d4;
            }
        </style>
    </head>
    <body>
        <div class="blur-container"></div>
        <div class="container-geral">
            <div class="container-esquerda">
                <img src="{{ asset('assets/logo_buspay.jpg') }}" width="220px">
            </div>
            <div class="container-direita">
                <div class="div-container-direita">
                    <h1>BusPay</h1>
                    <h3>Bem vindo(a)!</h3>
                    <div class="buttons-container">
                        <a href="{{ route('login') }}">
                            <button id="btn-entrar">Entrar</button>
                        </a>
                        <a href="{{ route('cadastro') }}">
                            <button id="btn-cadastrar">Cadastrar</button>
                        </a>
                        <a target="_blank" href="https://github.com/yagofontanez/BUSPAY-LARAVEL">Saiba Mais</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
        };

        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif

        @if(Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @endif
    </script>
</html>
