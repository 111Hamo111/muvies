<?php

namespace App\Http\Controllers\Admin\Operator;

use App\Http\Requests\Operator\UpdateRequest;
use App\Models\Operator;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Operator $operator)
    {
        $data = $request->validated();  
        $this->service->update($data, $operator);

        return redirect()->route('operator.index');
    }

}
