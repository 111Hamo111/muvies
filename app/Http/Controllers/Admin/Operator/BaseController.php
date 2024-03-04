<?php

namespace App\Http\Controllers\Admin\Operator;

use App\Http\Controllers\Controller;
use App\Service\OperatorService;

class BaseController extends Controller
{
    public $service;

    public function __construct(OperatorService $service)
    {
        $this->service = $service;
    }

}
