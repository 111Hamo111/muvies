<?php

namespace App\Http\Controllers\Admin\Operator;

use App\Http\Controllers\Controller;
use App\Models\Country;

class CreateController extends Controller
{
  public function __invoke()
  {
    $countries = Country::all();
    return view('operator.create', compact('countries'));
  }
}

