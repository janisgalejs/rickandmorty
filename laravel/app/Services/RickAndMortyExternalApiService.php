<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RickAndMortyExternalApiService
{
    private string $characterApiUrl;

    /**
     * Sets default parameters
     */
    public function __construct()
    {
        $this->characterApiUrl = config('rick_and_morty_external_api.urls.character');
    }

    /**
     * @param int $code
     * @param mixed|null $data
     * @return JsonResponse
     */
    private function formatResponse(int $code, mixed $data = null): JsonResponse
    {
        return response()->json($data, $code);
    }

    /**
     * @param string $url
     * @return JsonResponse
     */
    private function callExternalApi(string $url): JsonResponse
    {
        try {
            $response = Http::get($url);

            if (!$response->ok()) {
                Log::error('Status code: ' . $response->status() . ', Message: ' . $response->body());

                return $this->formatResponse(
                    $response->status(),
                    $response->body()
                );
            }

            return $this->formatResponse(
                $response->status(),
                json_decode($response->body())
            );

        } catch (\Exception $exception) {
            Log::error('Status code: ' . $exception->getCode() . ', Message: ' . $exception->getMessage());

            return $this->formatResponse(
                $exception->getCode(),
                config('rick_and_morty_external_api.error_response_message')
            );
        }
    }

    /**
     * @param $page
     * @return JsonResponse
     */
    public function getCharacters($page): JsonResponse
    {
        return !intval($page)
            ? $this->formatResponse(Response::HTTP_BAD_REQUEST, 'Invalid page number!')
            : $this->callExternalApi($this->characterApiUrl . '/?page=' . $page);
    }

    /**
     * @param $characterId
     * @return JsonResponse
     */
    public function getCharacter($characterId): JsonResponse
    {
        return !intval($characterId)
            ? $this->formatResponse(Response::HTTP_BAD_REQUEST, 'Invalid character ID!')
            : $this->callExternalApi($this->characterApiUrl . '/' . $characterId);
    }
}
