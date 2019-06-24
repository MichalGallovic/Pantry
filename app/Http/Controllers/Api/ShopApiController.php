<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateShopRequest;
use App\Http\Requests\StoreShopRequest;
use App\Http\Resources\ShopCollection;
use App\Http\Resources\ShopResource;
use App\Repositories\ShopRepository;
use Illuminate\Http\JsonResponse;

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

    public function index()
    {
        $shops = $this->shop->paginate($this->pagination);

        return $this->respondWithCollection(new ShopCollection($shops));
    }

    public function show($id)
    {
        $shop = $this->shop->findOrFail($id);

        return $this->respondWithResource(new ShopResource($shop));
    }

    public function store(StoreShopRequest $request)
    {
        $attributes = $request->validated();

        $shop = $this->shop->create($attributes['name']);

        return $this->respondWithResource(new ShopResource($shop), JsonResponse::HTTP_CREATED);
    }

    public function update(UpdateShopRequest $request, $id)
    {
        $shop = $this->shop->update($request->get('name'), $id);

        return $this->respondWithResource(new ShopResource($shop), JsonResponse::HTTP_OK);
    }

    public function destroy($id)
    {
        $this->shop->deleteById($id);

        return $this->respondWithSuccess('Shop deleted successfully', JsonResponse::HTTP_OK);
    }
}
