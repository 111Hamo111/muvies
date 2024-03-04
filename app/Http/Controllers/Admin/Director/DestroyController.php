<?php

namespace App\Http\Controllers\Admin\Director;

use App\Models\Director;

class DestroyController extends BaseController
{

    public function __invoke(Director $director)
    {
       
        $director->beforeDelete();
        $director->delete();

        return redirect()->route('director.index');
    }
}
