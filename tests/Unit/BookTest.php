<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function basicLoad()
    {
      $response = $this->get('/');

      $response->assertStatus(200);
    }
}
