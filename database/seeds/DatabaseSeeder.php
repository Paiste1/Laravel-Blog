<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 4)->create(); // нам надо 4 юзера
        factory(\App\Post::class, 15)->create(); // нам надо 15 постов
    }
}
