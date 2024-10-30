<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastrar</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
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
            background-image: url('{{ asset('assets/bgd1.jpg') }}');
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
            height: 43rem;
            margin: 2rem auto;
            inset: 0;
            border-radius: 40px;
            background-color: #2C3E50;
        }

        .container-geral form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .container-geral h1 {
            color: #fff;
        }

        .buttons-cadastro {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .btn-voltar {
            width: 40px;
            height: 40px;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            top: 0.6rem;
            right: 11.5rem;
        }

        .btn-voltar a {
            position: relative;
            top: 0.1rem;
            right: 0.1rem;
        }

        .btn-voltar svg {
            fill: #ffffff;
        }

        #div-label label {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            color: #fff;
            font-weight: 300;

        }

        #div-label label input,
        #div-label label select {
            width: 20rem;
            height: 50px;
            outline: none;
            border: none;
            color: #2C3E50;
            background-color: #fff;
            border-radius: 10px;
            padding: 1rem;
        }

        #div-label label input:focus {
            border: 1px solid #06111d;
            outline: 1px solid #06111d;
            box-shadow: 0px 3px 34px -12px rgba(6, 17, 29, 1);
            -webkit-box-shadow: 0px 3px 34px -12px rgba(6, 17, 29, 1);
            -moz-box-shadow: 0px 3px 34px -12px rgba(6, 17, 29, 1);
        }

        .btn-cadastrar {
            padding: 10px;
            background-color: #fff;
            color: #2C3E50;
            border: none;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .btn-cadastrar:hover {
            background-color: #d4d4d4;
        }

        .label-cnpj,
        .label-empresa {
            display: none;
        }
    </style>
</head>

<body>
    <div class="blur-container"></div>
    <div class="container-geral">
        <div class="btn-voltar">
            <a href="{{ route('login') }}">
                <svg width="22px" height="22px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z"
                        fill="#2C3E50" />
                </svg>
            </a>
        </div>
        <h1>Cadastro</h1>
        <form action="{{ route('cadastro-post') }}" method="POST">
            @csrf
            <div id="div-label" class="tipo-comprador">
                <label id="tipocomp" for="US_TIPOCOMPRADOR">
                    Tipo Cadastro
                    <select name="US_TIPOCOMPRADOR" id="US_TIPOCOMPRADOR">
                        <option value="{{ \App\TipoComprador::PESSOA_FISICA->value }}">Comprador</option>
                        <option value="{{ \App\TipoComprador::PESSOA_JURIDICA->value }}">Vendedor</option>
                    </select>
                </label>
            </div>
            <div id="div-label" class="nome">
                <label for="US_NOME" class="label-nome">
                    Nome Completo
                    <input type="text" name="US_NOME" placeholder="Nome Completo" id="US_NOME">
                </label>
                <label for="US_NOME" class="label-empresa">
                    Nome Empresa
                    <input type="text" name="US_NOME" placeholder="Nome Completo" id="US_NOME_EMP">
                </label>
            </div>
            <div id="div-label" class="email">
                <label for="US_EMAIL">
                    E-mail
                    <input type="email" name="US_EMAIL" placeholder="E-mail" id="US_EMAIL" required>
                </label>
            </div>
            <div id="div-label" class="senha">
                <label for="US_SENHA">
                    Senha
                    <input type="password" name="US_SENHA" placeholder="Senha" id="US_SENHA" required>
                </label>
            </div>
            <div id="div-label" class="documento">
                <label for="US_DOCUMENTO" id="documento-label">
                    Documento
                    <input type="text" name="US_DOCUMENTO" placeholder="CPF ou CNPJ" id="US_DOCUMENTO" onblur="formatDocumento(this)">
                </label>
            </div>
            <button type="submit" class="btn-cadastrar">Cadastrar</button>
        </form>

        <div>
            <span class="span-hover">.</span>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipoComprador = document.getElementById('US_TIPOCOMPRADOR');
            const documentoInput = document.getElementById('US_DOCUMENTO');
            const documentoLabel = document.getElementById('documento-label');

            function toggleDocumentoFields() {
                if (tipoComprador.value === '{{ \App\TipoComprador::PESSOA_JURIDICA->value }}') {
                    documentoInput.placeholder = "CNPJ";
                    documentoInput.maxLength = 18;
                } else {
                    documentoInput.placeholder = "CPF";
                    documentoInput.maxLength = 14;
                }
            }

            function formatDocumento(input) {
                let value = input.value.replace(/\D/g, '');
                if (tipoComprador.value === '{{ \App\TipoComprador::PESSOA_JURIDICA->value }}') {
                    if (value.length <= 14) {
                        value = value.replace(/(\d{2})(\d)/, '$1.$2');
                        value = value.replace(/(\d{3})(\d)/, '$1.$2');
                        value = value.replace(/(\d{3})(\d)/, '$1/$2');
                        value = value.replace(/(\d{4})(\d{1,2})$/, '$1-$2');
                    }
                } else {
                    if (value.length <= 11) {
                        value = value.replace(/(\d{3})(\d)/, '$1.$2');
                        value = value.replace(/(\d{3})(\d)/, '$1.$2');
                        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                    }
                }
                input.value = value;
            }

            tipoComprador.addEventListener('change', toggleDocumentoFields);
            toggleDocumentoFields();
        });

        function formatCPF(input) {
            let value = input.value.replace(/\D/g, '');
            if (value.length <= 11) {
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            }
            input.value = value;
        }

        function formatCNPJ(input) {
            let value = input.value.replace(/\D/g, '');
            if (value.length <= 14) {
                value = value.replace(/(\d{2})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1/$2');
                value = value.replace(/(\d{4})(\d{1,2})$/, '$1-$2');
            }
            input.value = value;
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>
