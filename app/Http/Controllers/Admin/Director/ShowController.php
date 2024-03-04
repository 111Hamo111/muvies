<?php


namespace App\Http\Controllers\Admin\Director;

use App\Http\Controllers\Controller;
use App\Models\Director;


class ShowController extends Controller
{
    public function __invoke(Director $director )
    {
        
        $films = $director->films;
        
        $country = $director->country_id; 
        return view('director.show' , compact('director','country','films'));
    }

   
}
