<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ShoppingListItemResource;
use App\Repositories\ShoppingListItemRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ShoppingListItemApiController extends ApiController
{
    /** @var ShoppingListItemRepository */
    private $shoppingListItem;

    /**
     * @param ShoppingListItemRepository $shoppingListItem
     */
    public function __construct(ShoppingListItemRepository $shoppingListItem)
    {
        $this->shoppingListItem = $shoppingListItem;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $relations = $this->getEmbeddedRelations($request);

        $shoppingListItems = $this->shoppingListItem->withRelations($relations)->all();

        return $this->respondWithCollection(ShoppingListItemResource::collection($shoppingListItems));
    }
}
