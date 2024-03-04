<?php

namespace App\Service;

use App\Models\Actor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ActorService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['image_path'] = Storage::disk('public')->put('/image', $data['image_path']);
            $actor = Actor::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $actor)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image_path'])) {
                Storage::disk('public')->delete($actor->image_path);
                $data['image_path'] = Storage::disk('public')->put('/image', $data['image_path']);
            }



            $actor->update($data);
            
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $actor;
    }
}
