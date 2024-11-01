<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Buspay | Comprar</title>

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
            background-color: #cfcfcf;
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

        .container-geral {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 0 auto;
            width: 100%;
            max-width: 100vw;
            height: 100%;
            max-height: 100vh;
            padding: 4rem;
        }

        .card {
            display: flex;
            --bg-color: #212121;
            padding: 1rem 2rem;
            border-radius: 1.25rem;
        }

        .loader {
            color: rgb(124, 124, 124);
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-size: 25px;
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
            height: 40px;
            padding: 10px 10px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            border-radius: 8px;
        }

        .words {
            overflow: hidden;
            position: relative;
        }

        .words::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 20;
        }

        .word {
            display: block;
            height: 100%;
            padding-left: 6px;
            color: #2C3E50;
            animation: spin_4991 4s infinite;
        }

        @keyframes spin_4991 {
            10% {
                -webkit-transform: translateY(-102%);
                transform: translateY(-102%);
            }

            25% {
                -webkit-transform: translateY(-100%);
                transform: translateY(-100%);
            }

            35% {
                -webkit-transform: translateY(-202%);
                transform: translateY(-202%);
            }

            50% {
                -webkit-transform: translateY(-200%);
                transform: translateY(-200%);
            }

            60% {
                -webkit-transform: translateY(-302%);
                transform: translateY(-302%);
            }

            75% {
                -webkit-transform: translateY(-300%);
                transform: translateY(-300%);
            }

            85% {
                -webkit-transform: translateY(-402%);
                transform: translateY(-402%);
            }

            100% {
                -webkit-transform: translateY(-400%);
                transform: translateY(-400%);
            }
        }

        .lado-esquerdo {
            border-right: 0.1rem solid #2C3E50;
            height: 100vh;
            width: 60%;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-direction: column;
            gap: 1rem;
        }

        .lado-esquerdo h1 {
            color: #2C3E50;
        }

        .lado-direito {
            width: 30%;
        }

        .infos {
            width: 90%;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .infos div {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .infos div p {
            font-size: 1.2rem;
        }

        .strong-text {
            font-weight: 700;
            color: #2C3E50;
        }

        .btns {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 2rem;
            gap: 1.2rem;
        }

        .btns button {
            padding: 5px 10px;
            height: 3.5rem;
            border: none;
            border-radius: 7px;
            color: #fff;
            width: 20rem;
            cursor: pointer;
            transition: all 0.4s ease-in-out;
        }

        .btn-prosseguir {
            background-color: #2C3E50;
        }

        .btn-prosseguir:hover {
            box-shadow: -1px 0px 23px 2px rgba(44, 62, 80, 0.68);
            -webkit-box-shadow: -1px 0px 23px 2px rgba(44, 62, 80, 0.68);
            -moz-box-shadow: -1px 0px 23px 2px rgba(44, 62, 80, 0.68);
        }

        .btn-cancelar {
            background-color: rgba(255, 0, 0, 1);
        }

        .btn-cancelar:hover {
            box-shadow: -1px 0px 23px 2px rgba(255, 0, 0, 0.68);
            -webkit-box-shadow: -1px 0px 23px 2px rgba(255, 0, 0, 0.68);
            -moz-box-shadow: -1px 0px 23px 2px rgba(255, 0, 0, 0.68);
        }

        .aviso {
            width: 90%;
            border-style: dashed;
            font-size: 0.8rem;
            border: 0.1rem dashed #2C3E50;
            padding: 1rem;
        }

        #modal-payment {
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        #modal-payment img {
            border-radius: 15px;
            box-shadow: -1px 0px 23px 2px rgba(44, 62, 80, 0.3);
            -webkit-box-shadow: -1px 0px 23px 2px rgba(44, 62, 80, 0.3);
            -moz-box-shadow: -1px 0px 23px 2px rgba(44, 62, 80, 0.3);
        }

        .forma-pagamento {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            gap: 1rem;
        }

        .forma-pagamento h2 {
            color: #2C3E50;
        }

        #forma-pagamento {
            width: 100%;
            height: 3rem;
            border: none;
            outline: none;
            border-radius: 7px;
            color: #2C3E50;
            padding: 10px;
            font-size: 18px;
            font-weight: 600;
        }

        #wallet_container {
            display: none;
        }

        #btn-normal-pay,
        #btn-mercado-pago,
        #button-payment-normal {
            display: none;
            align-items: center;
            justify-content: center;
            padding: 5px 10px;
            background: #2C3E50;
            color: #fff;
            border: none;
            border-radius: 5px;
            width: 280px;
            height: 48px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        #btn-normal-pay:hover,
        #btn-mercado-pago:hover,
        #button-payment-normal:hover {
            background: #1A344E;
        }

        #overlay {
            display: none;
            position: fixed;
            height: 100vh;
            width: 100vw;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 10;
        }

        .modal-qrcode {
            display: none;
            align-items: center;
            flex-direction: column;
            justify-content: center;
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

        .btnvoltarmodal {
            display: flex;
            align-items: center;
            padding: 15px;
            border-radius: 50%;
            font-size: 17px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            color: #112233;
            position: relative;
            right: 200px;
            bottom: 0px;
            background: white;
            font-weight: 700;
            font-size: 30px;
        }

        .valuePayment {
            display: none;
        }

        .selected-poltrona {
            background-color: white;
        }
    </style>

</head>

<body>

    <div id="particles-js"></div>
    <div id="overlay"></div>

    <div class="container-geral">
        <div class="lado-esquerdo">
            <h1>Passagem selecionada: </h1>
            <div class="infos">
                <div class="cidade-ida">
                    <p class="strong-text">Cidade Ida:</p>
                    <p>{{ $passagem->PAS_CIDADEIDA }} / {{ $passagem->PAS_ESTADOIDA }}</p>
                </div>
                <div class="cidade-volta">
                    <p class="strong-text">Cidade Volta:</p>
                    <p>{{ $passagem->PAS_CIDADEVOLTA }} / {{ $passagem->PAS_ESTADOVOLTA }}</p>
                </div>
                <div class="data-ida">
                    <p class="strong-text">Data Ida:</p>
                    <p>
                        {{ \Carbon\Carbon::parse($passagem->PAS_DIAIDA)->format('d/m/Y') }} -
                        {{ \Carbon\Carbon::parse($passagem->PAS_HORASIDA)->setTimezone('America/Sao_Paulo')->format('H:i') }}
                    </p>
                </div>
                <div class="data-volta">
                    <p class="strong-text">Data Volta:</p>
                    <p>
                        {{ \Carbon\Carbon::parse($passagem->PAS_DIAVOLTA)->format('d/m/Y') }}
                        {{ \Carbon\Carbon::parse($passagem->PAS_HORASVOLTA)->setTimezone('America/Sao_Paulo')->format('H:i') }}
                    </p>
                </div>
            </div>
            <div class="btns">
                <button class="btn-prosseguir" onclick="showPayment()">Prosseguir com a Compra</button>
                <form action="{{ route('home') }}" method="head">
                    @csrf
                    <button class="btn-cancelar" type="submit">Cancelar Compra</button>
                </form>
            </div>
            <span class="aviso">Antes de finalizar sua compra, fique atento! Cancelamentos de passagens só poderão ser
                feitos até 24
                horas antes da viagem, com uma taxa de 10% sobre o valor total. Alterações de horário ou data estão
                sujeitas à disponibilidade e devem ser solicitadas com antecedência mínima de 48 horas. Não há
                reembolsos para cancelamentos feitos fora do prazo estipulado. Certifique-se de revisar todas as
                informações antes de prosseguir!</span>
        </div>
        <div class="lado-direito">
            <div id="aguardando" class="card">
                <div class="loader">
                    <p>Aguardando</p>
                    <div class="words">
                        <span class="word">confirmação</span>
                        <span class="word">compra</span>
                        <span class="word">seleção</span>
                        <span class="word">adição</span>
                        <span class="word">finalização</span>
                    </div>
                </div>
            </div>

            <div id="modal-payment">
                <div class="forma-pagamento">
                    <div
                        style="display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 10px;">
                        @foreach ($poltronas as $poltrona)
                            <div class="poltrona"
                                style="cursor: pointer; color: #2C3E50; width: 50px; height: 50px; border-radius: 8px; border: 1px solid #2C3E50; display: flex; align-items: center; justify-content: center;"
                                onclick="selectPoltrona(this)">
                                <h1 style="font-size: 16px; margin: 0;">{{ $poltrona->POL_NUMERO }}</h1>
                            </div>
                        @endforeach
                    </div>
                    <h2>Escolha a Forma de Pagamento</h2>
                    <select id="forma-pagamento" name="forma-pagamento">
                        <option value="empty"></option>
                        <option value="dinheiro">Dinheiro</option>
                        <option value="mercado-pago">Mercado Pago</option>
                    </select>
                    <form action="{{ route('mercadopago.create') }}" method="post" id="paymentForm"
                        style="display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 25px">
                        @csrf
                        <input type="hidden" name="PAS_PRECO" value="{{ $passagem->PAS_PRECO }}" id="PAS_PRECO">
                        <input type="hidden" name="selected_poltrona" id="selected_poltrona">
                        <input type="hidden" name="id" value="{{ $passagem->id }}" id="id">
                        <h2 class="valuePayment">R${{ number_format($passagem->PAS_PRECO, 2, ',', '.') }}</h2>
                        <button id="btn-mercado-pago" type="submit">Comprar com Mercado Pago</button>
                        <button id="button-payment-normal">Comprar com Dinheiro</button>
                    </form>
                </div>
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
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function selectPoltrona(element) {
        const poltronas = document.querySelectorAll('.poltrona');
        poltronas.forEach(poltrona => {
            poltrona.classList.remove('selected-poltrona');
        });

        element.classList.add('selected-poltrona');

        const poltronaNumero = element.querySelector('h1').innerText;
        document.getElementById('selected_poltrona').value = poltronaNumero;
    }
</script>

<script>
    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                }
            })
            .then(response => response.json())
            .then(data => {
                window.location.href = data.init_point;
                if (data.init_point) {
                    window.location.href = data.init_point;
                } else {
                    alert(data.error || 'Erro ao processar o pagamento.');
                }
            })
            .catch(error => console.error('Erro:', error));
    });
