<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteListRequest;
use Illuminate\Http\Request;
use App\Services\MercadoFinanceiroService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class MercadoFinanceiroController extends Controller
{

    public function __construct(
        protected MercadoFinanceiroService $service,
    ) {
    }

    public function mapTree(): View
    {
        return view(
            'map-tree',
            [
                'fields' => [
                    'name' => 'Nome do ticker',
                    'close' => 'Preço de fechamento',
                    'change' => 'Variação percentual',
                    'change_abs' => 'Variação no preço absoluto',
                    'volume' => 'Volume de negociação',
                    'market_cap_basic' => 'Capitalização de mercado',
                    'sector' => 'Setor da ação',
                ],
                'types' => [
                    'stock' => 'Ações',
                    'fund' => 'Fundos',
                    'bdr' => 'BDRs',
                ],
                'sectors' => [
                    'Retail Trade' => 'Comércio Varejista',
                    'Energy Minerals' => 'Minerais Energéticos',
                    'Health Services' => 'Serviços de Saúde',
                    'Utilities' => 'Utilidades',
                    'Finance' => 'Finanças',
                    'Consumer Services' => 'Serviços ao Consumidor',
                    'Consumer Non-Durables' => 'Bens de Consumo Não Duráveis',
                    'Non-Energy Minerals' => 'Minerais não Energéticos',
                    'Commercial Services' => 'Serviços Comerciais',
                    'Distribution Services' => 'Serviços de Distribuição',
                    'Transportation' => 'Transporte',
                    'Technology Services' => 'Serviços de Tecnologia',
                    'Process Industries' => 'Indústrias de Processo',
                    'Communications' => 'Comunicações',
                    'Producer Manufacturing' => 'Manufatura de Produtores',
                    'null' => 'Outros',
                    'Miscellaneous' => 'Diversos',
                    'Electronic Technology' => 'Tecnologia Eletrônica',
                    'Industrial Services' => 'Serviços Industriais',
                    'Health Technology' => 'Tecnologia de Saúde',
                    'Consumer Durables' => 'Bens de Consumo Duráveis'
                ]
            ]
        );
    }

    public function buy(): View
    {
        return view('buy', ['acoes' => []]);
    }

    public function quoteList(QuoteListRequest $request): JsonResponse
    {
        return response()
            ->json($this->service->quoteList($request->validated()));
    }
}
