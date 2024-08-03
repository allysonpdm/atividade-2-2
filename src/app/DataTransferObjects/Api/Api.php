<?php

namespace App\DataTransferObjects\Api;

use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Data;

class Api extends Data
{

    public function __construct(
        public string $domain,
        public string $token,
        public array $endpoints = [],
    ) {
    }

}
