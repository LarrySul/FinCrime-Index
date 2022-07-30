<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HTTPTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_institution()
    {
        $response = $this->get('/api/v1/institutions');

        $response->assertStatus(200);
    }

    public function test_search_institution()
    {
        $response = $this->get('/api/v1/search-institution?fullSearch=london');

        $response->assertStatus(200);
    }
}
