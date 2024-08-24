<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

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
                overflow: hidden;
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
                flex-direction: column;
                align-items: center;
                justify-content: space-between;
                width: 30vw;
                height: 32rem;
                margin: 6rem auto;
                inset: 0;
                border-radius: 40px;
                background-color: #fff;
            }

            .container-geral h1 {
                color: #2C3E50;
            }

            .buttons-login {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
            }

            .buttons-login button {
                width: 20rem;
                height: 40px;
                border: none;
                outline: none;
                color: #fff;
                border-radius: 10px;
                transition: all 0.3s ease-in-out;
                cursor: pointer;
            }

            #btn-entrar-conv {
                background-color: #112233;
            }

            #btn-entrar-conv:hover {
                background-color: #06111d;
            }

            #btn-entrar-adm {
                background-color: #35506B;
            }

            #btn-entrar-adm:hover {
                background-color: #1A344E;
            }

            .buttons-login p {
                font-size: 14px;
                color: #2C3E50;
            }

            .buttons-login p a {
                font-weight: 600;
                transition: all 0.3s ease-in-out;
            }

            .buttons-login p a:hover {
                color: #06111d;
            }

            .span-hover {
                opacity: 0;
                user-select: none;
            }
        </style>
    </head>
    <body>
        <div class="blur-container"></div>
        <div class="container-geral">
            <h1>Login</h1>
            <div class="buttons-login">
                <a href="{{ route('login-user') }}">
                    <button id="btn-entrar-conv">Entrar</button>
                </a>
                <a href="{{ route('login-adm') }}">
                    <button id="btn-entrar-adm">Entrar como Administrador</button>
                </a>
                <p>Ainda não tem uma conta? <a href="{{ route('cadastro') }}">Cadastre-se</a></p>
                <p><a href="{{ route('cadastro-admin') }}">Cadastre um Administrador</a></p>
            </div>
            <div>
                <span class="span-hover">.</span>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</html>
