<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateShoppingListItemsRequest;
use App\Repositories\ShoppingListRepository;
use Illuminate\Http\JsonResponse;
use Psy\Util\Json;
use Throwable;

class ShoppingListItemsApiController extends ApiController
{
    /** @var ShoppingListRepository */
    private $shoppingList;

    /**
     * @param ShoppingListRepository $shoppingList
     */
    public function __construct(ShoppingListRepository $shoppingList)
    {
        $this->shoppingList = $shoppingList;
    }

    /**
     * @param UpdateShoppingListItemsRequest $request
     * @param                                $id
     *
     * @return JsonResponse
     */
    public function update(UpdateShoppingListItemsRequest $request, $id)
    {
        $items = $request->validated();

        try {
            $this->shoppingList->replaceItems($id, $items['items']);
            return $this->respondWithSuccess('Shopping list items updated successfully');

        } catch (Throwable $exception) {
            return $this->respondWithError(
                'Something went wrong updating shopping list items',
                JsonResponse::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
