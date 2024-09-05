
<?php

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
MercadoPagoConfig::setAccessToken("PROD_ACCESS_TOKEN");


$client = new PreferenceClient();
$preference = $client->create([
  "items"=> array(
    array(
      "title" => "Meu produto",
      "quantity" => 1,
      "unit_price" => 25
    )
  )
]);
?>
