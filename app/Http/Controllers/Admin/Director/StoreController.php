<?php

namespace App\Http\Controllers\Admin\Director;

use App\Http\Requests\Director\StoreRequest;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();  
        $this->service->store($data);

        return redirect()->route('director.index');
    }

}
