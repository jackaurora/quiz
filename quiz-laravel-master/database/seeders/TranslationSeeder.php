<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Translation;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Translation::truncate();

        $translattions = [
            [
                'vocabulary_1' => 'Vocabulary1',
                'vocabulary_2' => 'Translate1',
                'sentence_1' => 'Sentennce 1',
                'sentence_2' => 'Sentennce Trasnate 1',
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'vocabulary_1' => 'Vocabulary2',
                'vocabulary_2' => 'Translate2',
                'sentence_1' => 'Sentennce 2',
                'sentence_2' => 'Sentennce Trasnate 2',
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'vocabulary_1' => 'Vocabulary3',
                'vocabulary_2' => 'Translate3',
                'sentence_1' => 'Sentennce 3',
                'sentence_2' => 'Sentennce Trasnate 3',
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'vocabulary_1' => 'Vocabulary4',
                'vocabulary_2' => 'Translate4',
                'sentence_1' => 'Sentennce 4',
                'sentence_2' => 'Sentennce Trasnate 4',
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        Translation::insert($translattions);
    }
}
