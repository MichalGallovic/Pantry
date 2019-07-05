<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SettingsResource;
use Illuminate\Config\Repository as Config;
use Illuminate\Contracts\Cache\Repository as Cache;

class SettingsApiController extends ApiController
{
    /** @var Config */
    private $config;

    /** @var Cache */
    private $cache;

    /**
     * @param Config $config
     * @param Cache  $cache
     */
    public function __construct(Config $config, Cache $cache)
    {
        $this->config = $config;
        $this->cache  = $cache;
    }

    public function __invoke()
    {
        $settings = $this->cache->rememberForever('settings', function () {
            return $this->config->get('settings');
        });

        return $this->respondWithResource(new SettingsResource($settings));
    }
}
