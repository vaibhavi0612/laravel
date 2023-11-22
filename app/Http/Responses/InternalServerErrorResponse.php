<?php
namespace App\Http\Responses;

use App\Http\Traits\SendsResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class InternalServerErrorResponse implements Responsable
{
    use SendsResponse;

    public function __construct(
        public readonly array $data,
        public readonly int $status = Response::HTTP_INTERNAL_SERVER_ERROR,
    ){}
}
