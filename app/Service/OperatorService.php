<?php

namespace App\Service;


use App\Models\Operator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OperatorService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['image_path'] = Storage::disk('public')->put('/image', $data['image_path']);
            $operator = Operator::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $operator)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image_path'])) {
                Storage::disk('public')->delete($operator->image_path);
                $data['image_path'] = Storage::disk('public')->put('/image', $data['image_path']);
            }

            $operator->update($data);
            
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $operator;
    }
}
