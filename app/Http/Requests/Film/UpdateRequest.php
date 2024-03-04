<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'image_path' => 'required|file',
            'main_img_path' => 'nullable|file',
            'video_path' => 'required|file',
            'trailer_path' => 'required|file',
            'content' => 'required|string',
            'time' => 'required|integer',

            'genre_ids' => 'required|array',
            'genre_ids.*' => 'integer|exists:genres,id',

            'actor_ids' => 'required|array',
            'actor_ids.*' => 'integer|exists:actors,id',
            
            'country_ids' => 'required|array',
            'country_ids.*' => 'integer|exists:countries,id',

            'director_id' => 'required|integer|exists:directors,id',
            'operator_id' => 'required|integer|exists:operators,id',
            'year_id' => 'required|integer|exists:years,id',

            // 'selected' => 'nullable|integer'
        ];
    }
}
