<?php

namespace App\Http\Controllers\Admin\Film;

use App\Models\Film;

class DestroyController extends BaseController
{

    public function __invoke(Film $film)
    {
        // Storage::disk('public')->delete($actor->image_path);

        $film->delete();
        return redirect()->route('admin.film.index');
    }
}
 