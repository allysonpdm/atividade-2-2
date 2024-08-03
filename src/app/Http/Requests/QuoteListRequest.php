<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuoteListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => [
                'string'
            ],
            'sortBy' => [
               'string',
                'in:name,close,change,change_abs,volume,market_cap_basic,sector'
            ],
            'sortOrder' => [
                'in:asc,desc'
            ],
            'limit' => [
                'integer',
                'min:1',
            ],
            'page' => [
                'integer',
                'min:1'
            ],
            'type' => [
                'in:stock,fund,bdr'
            ],
            'sector' => [
                Rule::in([
                    'Retail Trade',
                    'Energy Minerals',
                    'Health Services',
                    'Utilities',
                    'Finance',
                    'Consumer Services',
                    'Consumer Non-Durables',
                    'Non-Energy Minerals',
                    'Commercial Services',
                    'Distribution Services',
                    'Transportation',
                    'Technology Services',
                    'Process Industries',
                    'Communications',
                    'Producer Manufacturing',
                    'null',
                    'Miscellaneous',
                    'Electronic Technology',
                    'Industrial Services',
                    'Health Technology',
                    'Consumer Durables',
                ])
            ]
        ];
    }
}
