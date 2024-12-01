<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (Throwable $e) {
            $statusCode = $this->getStatusCode($e);
            $viewPath = "errors.$statusCode";
            $message = $e->getMessage() ?: __('errors.default');

            if (view()->exists($viewPath)) {
                return response()->view($viewPath, ['message' => $message, 'statusCode' => $statusCode], $statusCode);
            }

            // If no custom view exists, return a JSON response with the status and message
            return response()->json([
                'status' => $statusCode,
                'message' => $message,
            ], $statusCode);
        });
    }

    /**
     * Get the status code for the given exception.
     */
    protected function getStatusCode(Throwable $e): int
    {
        // Check if the exception has a status code method
        if (method_exists($e, 'getStatusCode')) {
            return $e->getStatusCode();
        }

        // Default to 500 for any exception without a status code
        return Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}
