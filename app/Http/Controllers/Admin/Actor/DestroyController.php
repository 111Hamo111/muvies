<?php

namespace App\Http\Controllers\Admin\Actor;

use App\Models\Actor;

class DestroyController extends BaseController
{
    
    public function __invoke(Actor $actor)
    {
        // Storage::disk('public')->delete($actor->image_path);
        $actor->delete();
        return redirect()->route('actor.index');
    }
}
