<?php

namespace App\Http\Controllers\Admin\Director;

use App\Http\Controllers\Controller;
use App\Service\DirectorService;

class BaseController extends Controller
{
    public $service;

    public function __construct(DirectorService $service)
    {
        $this->service = $service;
    }

}
