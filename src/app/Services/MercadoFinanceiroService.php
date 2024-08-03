<?php

namespace App\Services;

use App\DataTransferObjects\Api\Api;
use App\DataTransferObjects\Api\Endpoint;
use App\DataTransferObjects\BrApi;
use Illuminate\Support\Facades\Http;

class MercadoFinanceiroService
{
    protected Api $api;
    public function __construct()
    {
        $this->api = new BrApi();
    }

    public function quoteList(array $filters = []): mixed
    {

        $this->api->endpoints['quote-list'] = new Endpoint(
            url: $this->api->domain . '/api/quote/list',
            method: 'GET',
            description: 'Obter informações detalhadas sobre cotações de ações, fundos, índices e BDRs permitindo que você obtenha um resumo de todos os tickers disponíveis. Ela oferece flexibilidade para ordenar, filtrar e buscar os tickers que você deseja.',
            parameters: [
                'token' => $this->api->token,
                ...$filters
            ],
        );

        $endpoint = $this->api->endpoints['quote-list'];

        $response = Http::get(
            url: $endpoint->url,
            query: $endpoint->parameters
        );
        $json = $response->json();
        //shuffle($json['stocks']);
        return $json;
    }
}
