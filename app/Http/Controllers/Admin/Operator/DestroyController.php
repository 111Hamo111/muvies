<?php

namespace App\Http\Controllers\Admin\Operator;

use App\Models\Operator;

class DestroyController extends BaseController
{

    public function __invoke(Operator $operator)
    {
        // Storage::disk('public')->delete($operator->image_path);

        // $operator->films()->delete();

        // Delete the operator
        $operator->beforeDelete();
        $operator->delete();

        return redirect()->route('operator.index');
    }
}
