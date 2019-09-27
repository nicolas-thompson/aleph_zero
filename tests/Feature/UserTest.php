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
        factory('App\User', 1)->create([
            'first_name' => 'Adam',
            'last_name' => 'Ant',
        ]);

        factory('App\User', 1)->create([
            'first_name' => 'Michal',
            'last_name' => 'Manson',
        ]);

        factory('App\User', 1)->create([
            'first_name' => 'Ziv',
            'last_name' => 'Zaifman',
        ]);

        $this->assertDatabaseHas('Users', [
            'first_name' => 'Adam',
            'last_name' => 'Ant',
        ]);

        $this->assertDatabaseHas('Users', [
            'first_name' => 'Michal',
            'last_name' => 'Manson',
        ]);

        $this->assertDatabaseHas('Users', [
            'first_name' => 'Ziv',
            'last_name' => 'Zaifman',
        ]);
    }
}