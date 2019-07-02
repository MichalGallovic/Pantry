<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreShoppingListItemRequest;
use App\Http\Requests\UpdateShoppingListItemRequest;
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

    /**
     * @param StoreShoppingListItemRequest $request
     *
     * @return JsonResponse
     */
    public function store(StoreShoppingListItemRequest $request)
    {
        $attributes = $request->validated();

        $shoppingListItem = $this->shoppingListItem->create($attributes);

        return $this->respondWithResource(new ShoppingListItemResource($shoppingListItem), JsonResponse::HTTP_CREATED);
    }

    /**
     * @param UpdateShoppingListItemRequest $request
     * @param string $id
     *
     * @return JsonResponse
     */
    public function update(UpdateShoppingListItemRequest $request, $id)
    {
        $attributes = $request->validated();

        $shoppingListItem = $this->shoppingListItem->update($attributes, $id);

        return $this->respondWithResource(new ShoppingListItemResource($shoppingListItem), JsonResponse::HTTP_OK);
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->shoppingListItem->deleteById($id);

        return $this->respondWithSuccess('Shopping list item deleted successfully', JsonResponse::HTTP_OK);
    }
}
