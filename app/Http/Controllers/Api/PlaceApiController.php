<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Http\Resources\PlaceResource;
use App\Repositories\PlaceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlaceApiController extends ApiController
{
    /** @var PlaceRepository */
    private $place;

    /**
     * @param PlaceRepository $place
     */
    public function __construct(PlaceRepository $place)
    {
        $this->place = $place;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $relations = $this->getEmbeddedRelations($request);

        $places = $this->place->withRelations($relations)->all();

        return $this->respondWithCollection(PlaceResource::collection($places));
    }

    /**
     * @param StorePlaceRequest $request
     *
     * @return JsonResponse
     */
    public function store(StorePlaceRequest $request)
    {
        $attributes = $request->validated();

        $place = $this->place->create($attributes);

        return $this->respondWithResource(new PlaceResource($place), JsonResponse::HTTP_CREATED);
    }

    /**
     * @param UpdatePlaceRequest $request
     * @param int $id
     *
     * @return JsonResponse
     */
    public function update(UpdatePlaceRequest $request, $id)
    {
        $attributes = $request->validated();

        $place = $this->place->update($attributes, $id);

        return $this->respondWithResource(new PlaceResource($place));
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->place->deleteById($id);

        return $this->respondWithSuccess('Place deleted successfully', JsonResponse::HTTP_OK);
    }
}
