<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class CustomExceptionHandler extends ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // Handle NotFoundHttpException
        if ($exception instanceof NotFoundHttpException) {
            return response()->json(['error' => 'Такой маршрут в системе не найден'], Response::HTTP_NOT_FOUND);
        }
        
        // Handle HttpException
        if ($exception instanceof HttpException) {
            return response()->json(['error' => $exception->getMessage()], $exception->getStatusCode());
        }

        // Handle QueryException
        if ($exception instanceof QueryException) {
            return response()->json(['error' => 'Ошибка базы данных'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(['error' => 'Неописанная ошибка', 'message' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
