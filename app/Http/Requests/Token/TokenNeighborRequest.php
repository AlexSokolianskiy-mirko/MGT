<?php

namespace App\Http\Requests\Token;

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
            'ltd' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
        ];
    }
}
