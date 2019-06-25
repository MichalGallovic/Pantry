<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UnitTypeResource;
use App\Repositories\UnitTypeRepository;
use Illuminate\Http\Request;

class UnitTypeController extends ApiController
{
    /** @var UnitTypeRepository */
    private $unitType;

    /**
     * @param UnitTypeRepository $unitType
     */
    public function __construct(UnitTypeRepository $unitType)
    {
        $this->unitType = $unitType;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $unitTypes = $this->unitType->all();

        return $this->respondWithCollection(UnitTypeResource::collection($unitTypes));
    }

    /**
     * @param Request $request
     * @param string  $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $id)
    {
        $relations = $this->getEmbeddedRelations($request);

        $unitType = $this->unitType->withRelations($relations)->findOrFail($id);

        return $this->respondWithResource(new UnitTypeResource($unitType));
    }
}
