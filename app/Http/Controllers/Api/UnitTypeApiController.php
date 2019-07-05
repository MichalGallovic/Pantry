<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UnitTypeResource;
use App\Repositories\UnitTypeRepository;
use App\UnitType;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Http\Request;

class UnitTypeApiController extends ApiController
{
    /** @var UnitTypeRepository */
    private $unitType;

    /** @var Repository */
    private $cache;

    /**
     * @param UnitTypeRepository $unitType
     * @param Repository         $cache
     */
    public function __construct(UnitTypeRepository $unitType, Repository $cache)
    {
        $this->unitType = $unitType;
        $this->cache    = $cache;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $cacheKey = sprintf("%s.all", UnitType::class);

        $unitTypes = $this->cache->rememberForever($cacheKey, function () {
            return $this->unitType->all();
        });

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
