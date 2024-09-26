<?php


namespace App\Http\Controllers;
require_once 'vendor/autoload.php';

use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Common\RequestOptions;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPayment(Request $request)
    {
        MercadoPagoConfig::setAccessToken(env('MP_ACCESS_TOKEN'));

        $client = new PaymentClient();

        try {
            $paymentData = [
                "transaction_amount" => $request->input('amount', 100),
                "token" => $request->input('token'),
                "description" => "Compra de passagem de ônibus",
                "installments" => $request->input('installments', 1),
                "payment_method_id" => $request->input('payment_method_id', 'visa'),
                "payer" => [
                    "email" => $request->input('email', 'user@test.com'),
                ]
            ];

            $requestOptions = new RequestOptions();
            $requestOptions->setCustomHeaders([
                "X-Idempotency-Key: " . uniqid()
            ]);

            $payment = $client->create($paymentData, $requestOptions);

            return response()->json([
                'status' => 'success',
                'payment_id' => $payment->id,
                'payment_status' => $payment->status
            ], 200);

        } catch (MPApiException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Erro na API do Mercado Pago',
                'status_code' => $e->getApiResponse()->getStatusCode(),
                'error_content' => $e->getApiResponse()->getContent()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
