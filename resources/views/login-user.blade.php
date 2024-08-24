<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Buspay | Login</title>

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

        .inputContainer {
            display: flex;
            flex-direction: column;
            width: 300px;
            max-width: 300px;
        }

        .inputContainer label.text {
            font-size: 0.75rem;
            color: #2C3E50;
            font-weight: 700;
            position: relative;
            top: 0.5rem;
            margin: 0 0 0 7px;
            padding: 0 3px;
            background: #fff;
            width: fit-content;
        }

        .inputContainer input[type=email].input,
        .inputContainer input[type=password].input {
            padding: 11px 10px;
            font-size: 0.75rem;
            border: 2px #2C3E50 solid;
            border-radius: 10px;
            background: #fff;
        }

        .inputContainer input[type=email].input:focus,
        .inputContainer input[type=password].input:focus {
            outline: none;
        }

        .btn-login {
            padding: 10px;
            color: #fff;
            background-color: #2C3E50;
            border: none;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .btn-login:hover {
            color: #d4d4d4;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .span-content {
            opacity: 0;
            user-select: none;
        }
    </style>
</head>

<body>
    <div class="blur-container"></div>
    <div class="container-geral">
        <h1>Entrar</h1>
        <form action="{{ route('login-usuario') }}" method="POST">
            @csrf
            <div class="input-email">
                <div class="inputContainer">
                    <label for="US_EMAIL" class="text">Email</label>
                    <input type="email" placeholder="Email" name="US_EMAIL" id="US_EMAIL" class="input" required>
                </div>
            </div>
            <div class="input-senha">
                <div class="inputContainer">
                    <label for="US_SENHA" class="text">Senha</label>
                    <input type="password" placeholder="Senha" name="US_SENHA" id="US_SENHA" class="input" required>
                </div>
            </div>
            <button type="submit" class="btn-login">Entrar</button>
        </form>

        <div class="span-content">
            <span>.</span>
        </div>
    </div>


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

</body>

</html>
