<?php

namespace App\Http\Controllers\Admin\Director;

use App\Http\Controllers\Controller;
use App\Models\Country;

class CreateController extends Controller
{
  public function __invoke()
  {
    $countries = Country::all();
    return view('director.create', compact('countries'));
  }
}
