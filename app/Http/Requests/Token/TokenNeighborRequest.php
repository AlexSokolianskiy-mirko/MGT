<?php

namespace App\Http\Requests\Token;

use App\Rules\Geo\Latitude;
use App\Rules\Geo\Longitude;
use Illuminate\Foundation\Http\FormRequest;

class TokenNeighborRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ltd' => ['required', new Latitude()],
            'lng' => ['required', new Longitude()],
        ];
    }
}
