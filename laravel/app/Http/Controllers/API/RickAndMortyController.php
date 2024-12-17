<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\RickAndMortyExternalApiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RickAndMortyController extends Controller
{
    /**
     * @param Request $request
     * @param RickAndMortyExternalApiService $externalApiService
     * @return JsonResponse
     */
    public function index(Request $request, RickAndMortyExternalApiService $externalApiService): JsonResponse
    {
        return $externalApiService->getCharacters($request->get('page', 1));
    }

    /**
     * @param $characterId
     * @param RickAndMortyExternalApiService $externalApiService
     * @return JsonResponse
     */
    public function show($characterId, RickAndMortyExternalApiService $externalApiService): JsonResponse
    {
        return $externalApiService->getCharacter($characterId);
    }
}
