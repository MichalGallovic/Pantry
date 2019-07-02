<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\GroceryResource;
use App\Repositories\GroceryRepository;
use Illuminate\Http\Request;

class SearchGroceriesApiController extends ApiController
{
    /** @var GroceryRepository */
    private $grocery;

    /** @var int */
    private $limit = 10;

    /**
     * @param GroceryRepository $grocery
     */
    public function __construct(GroceryRepository $grocery)
    {
        $this->grocery = $grocery;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $attributes = $request->validate([
            'q' => 'nullable'
        ]);

        if (is_null($attributes['q'])) {
            return $this->respondWithCollection(GroceryResource::collection(collect()));
        }

        $groceries = $this->grocery->search($attributes['q'], $this->limit);

        return $this->respondWithCollection(GroceryResource::collection($groceries));
    }
}
