<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Qna;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

     //새로운 user를 3명만들고, 각 유저들은 3개의 Qna를 갖도록 한다. 
    public function run()
    {
        $user = User::factory()
            ->count(3)
            ->has(
                Qna::factory()
                        ->count(3)
                        ->state(function (array $attributes, User $user) {
                            return ['user_id' => $user->id];
                        })
            )
            ->create();
    }
}
