<?php

namespace App\Http\Controllers;

class HealthController extends ApiController
{
    public function index() {
        return $this->successResponse('OK');
    }
}
