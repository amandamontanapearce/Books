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
    public function showBookLoad()
    {
      $response = $this->get('/index');

      $response->assertStatus(200);
    }
    public function addBookLoad()
    {
      $response = $this->post('/addBook');

      $response->assertStatus(200);
    }
    public function deleteBookLoad()
    {
      $response = $this->post('/deleteBook/4');

      $response->assertStatus(200);
    }
}
