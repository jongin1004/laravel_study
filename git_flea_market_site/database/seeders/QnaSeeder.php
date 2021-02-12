<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Qna;
use App\Models\User;

class QnaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Qna::factory()
            ->state([
                'user_id' => User::find(1)->id,
            ])
            ->count(5)
            ->create();            
    }
}
