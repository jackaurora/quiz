<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Quizlist;
use App\Models\Translation;
use App\Models\QuizlistTranslation;
use App\Models\Stats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TranslationController extends Controller
{
    public function get($id, $user_id)
    {
        try {
            $auth_user_id = -1;
            if (Auth::check()) $auth_user_id = Auth::user()->id;

            if ($user_id != -1 && $user_id != $auth_user_id)
                return response()->json(['error' => 'Bad Request'], 400);

            // if ($user_id == -1 && $auth_user_id == -1) {
            //     $translation = Translation::get();
            //     foreach ($translation as $key => $value) {
            //         $quizlistTranslation = QuizlistTranslation::where('translation_id', $value->id)->get()->first();
            //         if ($quizlistTranslation) {
            //             $quizList = Quizlist::find($quizlistTranslation->quizlist_id);
            //             $t = $value;
            //             $t['quizlist'] = $quizList;
            //             $translation[$key] = $t;
            //         }
            //     }
            // }else {
            if ($id == 'all'){
                $translation = Translation::where('user_id', Auth::user()->id)->get();
                foreach ($translation as $key => $value) {
                    $quizlistTranslation = QuizlistTranslation::where('translation_id', $value->id)->get()->first();
                    if ($quizlistTranslation) {
                        $quizList = Quizlist::find($quizlistTranslation->quizlist_id);
                        $t = $value;
                        $t['quizlist'] = $quizList;
                        $translation[$key] = $t;
                    }
                }
            }else {
                $translation = Translation::find($id);
                $quizlistTranslation = QuizlistTranslation::where('translation_id', $translation->id)->where('user_id', Auth::user()->id)->get()->first();
                if ($quizlistTranslation) {
                    $quizList = Quizlist::find($quizlistTranslation->quizlist_id);
                    $translation['quizlist'] = $quizList;
                }
            }
            // }
            return $translation;
        } catch(\Throwable $e) {
            Log::error('Get Translation : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function getQuestion(Request $request)
    {

        $auth_user_id = -1;
        if (Auth::check()) $auth_user_id = Auth::user()->id;

        $id = $request->has('id')? $request->id : -1;
        $quiz_mode = $request->has('quiz_mode')? $request->quiz_mode : -1;
        $direction = $request->has('direction')? $request->direction : 1;
        $quizlist_id = $request->has('quizlist_id')? $request->quizlist_id : -1;
        $user_id = $request->has('user_id')? $request->user_id : -1;

        if ($user_id != -1 && $user_id != $auth_user_id)
            return response()->json(['error' => 'Bad Request'], 400);

        try {
            if ($id == 'all')
                $translation = Translation::select('id', 'vocabulary_1', 'vocabulary_2', 'sentence_1')->get();
            else if($id == 'random') {
                $translation = Translation::inRandomOrder()->select('id', 'vocabulary_1', 'vocabulary_2', 'sentence_1')->first();
            } else
                $translation = Translation::select('id', 'vocabulary_1', 'vocabulary_2', 'sentence_1')->find($id);

            if ($direction == 1)
                $translation['vocabulary'] = $translation->vocabulary_1;
            else
                $translation['vocabulary'] = $translation->vocabulary_2;

            if ($quiz_mode == 1) {
                // small keyboard mode
                $answer = '';

                if ($direction == 1)
                    $answer = $translation['vocabulary_2'];
                else
                    $answer = $translation['vocabulary_1'];
                $answerLength = strlen($answer);

                $characters = 'abcdefghijklmnopqrstuvwxyz';
                $charactersLength = strlen($characters);
                $patternValues = [4,9,16,25,36];
                $length = 4;
                if ($answerLength >= 4) {
                    for ($i=0; $i<count($patternValues); $i++) {
                        if ($i == count($patternValues)-1)
                            $length = $patternValues[$i];
                        else {
                            if ($answerLength >= $patternValues[$i] && $answerLength < $patternValues[$i+1]) {
                                $length = $patternValues[$i+1];
                                break;
                            }
                        }
                    }
                }

                $normalPattern = '';
                for ($i = 0; $i < $length; $i++) {
                    $normalPattern .= $characters[rand(0, $charactersLength-1)];
                }

                $rand_keys = array_rand(range(0, $length-1), $answerLength);

                $randAnswer = str_shuffle($answer);

                for ($i=0; $i<$answerLength; $i++) {
                    $normalPattern[$rand_keys[$i]] = substr($randAnswer, $i, 1);
                }
                $translation['pattern'] = $normalPattern;
            } else if ($quiz_mode == 2) {
                // 1 of 4 mode

                $wrongTranslationIdsObj = QuizlistTranslation::where('quizlist_id', $quizlist_id)->pluck('translation_id');
                $i = 0;
                $wrongTranslationIds = [];
                foreach($wrongTranslationIdsObj as $key => $value) {
                    if ($value != $id) {
                        $wrongTranslationIds[$i] = $value;
                        $i++;
                    }
                }

                if (count($wrongTranslationIds) <= 1)
                    $randWrongTransIds = $wrongTranslationIds;
                else {
                    shuffle($wrongTranslationIds);
                    $randWrongTransIds = array_slice(
                        $wrongTranslationIds,
                        0,
                        count($wrongTranslationIds) >= 3 ? 3 : count($wrongTranslationIds)
                    );
                }

                $wrongTranslations = Translation::whereIn('id', $randWrongTransIds)
                    ->select('vocabulary_1', 'vocabulary_2')
                    ->get();

                $questions = [];
                if ($direction == 1)
                    $questions[0] = $translation['vocabulary_2'];
                else
                    $questions[0] = $translation['vocabulary_1'];

                foreach($wrongTranslations as $key => $value) {
                    if ($direction == 1)
                        $questions[$key + 1] = $value['vocabulary_2'];
                    else $questions[$key + 1] = $value['vocabulary_1'];
                }
                shuffle($questions);
                $translation['questions'] = $questions;
            }

            unset($translation['vocabulary_1']);
            unset($translation['vocabulary_2']);

            return $translation;
        } catch(\Throwable $e) {
            Log::error('Get Translation Question: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function getAnswer($id, $direction)
    {
        try {
            $questionStr = $direction == 1 ? 'vocabulary_2' : 'vocabulary_1';
            if ($id == 'all')
                $translation = Translation::select('id', $questionStr)->get();
            else $translation = Translation::select('id', $questionStr)->find($id);

            if ($direction == 1)
                $translation['vocabulary'] = $translation->vocabulary_2;
            else
                $translation['vocabulary'] = $translation->vocabulary_1;

            return $translation;
        } catch(\Throwable $e) {
            Log::error('Get Translation Answer: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function checkAnswer(Request $request, $id)
    {
        try {
            $auth_user_id = -1;
            if (Auth::check()) $auth_user_id = Auth::user()->id;

            $user_id = $request->has('user_id')? $request->user_id : -1;
            if ($user_id != -1 && $user_id != $auth_user_id)
                return response()->json(['error' => 'Bad Request'], 400);

            $translationVocabulary1 = Translation::where('id', $id)->where($request->direction == 1 ? 'vocabulary_2' : 'vocabulary_1', $request->vocabulary)->first();

            // $translationSentence2 = Translation::where('id', $id)->where('sentence_2', $request->sentence_2)->first();

            // save stats
            // $stats = new Stats();
            // $stats->user_id = Auth::user()->id;
            // $stats->translation_id = $id;
            // $stats->quizlist_id = $request->quizlist_id;
            // $stats->answer_vocabulary = $translationVocabulary1 ? 1 : 0;
            // $stats->answer_sentence = 0;
            // // if ($translation->sentence_1 && $request->sentence_2) {
            // //     $stats->answer_sentence = $translationSentence2 ? 1 : 0;
            // // } else {
            // //     $stats->answer_sentence = 2;
            // // }
            // $stats->save();

            return response()->json([
                'vocabulary' => $translationVocabulary1 ? true : false,
                // 'sentence_2' => $translationSentence1 ? true : false,
            ]);

        } catch(\Throwable $e) {
            Log::error('Get Translation Answer: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $translation = new Translation();
            $translation->vocabulary_1 = $request->vocabulary_1;
            $translation->vocabulary_2 = $request->vocabulary_2;
            $translation->sentence_1 = $request->sentence_1;
            $translation->sentence_2 = $request->sentence_2;
            $translation->user_id = Auth::user()->id;
            $translation->save();

            $quizlistTranslation = new QuizlistTranslation();
            $quizlistTranslation->quizlist_id = $request->quizlist_id;
            $quizlistTranslation->translation_id = $translation->id;
            $quizlistTranslation->user_id = Auth::user()->id;
            $quizlistTranslation->save();

            return $translation;
        } catch(\Throwable $e) {
            Log::error('Create Translation: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $translation = Translation::find($request->id);
            $translation->vocabulary_1 = $request->vocabulary_1;
            $translation->vocabulary_2 = $request->vocabulary_2;
            $translation->sentence_1 = $request->sentence_1;
            $translation->sentence_2 = $request->sentence_2;

            $quizlistTranslation = QuizlistTranslation::where('translation_id', $request->id)->get()->first();
            if (!$quizlistTranslation) {
                $quizlistTranslation = new QuizlistTranslation();
                $quizlistTranslation->translation_id = $request->id;
                $quizlistTranslation->user_id = Auth::user()->id;
            }
            $quizlistTranslation->quizlist_id = $request->quizlist_id;
            $quizlistTranslation->save();

            $translation->save();
            return $translation;
        } catch(\Throwable $e) {
            Log::error('Update Translation: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            QuizlistTranslation::where('translation_id', $id)->delete();
            Translation::find($id)->delete();
            return response()->json(['status' => 'Success'], 200);
        } catch(\Throwable $e) {
            Log::error('Delete Translation: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function stats(Request $request)
    {
        try {
            $id = $request->id;
            $user_id = $request->user_id;

            if ($request->id == 'all') {
                $user_id = $request->user_id;
                $translation = Translation::when($user_id !== -1, function($query) use ($user_id) {
                    return $query->where('user_id', $user_id);
                })
                ->get();

                foreach ($translation as $key => $value) {
                    $stats = Stats::where('translation_id', $value->id)->get();
                    $t = $value;
                    if ($stats)
                        $t['stats'] = $stats;
                    else $t['stats'] = [];
                    $translation[$key] = $t;
                }
                return $translation;
            } else {
                $translation = Translation::find($id)->get();
                $stats = Stats::where('translation_id', $id)->get();
                $translation['stats'] = $stats;
                return $translation;
            }
        } catch(\Throwable $e) {
            Log::error('Translation Stats: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
}
