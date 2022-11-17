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

        return response()->json([
            'allowed' => $distanceService->allowed($point['point'][1], $point['point'][2])
        ]);
    }
}
