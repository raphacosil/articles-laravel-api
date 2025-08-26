<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    public function render($request, \Throwable $e)
    {
        if ($e instanceof ModelNotFoundException) {
            return response()->json(['error' => 'Resource not found.'], 404);
        }
        if ($e instanceof \InvalidArgumentException) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
        if ($e instanceof NotFoundHttpException) {
            return response()->json(['error' => 'Http endpoint not found.'], 404);
        }
        if ($e instanceof ConflictHttpException) {
            return response()->json(['error' => 'Endpoint conflict'], 409);
        }

        return response()->json(['error' => $e->getMessage()], $e->getCode());
    }
}
