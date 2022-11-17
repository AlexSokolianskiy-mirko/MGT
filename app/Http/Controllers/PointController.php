<?php

namespace App\Http\Controllers;

use App\Http\Requests\Point\PointAllowedRequest;
use App\Services\Point\DistanceService;
use MatanYadaev\EloquentSpatial\Objects\Point;

class PointController extends Controller
{
    public function index(PointAllowedRequest $request, DistanceService $distanceService)
    {
        $point = $request->validated();
        $primary = $distanceService->parseCoordinates($point['point'][1]);
        $secondary = $distanceService->parseCoordinates($point['point'][2]);
        
        return response()->json([
            'allowed' => $distanceService->allowed($primary, $secondary)
        ]);
    }
}
