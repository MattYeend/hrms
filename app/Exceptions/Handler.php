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
            if (view()->exists($viewPath)) {
                return response()->view($viewPath, [], $statusCode);
            }
    
            return response()->json([
                'status' => $statusCode,
                'message' => $e->getMessage(),
            ], $statusCode);
        });    
    }

    protected function getStatusCode(Throwable $e): int
    {
        if (method_exists($e, 'getStatusCode')) {
            return $e->getStatusCode();
        }

        // Default to 500 for other exceptions
        return Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}
