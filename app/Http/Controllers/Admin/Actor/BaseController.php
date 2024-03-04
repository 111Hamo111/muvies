<?php

namespace App\Http\Controllers\Admin\Actor;

use App\Http\Controllers\Controller;
use App\Service\ActorService;

class BaseController extends Controller
{
    public $service;

    public function __construct(ActorService $service)
    {
        $this->service = $service;
    }

}
