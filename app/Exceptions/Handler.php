<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function(ValidationException $exception, $request) {
            return $this->convertValidationExceptionToResponse($exception, $request);
        });

        $this->renderable(function(ModelNotFoundException $exception, $request) {
            $modelName = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse('Not found entity {$modelName} with this id', 404);
        });

        $this->renderable(function(NotFoundHttpException $exception, $request) {
            return $this->errorResponse('Not found', 404);
        });

        $this->renderable(function(MethodNotAllowedHttpException $exception, $request) {
            return $this->errorResponse('Method not allowed', 405);
        });

        $this->renderable(function(\HttpException $exception, $request) {
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        });

        $this->renderable(function(QueryException $exception, $request) {
            return $this->errorResponse('Error in database', 409);
        });

        $this->renderable(function(\Exception $exception, $request) {
            return $this->errorResponse($exception->getMessage());
        });
    }

    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $exception, $request): \Symfony\Component\HttpFoundation\Response
    {
        $errors = $exception->validator->errors()->getMessages();
        return $this->errorResponse($errors, 422);
    }
}
