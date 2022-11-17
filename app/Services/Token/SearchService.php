<?php

namespace App\Services\Token;

use App\Models\Token;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class SearchService
{
    public function getTokens(array $params)
    {
        $query = Token::when(!empty($params['filter']), function (Builder $query) use ($params) {
            foreach (Arr::only($params['filter'], ['name', 'description']) as $key => $value) {
                $query->where($key, $value);
            };
            if (!empty($params['filter']['tag'])) {
                $query->whereRelation('tags', 'name', '=', $params['filter']['tag']);
            }

            return $query;
        });
        if (array_key_exists('page', $params)) {
            return $query->simplePaginate(10);
        }
        
        return $query->get();
    }
}