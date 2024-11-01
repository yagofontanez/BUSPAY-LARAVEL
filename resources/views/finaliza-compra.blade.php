<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Compra Finalizada! | BusPay</title>

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
            background-color: blue;
        }

        .container {
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          gap: 1rem;
          background-color: white;
          padding: 2rem;
          border-radius: 8px;
        }
        
        .botoes {
          display: flex;
          align-items: center;
          justify-content: center;
          gap: 10px;
        }
        
        .btn {
          padding: 5px 10px;
          border-radius: 8px;
          color: white;
          background-color: blue;
          border: 1px solid blue;
          cursor: pointer;
          font-size: 18px;
          transition: all 0.3s ease-in-out;
        }
        
        .btn:hover {
          background-color: white;
          color: blue;
        }
    </style>
</head>

<body>

  <div class="container">
        <h1>Passagem comprada com sucesso!</h1>
        <span>Dados da passagem:</span>
        <p>Cidade de Ida: {{ $passagem->PAS_CIDADE_IDA }}</p>
        <p>Estado de Ida: {{ $passagem->PAS_ESTADO_IDA }}</p>
        <p>Cidade de Volta: {{ $passagem->PAS_CIDADE_VOLTA }}</p>
        <p>Poltrona: {{ $passagem->PAS_POLTRONA }}</p>
        <h2>Seu QRCode para entrada está abaixo:</h2>
        
        <img src="{{ asset('assets/frame.png') }}" width="250" alt="QR Code" />
        
        <div class="botoes">
            <button onclick="downloadImage()" class="btn">Download</button>
            <form action="{{ route('home-adm') }}">
                @csrf
                <button type="submit" class="btn">Voltar para a home</button>
            </form>
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
  const downloadImage = () => {
    const qrCodeImg = document.querySelector('img[alt="QR Code"]');

    const link = document.createElement('a');
    link.href = qrCodeImg.src;

    link.download = 'qrcode.png';
        
    link.click();
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