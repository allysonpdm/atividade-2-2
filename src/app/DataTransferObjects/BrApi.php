<?php

namespace App\DataTransferObjects;

use App\DataTransferObjects\Api\Api;
use App\DataTransferObjects\Api\Endpoint;
use App\DataTransferObjects\Api\Parameter;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Data;

class BrApi extends Api
{
    public function __construct()
    {
        $this->domain = config('app.apis.brapi.domain');
        $this->token = config('app.apis.brapi.token');

        parent::__construct($this->domain, $this->token);
    }
}
