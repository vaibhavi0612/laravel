<?php
namespace App\Http\Responses;

use App\Http\Traits\SendsResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;

class MessageResponse implements Responsable
{
    use SendsResponse;

    public function __construct(
        public readonly mixed $data,
        public readonly mixed $meta = null,
        public readonly int $status = Response::HTTP_OK,
    ){}
}
