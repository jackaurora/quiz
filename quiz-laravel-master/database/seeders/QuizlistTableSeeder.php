<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Quizlist;

class QuizlistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Quizlist::truncate();

        $quizlist = [
            [
                'name' => 'MainList',
                'role' => 0,
                'user_id' => 1,
                'is_public'=>0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        Quizlist::insert($quizlist);
    }
}
