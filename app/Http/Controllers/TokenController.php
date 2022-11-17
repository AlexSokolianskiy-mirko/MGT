<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\Token\SearchService;
use App\Services\Point\DistanceService;
use App\Http\Requests\Token\TokenSearchRequest;
use App\Http\Requests\Token\TokenNeighborRequest;

class TokenController extends Controller
{
    public function index(TokenSearchRequest $request, SearchService $searchService): JsonResponse
    {
        $params = $request->validated();

        return response()->json([
            'data' => [
                'tokens' => $searchService->getTokens($params)
            ]
        ]);
    }

    public function neighbor(TokenNeighborRequest $request, DistanceService $distanceService, SearchService $searchService)
    {
        $data = $request->validated();
        $point = $distanceService->parseCoordinates($data);

        return response()->json([
            'data' => [
                //search neighbors was implented in task description way
                //but there is exists another way to calculate distance between points 
                //https://dev.mysql.com/doc/refman/5.7/en/spatial-convenience-functions.html#function_st-distance-sphere
                'tokens' => $searchService->getNeighbors($point)
            ]
        ]);
    }
}
