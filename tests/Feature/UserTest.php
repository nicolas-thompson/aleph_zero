<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function the_database_is_populated_with_users() 
    {
        $this->assertDatabaseHas('Users', [
            'first_name' => 'Simon',
        ]);
    }
}