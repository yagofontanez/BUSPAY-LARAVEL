<?php

require __DIR__ . '/vendor/autoload.php';

use MercadoPago\SDK;

SDK::setAccessToken('SUA_ACCESS_TOKEN');
echo "SDK Mercado Pago carregada com sucesso!";
