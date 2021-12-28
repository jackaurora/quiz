<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Language::truncate();

        $languages = [
            [
                'language_id' => 'ab',
                'language_name' => 'Abkhazian',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'aa', 'language_name' => 'Afar' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'af', 'language_name' => 'Afrikaans' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ak', 'language_name' => 'Akan' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'sq', 'language_name' => 'Albanian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'am', 'language_name' => 'Amharic' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ar', 'language_name' => 'Arabic' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'an', 'language_name' => 'Aragonese' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'hy', 'language_name' => 'Armenian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'as', 'language_name' => 'Assamese' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'av', 'language_name' => 'Avaric' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ae', 'language_name' => 'Avestan' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ay', 'language_name' => 'Aymara' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'az', 'language_name' => 'Azerbaijani' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'bm', 'language_name' => 'Bambara' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ba', 'language_name' => 'Bashkir' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'eu', 'language_name' => 'Basque' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'be', 'language_name' => 'Belarusian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'bn', 'language_name' => 'Bengali' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'bh', 'language_name' => 'Bihari languages' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'bi', 'language_name' => 'Bislama' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'bs', 'language_name' => 'Bosnian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'br', 'language_name' => 'Breton' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'bg', 'language_name' => 'Bulgarian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'my', 'language_name' => 'Burmese' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ca', 'language_name' => 'Catalan, Valcodeian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'km', 'language_name' => 'Central Khmer' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ch', 'language_name' => 'Chamorro' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ce', 'language_name' => 'Chechen' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ny', 'language_name' => 'Chichewa, Chewa, Nyanja' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'zh', 'language_name' => 'Chinese' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'cu', 'language_name' => 'Church Slavonic, Old Bulgarian, Old Church Slavonic' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'cv', 'language_name' => 'Chuvash' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'kw', 'language_name' => 'Cornish' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'co', 'language_name' => 'Corsican' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'cr', 'language_name' => 'Cree' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'hr', 'language_name' => 'Croatian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'cs', 'language_name' => 'Czech' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'da', 'language_name' => 'Danish' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'dv', 'language_name' => 'Divehi, Dhivehi, Maldivian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'nl', 'language_name' => 'Dutch, Flemish' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'dz', 'language_name' => 'Dzongkha' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'en', 'language_name' => 'English' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'eo', 'language_name' => 'Esperanto' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'et', 'language_name' => 'Estonian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ee', 'language_name' => 'Ewe' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'fo', 'language_name' => 'Faroese' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'fj', 'language_name' => 'Fijian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'fi', 'language_name' => 'Finnish' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'fr', 'language_name' => 'Frcodeh' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ff', 'language_name' => 'Fulah' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'gd', 'language_name' => 'Gaelic, Scottish Gaelic' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'gl', 'language_name' => 'Galician' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'lg', 'language_name' => 'Ganda' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ka', 'language_name' => 'Georgian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'de', 'language_name' => 'German' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ki', 'language_name' => 'Gikuyu, Kikuyu' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'el', 'language_name' => 'Greek (Modern)' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'kl', 'language_name' => 'Greenlandic, Kalaallisut' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'gn', 'language_name' => 'Guarani' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'gu', 'language_name' => 'Gujarati' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ht', 'language_name' => 'Haitian, Haitian Creole' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ha', 'language_name' => 'Hausa' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'he', 'language_name' => 'Hebrew' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'hz', 'language_name' => 'Herero' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'hi', 'language_name' => 'Hindi' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ho', 'language_name' => 'Hiri Motu' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'hu', 'language_name' => 'Hungarian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'is', 'language_name' => 'Icelandic' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'io', 'language_name' => 'Ido' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ig', 'language_name' => 'Igbo' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'id', 'language_name' => 'Indonesian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ia', 'language_name' => 'Interlingua (International Auxiliary Language Association)' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ie', 'language_name' => 'Interlingue' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'iu', 'language_name' => 'Inuktitut' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ik', 'language_name' => 'Inupiaq' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ga', 'language_name' => 'Irish' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'it', 'language_name' => 'Italian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ja', 'language_name' => 'Japanese' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'jv', 'language_name' => 'Javanese' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'kn', 'language_name' => 'Kannada' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'kr', 'language_name' => 'Kanuri' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ks', 'language_name' => 'Kashmiri' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'kk', 'language_name' => 'Kazakh' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'rw', 'language_name' => 'Kinyarwanda' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'kv', 'language_name' => 'Komi' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'kg', 'language_name' => 'Kongo' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ko', 'language_name' => 'Korean' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'kj', 'language_name' => 'Kwanyama, Kuanyama' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ku', 'language_name' => 'Kurdish' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ky', 'language_name' => 'Kyrgyz' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'lo', 'language_name' => 'Lao' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'la', 'language_name' => 'Latin' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'lv', 'language_name' => 'Latvian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'lb', 'language_name' => 'Letzeburgesch, Luxembourgish' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'li', 'language_name' => 'Limburgish, Limburgan, Limburger' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ln', 'language_name' => 'Lingala' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'lt', 'language_name' => 'Lithuanian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'lu', 'language_name' => 'Luba-Katanga' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'mk', 'language_name' => 'Macedonian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'mg', 'language_name' => 'Malagasy' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ms', 'language_name' => 'Malay' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ml', 'language_name' => 'Malayalam' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'mt', 'language_name' => 'Maltese' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'gv', 'language_name' => 'Manx' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'mi', 'language_name' => 'Maori' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'mr', 'language_name' => 'Marathi' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'mh', 'language_name' => 'Marshallese' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ro', 'language_name' => 'Moldovan, Moldavian, Romanian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'mn', 'language_name' => 'Mongolian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'na', 'language_name' => 'Nauru' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'nv', 'language_name' => 'Navajo, Navaho' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'nd', 'language_name' => 'Northern Ndebele' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ng', 'language_name' => 'Ndonga' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ne', 'language_name' => 'Nepali' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'se', 'language_name' => 'Northern Sami' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'no', 'language_name' => 'Norwegian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'nb', 'language_name' => 'Norwegian Bokmål' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'nn', 'language_name' => 'Norwegian Nynorsk' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ii', 'language_name' => 'Nuosu, Sichuan Yi' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'oc', 'language_name' => 'Occitan (post 1500)' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'oj', 'language_name' => 'Ojibwa' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'or', 'language_name' => 'Oriya' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'om', 'language_name' => 'Oromo' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'os', 'language_name' => 'Ossetian, Ossetic' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'pi', 'language_name' => 'Pali' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'pa', 'language_name' => 'Panjabi, Punjabi' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ps', 'language_name' => 'Pashto, Pushto' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'fa', 'language_name' => 'Persian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'pl', 'language_name' => 'Polish' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'pt', 'language_name' => 'Portuguese' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'qu', 'language_name' => 'Quechua' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'rm', 'language_name' => 'Romansh' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'rn', 'language_name' => 'Rundi' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ru', 'language_name' => 'Russian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'sm', 'language_name' => 'Samoan' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'sg', 'language_name' => 'Sango' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'sa', 'language_name' => 'Sanskrit' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'sc', 'language_name' => 'Sardinian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'sr', 'language_name' => 'Serbian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'sn', 'language_name' => 'Shona' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'sd', 'language_name' => 'Sindhi' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'si', 'language_name' => 'Sinhala, Sinhalese' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'sk', 'language_name' => 'Slovak' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'sl', 'language_name' => 'Slovenian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'so', 'language_name' => 'Somali' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'st', 'language_name' => 'Sotho, Southern' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'nr', 'language_name' => 'South Ndebele' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'es', 'language_name' => 'Spanish, Castilian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'su', 'language_name' => 'Sundanese' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'sw', 'language_name' => 'Swahili' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ss', 'language_name' => 'Swati' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'sv', 'language_name' => 'Swedish' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'tl', 'language_name' => 'Tagalog' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ty', 'language_name' => 'Tahitian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'tg', 'language_name' => 'Tajik' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ta', 'language_name' => 'Tamil' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'tt', 'language_name' => 'Tatar' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'te', 'language_name' => 'Telugu' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'th', 'language_name' => 'Thai' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'bo', 'language_name' => 'Tibetan' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ti', 'language_name' => 'Tigrinya' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'to', 'language_name' => 'Tonga (Tonga Islands)' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ts', 'language_name' => 'Tsonga' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'tn', 'language_name' => 'Tswana' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'tr', 'language_name' => 'Turkish' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'tk', 'language_name' => 'Turkmen' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'tw', 'language_name' => 'Twi' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ug', 'language_name' => 'Uighur, Uyghur' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'uk', 'language_name' => 'Ukrainian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'ur', 'language_name' => 'Urdu' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'uz', 'language_name' => 'Uzbek' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 've', 'language_name' => 'Venda' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'vi', 'language_name' => 'Vietnamese' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'vo', 'language_name' => 'Volap_k' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'wa', 'language_name' => 'Walloon' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'cy', 'language_name' => 'Welsh' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'fy', 'language_name' => 'Western Frisian' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'wo', 'language_name' => 'Wolof' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'xh', 'language_name' => 'Xhosa' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'yi', 'language_name' => 'Yiddish' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'yo', 'language_name' => 'Yoruba' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'za', 'language_name' => 'Zhuang, Chuang' ,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
                ['language_id' => 'zu', 'language_name' => 'Zulu', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];


        Language::insert($languages);
    }
}
