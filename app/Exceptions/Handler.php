<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
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
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (NotFoundHttpException $ex, $request) {
            if ($request->is('api/*') && $request->wantsJson()) {
                if ($ex->getPrevious() instanceof ModelNotFoundException) {
                    return response()->json([
                        'status' => Response::HTTP_NOT_FOUND,
                        'message' => 'No Events found.'
                    ], Response::HTTP_NOT_FOUND);
                }

                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' => 'Resource Route is not implemented yet.'
                ], Response::HTTP_NOT_FOUND);
            }
        });
    }
}
