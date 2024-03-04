<?php

namespace App\Service;


use App\Models\Director;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DirectorService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();


            $data['image_path'] = Storage::disk('public')->put('/image', $data['image_path']);
            $director = Director::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
