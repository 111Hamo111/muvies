<?php

namespace App\Http\Controllers\Admin\Actor;

use App\Http\Requests\Actor\UpdateRequest;
use App\Models\Actor;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, Actor $actor)
    {
        $data = $request->validated();
        $this->service->update($data, $actor);

        return redirect()->route('actor.index');
    }
}
