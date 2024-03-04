<?php

namespace App\Http\Controllers\Admin\country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\StoreRequest;
use App\Models\Country;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try {
            $data = $request->validated();
            
            $country = Country::firstOrCreate($data);
            
         
        }catch(\Exception $exception){
            abort(404);
        }
        return redirect()->route('country.create');
    }

}
