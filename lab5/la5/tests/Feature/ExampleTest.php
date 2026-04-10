<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/tin');
    }

    public function test_the_tin_page_returns_a_successful_response(): void
    {
        $response = $this->get('/tin');

        $response->assertOk();
    }
}
