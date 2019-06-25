<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateShopRequest;
use App\Http\Requests\StoreShopRequest;
use App\Http\Resources\ShopCollection;
use App\Http\Resources\ShopResource;
use App\Repositories\ShopRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShopApiController extends ApiController
{
    /** @var ShopRepository */
    private $shop;

    /**
     * @param ShopRepository $shop
     */
    public function __construct(ShopRepository $shop)
    {
        $this->shop = $shop;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $relations = $this->getEmbeddedRelations($request);

        $shops = $this->shop->withRelations($relations)->paginate($this->pagination);

        return $this->respondWithCollection(ShopResource::collection($shops));
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

        $shop = $this->shop->withRelations($relations)->findOrFail($id);

        return $this->respondWithResource(new ShopResource($shop));
    }

    /**
     * @param StoreShopRequest $request
     *
     * @return JsonResponse
     */
    public function store(StoreShopRequest $request)
    {
        $attributes = $request->validated();

        $shop = $this->shop->create($attributes);

        return $this->respondWithResource(new ShopResource($shop), JsonResponse::HTTP_CREATED);
    }

    /**
     * @param UpdateShopRequest $request
     * @param string            $id
     *
     * @return JsonResponse
     */
    public function update(UpdateShopRequest $request, $id)
    {
        $attributes = $request->validated();

        $shop = $this->shop->update($attributes, $id);

        return $this->respondWithResource(new ShopResource($shop), JsonResponse::HTTP_OK);
    }

    /**
     * @param string $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->shop->deleteById($id);

        return $this->respondWithSuccess('Shop deleted successfully', JsonResponse::HTTP_OK);
    }
}
