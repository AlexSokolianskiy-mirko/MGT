<?php

namespace App\Services\Token;

use App\Models\Token;
use Illuminate\Support\Arr;
use App\Services\Point\DistanceService;
use Illuminate\Database\Eloquent\Builder;
use MatanYadaev\EloquentSpatial\Objects\Point;

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

    public function getNeighbors(Point $point) : array
    {
        $distanceService = new DistanceService();
        $tokens = Token::all();
        $result = [];
        foreach ($tokens as $token) {
            if ($distanceService->allowed($token->location, $point)) {
                $result[] = $token;
            }
        }

        return $result;
    }
}