<?php
namespace App\Service;


use App\Models\Film;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilmService{
    public function store($data){
        try {
            DB::beginTransaction();
            
            $genreIds = $data['genre_ids'];
            unset($data['genre_ids']);

            $actorIds = $data['actor_ids'];
            unset($data['actor_ids']);

            $countryIds = $data['country_ids'];
            unset($data['country_ids']);
            $data['image_path'] = Storage::disk('public')->put('/image', $data['image_path']);
            $data['main_img_path'] = Storage::disk('public')->put('/image', $data['main_img_path']);
            $data['video_path'] = Storage::disk('public')->put('/video', $data['video_path']);
            $data['trailer_path'] = Storage::disk('public')->put('/trailer', $data['trailer_path']);
            
            $film = Film::firstOrCreate($data);
            
            $film->actors()->attach($actorIds);
            $film->genres()->attach($genreIds);
            $film->countries()->attach($countryIds);
            DB::commit();
        }catch(\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $film){
        try {
            DB::beginTransaction();
            
            if(isset($data['genre_ids'])){
                $genreIds = $data['genre_ids'];
                unset($data['genre_ids']);
                $film->genres()->sync($genreIds);
            }
            if(isset($data['actor_ids'])){
                $actorIds = $data['actor_ids'];
                unset($data['actor_ids']);
                $film->actors()->sync($actorIds);;
            }
            if(isset($data['country_ids'])){
                $countryIds = $data['country_ids'];
                unset($data['country_ids']);
                $film->countries()->sync($countryIds);
            }
            

            if(isset($data['image_path'])){
                Storage::disk('public')->delete($film->image_path);
                $data['image_path'] = Storage::disk('public')->put('/image', $data['image_path']);
            }
            if(isset($data['main_img_path'])){
                Storage::disk('public')->delete($film->main_img_path);
                $data['main_img_path'] = Storage::disk('public')->put('/image', $data['main_img_path']);
            }
            if(isset($data['video_path'])){
                Storage::disk('public')->delete($film->video_path);
                $data['video_path'] = Storage::disk('public')->put('/video', $data['video_path']);
            }
            if(isset($data['trailer_path'])){
                Storage::disk('public')->delete($film->trailer_path);
                $data['trailer_path'] = Storage::disk('public')->put('/trailer', $data['trailer_path']);
            }
            
            
            $film->update($data);
            
            // if(isset($data['tag_ids'])){
                
            // }
            
            
            
            DB::commit();
        }catch(\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }
}