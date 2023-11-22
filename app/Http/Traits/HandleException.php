<?php

namespace App\Http\Traits;

use App\Http\Responses\BadRequestResponse;
use App\Http\Responses\InternalServerErrorResponse;
use App\Http\Responses\NotFoundResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

trait HandleException
{
    /**
     * Log an error message along with some request information.
     *
     * @param  Throwable  $e
     * @param  Illuminate\Http\Request  $request
     * @param  string  $message
     * @return void
     */
    protected function logError(\Throwable $e, Request $request = null, string $message): void
    {
        $info = [
            'exception' => $e,
        ];

        $request && $info = array_merge($info, [
            'method' => $request->method(),
            'url' => $request->url(),
            'ip' => $request->ip(),
        ]);

        Log::error($message, $info);
    }

    /**
     * Handle the exception thrown by the model.
     *
     * @param  Illuminate\Database\Eloquent\ModelNotFoundException  $e
     * @return Illuminate\Http\JsonResponse
     */
    protected function modelNotFound(ModelNotFoundException $e, Request $request = null): NotFoundResponse
    {
        $message = 'Resource not found.';
        $this->logError($e, $request, $message);
        return new NotFoundResponse(['error' => $message]);
    }

    /**
     * Handle the exception thrown during validation.
     *
     * @param  Illuminate\Validation\ValidationException  $e
     * @return Illuminate\Http\JsonResponse
     */
    protected function validationError(ValidationException $e, Request $request = null): BadRequestResponse
    {
        $this->logError($e, $request, $e->getMessage());
        return new BadRequestResponse(['error' => 'Bad Request', 'errors' => $e->errors()]);
    }

    /**
     * Handle any other exception.
     *
     * @param  Throwable  $e
     * @return Illuminate\Http\JsonResponse
     */
    protected function otherError(\Throwable $e, Request $request = null): InternalServerErrorResponse
    {
        $this->logError($e, $request, $e->getMessage());
        $payload = ['error' => 'Internal Server Error'];

        // env('APP_DEBUG', false) &&
        $payload = array_merge($payload, [
            'exception_message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTrace(),
        ]);

        return new InternalServerErrorResponse($payload, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  Throwable  $e
     * @return Illuminate\Http\JsonResponse
     */
    public function renderException(mixed $e, $request = null): mixed
    {
        if ($e instanceof ModelNotFoundException) {
            return $this->modelNotFound($e, $request);
        } elseif ($e instanceof ValidationException) {
            return $this->validationError($e, $request);
        } else {
            return $this->otherError($e, $request);
        }
    }
}
