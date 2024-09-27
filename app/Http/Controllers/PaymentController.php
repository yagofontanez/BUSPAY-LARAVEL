<?php


namespace App\Http\Controllers;

use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Common\RequestOptions;
use Illuminate\Http\Request;
use MercadoPago\Client\Payment\PaymentClient;

class PaymentController extends Controller
{
    public function createPayment(Request $request)
    {
        MercadoPagoConfig::setAccessToken(env('ACCESS_TOKEN_MP'));

        $client = new PaymentClient();

        try {
            $request = [
                "transaction_amount" => 100,
                "token" => "YOUR_CARD_TOKEN",
                "description" => "description",
                "installments" => 1,
                "payment_method_id" => "visa",
                "payer" => [
                    "email" => "user@test.com",
                ]
            ];

            $request_options = new RequestOptions();
            $request_options->setCustomHeaders(["X-Idempotency-Key: <SOME_UNIQUE_VALUE>"]);

            $payment = $client->create($request, $request_options);
            echo $payment->id;


        } catch (MPApiException $e) {
            echo "Status code: " . $e->getApiResponse()->getStatusCode() . "\n";
            echo "Content: ";
            var_dump($e->getApiResponse()->getContent());
            echo "\n";
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
