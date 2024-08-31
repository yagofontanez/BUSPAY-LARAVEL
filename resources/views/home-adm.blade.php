<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            right: 48.5rem;
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
                    <li>Passagens</li>
                    <li>Clientes</li>
                    <li>Empresas</li>
                </ul>
            </div>
            <div class="perfil-sair">
                <div>
                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                            stroke="#2C3E50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
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
        <div class="tela-lado-direito"></div>
    </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    function openMenuLateral() {
        const menuLateral = document.querySelector('.menu-dashboard');
        const buttonOpenMenu = document.getElementById('btn-expand');
        const divButton = document.querySelector('.button-expand-menu');
        const ulList = document.querySelector('.ul-list');
        const logo = document.querySelector('.logo');

        if (menuLateral.style.width === '3rem' || menuLateral.style.width === '') {
            menuLateral.style.width = '10rem';
            divButton.style.right = '45rem';
            divButton.style.transform = 'rotate(180deg)';
            ulList.style.display = 'flex';
            logo.style.display = 'block';
        } else {
            menuLateral.style.width = '3rem';
            ulList.style.display = 'none';
            divButton.style.right = '48.5rem';
            divButton.style.transform = 'rotate(360deg)';
            logo.style.display = 'none';
        }
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

</html>
