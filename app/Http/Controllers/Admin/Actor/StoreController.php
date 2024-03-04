<?php

namespace App\Http\Controllers\Admin\Actor;

use App\Http\Requests\Actor\StoreRequest;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();  
        $this->service->store($data);

        return redirect()->route('actor.index');
    }

}
