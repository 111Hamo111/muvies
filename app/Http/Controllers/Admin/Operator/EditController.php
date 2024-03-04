<?php

namespace App\Http\Controllers\Admin\Operator;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Operator;

class EditController extends Controller
{
  public function __invoke(Operator $operator)
  {
    $countries = Country::all();
    return view('operator.edit', compact('countries','operator'));
  }
}

