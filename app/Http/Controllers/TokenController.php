<?php

namespace App\Http\Controllers;

use App\Services\Token\SearchService;
use App\Services\Point\DistanceService;
use App\Http\Resources\Token\TokenResource;
use App\Http\Requests\Token\TokenSearchRequest;
use App\Http\Requests\Token\TokenNeighborRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TokenController extends Controller
{
    public function index(TokenSearchRequest $request, SearchService $searchService): AnonymousResourceCollection
    {
        $params = $request->validated();

        return TokenResource::collection($searchService->getTokens($params));
    }

    public function neighbor(TokenNeighborRequest $request, DistanceService $distanceService, SearchService $searchService)
    {
        $data = $request->validated();
        $point = $distanceService->parseCoordinates($data);

        //search neighbors was implented in task description way
        //but there is exists another way to calculate distance between points 
        //https://dev.mysql.com/doc/refman/5.7/en/spatial-convenience-functions.html#function_st-distance-sphere
        return TokenResource::collection($searchService->getNeighbors($point));
    }
}
