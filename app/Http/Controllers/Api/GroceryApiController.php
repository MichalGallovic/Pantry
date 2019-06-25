<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreGroceryRequest;
use App\Http\Requests\UpdateGroceryRequest;
use App\Http\Resources\GroceryResource;
use App\Repositories\GroceryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroceryApiController extends ApiController
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
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $relations = $this->getEmbeddedRelations($request);

        $groceries = $this->grocery->withRelations($relations)->paginate($this->pagination);

        return $this->respondWithCollection(GroceryResource::collection($groceries));
    }

    /**
     * @param StoreGroceryRequest $request
     *
     * @return JsonResponse
     */
    public function store(StoreGroceryRequest $request)
    {
        $attributes = $request->validated();

        $grocery = $this->grocery->create($attributes);

        return $this->respondWithResource(new GroceryResource($grocery), JsonResponse::HTTP_CREATED);
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

        $grocery = $this->grocery->withRelations($relations)->findOrFail($id);

        return $this->respondWithResource(new GroceryResource($grocery));
    }

    /**
     * @param UpdateGroceryRequest $request
     * @param string $id
     *
     * @return JsonResponse
     */
    public function update(UpdateGroceryRequest $request, $id)
    {
        $attributes = $request->validated();

        $grocery = $this->grocery->update($attributes, $id);

        return $this->respondWithResource(new GroceryResource($grocery), JsonResponse::HTTP_OK);
    }

    /**
     * @param string $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->grocery->deleteById($id);

        return $this->respondWithSuccess('Grocery deleted successfully', JsonResponse::HTTP_OK);
    }
}
