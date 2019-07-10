<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateShoppingListItemRequest;
use App\Http\Requests\UpdateShoppingListItemsOrderRequest;
use App\Repositories\ShoppingListItemRepository;
use Throwable;
use Illuminate\Http\JsonResponse;

class ShoppingListItemsOrderApiController extends ApiController
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
     * @param UpdateShoppingListItemsOrderRequest $request
     *
     * @return JsonResponse
     */
    public function update(UpdateShoppingListItemsOrderRequest $request)
    {
        $attributes = $request->validated();

        try {
            $this->shoppingListItem->updateItemsOrder($attributes['items']);

            return $this->respondWithSuccess('Items\' order updated successfully');
        } catch (Throwable $exception) {
            return $this->respondWithError('Something went wrong while updating items order', JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
