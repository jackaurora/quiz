<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(TranslationSeeder::class);
        $this->call(QuizlistTableSeeder::class);
        $this->call(QuizlistTranslationsSeeder::class);
    }
}
