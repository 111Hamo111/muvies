<?php

namespace App\Http\Controllers\Admin\Operator;

use App\Http\Requests\Operator\StoreRequest;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();  
        $this->service->store($data);

        return redirect()->route('operator.index');
    }

}
