<?php


namespace App\Http\Controllers;

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    protected function authenticate()
    {
        $mpAccessToken = env('ACCESS_TOKEN_MP');

        MercadoPagoConfig::setAccessToken(env('ACCESS_TOKEN_MP'));
    }

    public function createPaymentPreference(Request $request)
    {
        $this->authenticate();

        $product = [
            'id' => (string) $request->id,
            'title' => "Passagem " . $request->id,
            'description' => "Descrição da passagem " . $request->id,
            'currency_id' => "BRL",
            'quantity' => 1,
            'unit_price' => (float) $request->PAS_PRECO
        ];

        $items = [$product];

        $payer = [
            'name' => 'Yago',
            'surname' => 'Fontanez',
            'email' => 'yagofontanez20@icloud.com'
        ];

        $requestData = $this->createPreferenceRequest($items, $payer);

        $client = new PreferenceClient();

        try {
            $preference = $client->create($requestData);
            return response()->json(['init_point' => $preference->init_point]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function createPreferenceRequest($items, $payer)
    {
        $paymentMethods = [
            "excluded_payment_methods" => [],
            "installments" => 12,
            "default_installments" => 1
        ];

        $backurls = [
            'success' => route('home'),
            'failure' => route('login')
        ];

        return [
            'items' => $items,
            'payer' => $payer,
            'paymentMethods' => $paymentMethods,
            'back_urls' => $backurls,
            'statement_descriptor' => 'BUSPAY',
            'external_reference' => '1234567890',
            'expires' => false,
            'auto_return' => 'approved',
        ];
    }

    public function getPreferenceById($preferenceId)
    {
        $this->authenticate();

        $client = new PreferenceClient();

        try {
            $preference = $client->get($preferenceId);

            return response()->json($preference);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
