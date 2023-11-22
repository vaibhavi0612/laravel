<?php
namespace App\Http\Responses;

use App\Http\Traits\SendsResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class UnauthorizedResponse implements Responsable
{
    use SendsResponse;

    public function __construct(
        public readonly array $data = [
            'error' => 'Unauthorized'
        ],
        public readonly int $status = Response::HTTP_UNAUTHORIZED,
    ){}
}