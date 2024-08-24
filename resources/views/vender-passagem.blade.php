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
            gap: 4rem;
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

        .modal-sell {
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

        #overlay {
            display: none;
            position: fixed;
            height: 100vh;
            width: 100vw;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 10;
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
                <li><a href="">Buscar Passagens</a></li>
            </ul>
            <div class="profile-session">
                <a href="">
                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                            stroke="#2C3E50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <a href="">
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
    </div>

    <div class="listagem-passagens-vendidas">

    </div>


    <div class="modal-sell">
        <p>oiiii modalzinho</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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