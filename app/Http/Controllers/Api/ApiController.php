<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ApiController
{
    /** @var int */
    protected $pagination = 10;

    /**
     * @param ResourceCollection $collection
     * @param int                $statusCode
     *
     * @return JsonResponse
     */
    protected function respondWithCollection(ResourceCollection $collection, $statusCode = JsonResponse::HTTP_OK)
    {
        return $collection->response()->setStatusCode($statusCode);
    }

    /**
     * @param JsonResource $resource
     * @param int          $statusCode
     *
     * @return JsonResponse
     */
    protected function respondWithResource(JsonResource $resource, $statusCode = JsonResponse::HTTP_OK)
    {
        return $resource->response()->setStatusCode($statusCode);
    }

    /**
     * @param string $message
     * @param int $statusCode
     *
     * @return JsonResponse
     */
    protected function respondWithSuccess($message, $statusCode = JsonResponse::HTTP_OK)
    {
        return new JsonResponse(
            [
                'success' => [
                    'message' => $message
                ]
            ],
            $statusCode
        );
    }
}
