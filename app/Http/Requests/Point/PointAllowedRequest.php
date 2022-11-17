<?php

namespace App\Http\Requests\Point;

use Illuminate\Foundation\Http\FormRequest;

class PointAllowedRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'point' => 'required|array|min:2|max:2',
            'point.1.ltd' => 'required|numeric|between:-90,90',
            'point.1.lng' => 'required|numeric|between:-180,180',
            'point.2.ltd' => 'required|numeric|between:-90,90',
            'point.2.lng' => 'required|numeric|between:-180,180',
        ];
    }
}
