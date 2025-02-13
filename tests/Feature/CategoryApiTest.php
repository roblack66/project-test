<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_category_creation()
    {
        $response = $this->postJson('/api/categories/create', [
            'name' => 'Electronics'
        ]);

        $response->assertStatus(201);
    }

    
}
