<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\GroceryResource;
use App\Repositories\GroceryRepository;
use Illuminate\Http\Request;

class ShopGroceriesApiController extends ApiController
{
    /** @var GroceryRepository */
    private $grocery;

    /**
     * @param GroceryRepository $grocery
     */
    public function __construct(GroceryRepository $grocery)
    {
        $this->grocery = $grocery;
    }

    /**
     * @param Request $request
     * @param string $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        if ($request->has('q')) {
            $groceries = $this->grocery->searchByShopId($request->get('q'), $id, $this->pagination);
        } else {
            $groceries = $this->grocery->getByShopId($id, $this->pagination);
        }

        return $this->respondWithCollection(GroceryResource::collection($groceries));
    }
}
