<?php
namespace App\Http\Responses;

use App\Http\Traits\SendsResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class NotFoundResponse implements Responsable
{
    use SendsResponse;

    public function __construct(
        public readonly array $data = ['error' => 'Resource Not Found'],
        public readonly int $status = Response::HTTP_NOT_FOUND,
    ){}
}
