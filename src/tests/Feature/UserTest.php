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
        $this->createUsers();

        // assertions

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

    /** @test */
    public function it_can_return_a_sorted_list_of_matches()
    {
        $this->createUsers();

        $response = $this->json('POST', 'users/search', ['terms' => 'Wright']);

        $response->assertJson([
            [
                'first_name' => 'Richard',
                'last_name' => 'Wright',
            ],
            [
                'first_name' => 'Simon',
                'last_name' => 'Wright',
            ],
        ]);
    }
}