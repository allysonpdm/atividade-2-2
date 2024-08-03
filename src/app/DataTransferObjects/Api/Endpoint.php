<?php

namespace App\DataTransferObjects\Api;

use Spatie\LaravelData\Data;

class Endpoint extends Data
{
    public function __construct(
        public string $url,
        public string $method,
        public ?string $description = null,
        public array $parameters = [],
        public array $responses = [],
        public array $headers = [],
    )
    {

    }
}
