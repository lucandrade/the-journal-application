<?php

namespace App\Controllers;

use Orno\Http\Request;
use Orno\Http\JsonResponse;
use App\Controllers\BaseController;

class NotFound extends BaseController
{
    public function get(Request $request)
    {
        return new JsonResponse([
            'status_code' => 400,
            'message' => 'Page not found'
        ]);
    }
}
