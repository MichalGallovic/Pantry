<?php

namespace Tests\Feature;

use Illuminate\Contracts\Config\Repository;
use Tests\ApiTestCase;

class SettingsApiTest extends ApiTestCase
{
    public function test_endpoint_returns_config_settings()
    {
        $config = app()->make(Repository::class);

        $settings = $config->get('settings');

        $response = $this->get(route('api.settings.index'));

        $this->assertResponse($response, $settings);
    }
}
