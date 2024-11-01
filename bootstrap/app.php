<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {

        $exceptions->render(function (AuthenticationException $e, Request $request) {
        if ($request->is('api/*')) {
            return response()->json([
                'message' => $e->getMessage()
            ], 401);
        }
        });

        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
        if ($request->is('api/*')) {
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
        }
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e, Request $request) {
        if ($request->is('api/*')) {
            return response()->json([
                'message' => "Something went wrong check your Method and your route"
            ], 404);
        }
        });

        $exceptions->render(function (QueryException $e, Request $request) {
        if ($request->is('api/*')) {
           return response()->json(['error'=>'Something went wrong check your query or input'],422);
        }
        });

    })->create();
