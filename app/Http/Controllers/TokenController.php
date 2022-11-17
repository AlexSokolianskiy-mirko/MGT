<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Token\SearchService;
use App\Http\Requests\Token\TokenSearchRequest;

class TokenController extends Controller
{
    public function index(TokenSearchRequest $request, SearchService $searchService) : JsonResponse
    {
        $params = $request->validated();

        return response()->json([
            'data' => [
                'tokens' => $searchService->getTokens($params)
            ]
        ]);
    }
}
