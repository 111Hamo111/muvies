<?php


namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Operator;


class ShowController extends Controller
{
    public function __invoke(Operator $operator)
    {

        $films = $operator->films;



        $country = $operator->country_id;
        return view('operator.show', compact('operator', 'country', 'films'));
    }
}
