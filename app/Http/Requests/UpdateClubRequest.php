<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClubRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:30'],
            'image' => ['nullable', 'file', 'image', 'max:2048'],
            'description' => ['required', 'max:255'],
            'day' => ['required', 'in:'.days()->join(',')],
            'start_hour' => ['required'],
            'end_hour' => ['required'],
            'instructor_id' => ['required', 'integer', 'numeric'],
        ];
    }
}
