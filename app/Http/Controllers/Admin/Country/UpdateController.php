<?php

namespace App\Http\Controllers\Admin\country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\UpdateRequest;
use App\Models\Country;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Country $country)
    {
        try {
            $data = $request->validated();
            
            $country->update($data);
            
         
        }catch(\Exception $exception){
            abort(404);
        }
        return redirect()->route('country.index');
    }

}
