<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function createUsers()
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
            'first_name' => 'Richard',
            'last_name' => 'Wright',
        ]);

        factory('App\User', 1)->create([
            'first_name' => 'Simon',
            'last_name' => 'Wright',
        ]);

        factory('App\User', 1)->create([
            'first_name' => 'Ziv',
            'last_name' => 'Zaifman',
        ]);

    }
}
