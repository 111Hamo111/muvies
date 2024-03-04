<?php

namespace App\Http\Controllers\Admin\Operator;

use App\Http\Controllers\Controller;
use App\Models\Operator;

class IndexController extends Controller
{
    public function __invoke()
    {
        $operators = Operator::all();
        return view('operator.index', compact('operators'));
        
    }
}
