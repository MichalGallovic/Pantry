<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreShoppingListRequest;
use App\Http\Requests\UpdateShoppingListRequest;
use App\Http\Resources\ShoppingListResource;
use App\Repositories\ShoppingListRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShoppingListApiController extends ApiController
{
    /** @var ShoppingListRepository */
    protected $shoppingList;

    /**
     * @param ShoppingListRepository $shoppingList
     */
    public function __construct(ShoppingListRepository $shoppingList)
    {
        $this->shoppingList = $shoppingList;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $relations = $this->getEmbeddedRelations($request);

        $shoppingLists = $this->shoppingList->withRelations($relations)->paginate($this->pagination);

        return $this->respondWithCollection(ShoppingListResource::collection($shoppingLists));
    }

    /**
     * @param Request $request
     * @param string $id
     *
     * @return JsonResponse
     */
    public function show(Request $request, $id)
    {
        $relations = $this->getEmbeddedRelations($request);

        $shoppingList = $this->shoppingList->withRelations($relations)->findOrFail($id);

        return $this->respondWithResource(new ShoppingListResource($shoppingList));
    }

    /**
     * @param StoreShoppingListRequest $request
     *
     * @return JsonResponse
     */
    public function store(StoreShoppingListRequest $request)
    {
        $attributes = $request->validated();

        $shoppingList = $this->shoppingList->create($attributes);

        return $this->respondWithResource(new ShoppingListResource($shoppingList), JsonResponse::HTTP_CREATED);
    }

    /**
     * @param UpdateShoppingListRequest $request
     *
     * @return JsonResponse
     */
    public function update(UpdateShoppingListRequest $request, $id)
    {
        $attributes = $request->validated();

        $shoppingList = $this->shoppingList->update($attributes, $id);

        return $this->respondWithResource(new ShoppingListResource($shoppingList), JsonResponse::HTTP_OK);
    }

    /**
     * @param string $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->shoppingList->deleteById($id);

        return $this->respondWithSuccess('Shopping list deleted successfully', JsonResponse::HTTP_OK);
    }
}
