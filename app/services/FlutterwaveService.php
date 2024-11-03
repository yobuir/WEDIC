<?php

namespace App\Services;

use GuzzleHttp\Client;

class FlutterwaveService
{
    protected $baseUri;
    protected $secretKey;

    public function __construct()
    {
        $this->baseUri = 'https://api.flutterwave.com/v3';
        $this->secretKey = env('FLW_SECRET_KEY');
    }

    public function createPayment(array $data)
    {
        $client = new Client();
        $response = $client->post("{$this->baseUri}/payments", [
            'headers' => [
                'Authorization' => "Bearer {$this->secretKey}",
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function verifyPayment($transactionId)
    {
        $client = new Client();
        $response = $client->get("{$this->baseUri}/transactions/{$transactionId}/verify", [
            'headers' => [
                'Authorization' => "Bearer {$this->secretKey}",
                'Content-Type' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