</script>

<script>
    const selectPayment = document.getElementById('forma-pagamento');
    const btnMercadoPago = document.getElementById('btn-mercado-pago');
    const btnPixPayment = document.getElementById('btn-normal-pay');
    const btnMoneyPayment = document.getElementById('button-payment-normal');
    const valuePayment = document.querySelector('.valuePayment');
    selectPayment.addEventListener('change', function() {
        if (selectPayment.value === 'mercado-pago') {
            btnMercadoPago.style.display = 'flex';
            valuePayment.style.display = 'flex';
            btnPixPayment.style.display = 'none';
            btnMoneyPayment.style.display = 'none';
        } else if (selectPayment.value === 'empty') {
            btnMercadoPago.style.display = 'none';
            btnPixPayment.style.display = 'none';
            valuePayment.style.display = 'none';
            btnMoneyPayment.style.display = 'none';
        } else if (selectPayment.value === 'pix') {
            btnPixPayment.style.display = 'flex';
            valuePayment.style.display = 'flex';
            btnMercadoPago.style.display = 'none';
            btnMoneyPayment.style.display = 'none';
        } else if (selectPayment.value === 'dinheiro') {
            btnMoneyPayment.style.display = 'flex';
            valuePayment.style.display = 'flex';
            btnPixPayment.style.display = 'none';
            btnMercadoPago.style.display = 'none';
        }
    })
</script>

<script>
    function showPayment() {
        const loadingAguardando = document.querySelector('.card');
        const ladoDireitoContainer = document.querySelector('.lado-direito');
        const modalPayment = document.getElementById('modal-payment');

        if (loadingAguardando.style.display !== 'none') {
            modalPayment.style.display = 'flex';
            ladoDireitoContainer.style.display = 'flex';
            ladoDireitoContainer.style.alignItems = 'center';
            ladoDireitoContainer.style.justifyContent = 'center';
            ladoDireitoContainer.style.margin = '0 auto';
            loadingAguardando.style.display = 'none';
        }
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
                "value": ["#c0c0c0", "#cfcfcf", "#fff"]
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
