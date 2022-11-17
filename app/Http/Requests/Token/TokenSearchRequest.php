<?php

namespace App\Http\Requests\Token;

use Illuminate\Foundation\Http\FormRequest;

class TokenSearchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'filter.name' => 'filled|string',
            'filter.description' => 'filled|string',
            'filter.tag' => 'filled|string',
            'page' => 'integer|nullable'
        ];
    }
}
