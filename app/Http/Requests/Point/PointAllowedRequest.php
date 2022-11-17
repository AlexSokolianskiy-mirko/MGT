<?php

namespace App\Http\Requests\Point;

use App\Rules\Geo\Latitude;
use App\Rules\Geo\Longitude;
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
            'point.1.ltd' => ['required', new Latitude()],
            'point.1.lng' => ['required', new Longitude()],
            'point.2.ltd' =>  ['required', new Latitude()],
            'point.2.lng' => ['required', new Longitude()],
        ];
    }
}
