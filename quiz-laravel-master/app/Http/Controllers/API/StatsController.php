<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Stats;
use App\Models\Translation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StatsController extends Controller
{
    public function get(Request $request)
    {
        try {
            if ($request->id == 'all') {
                $user_id = $request->user_id;
                $stats = Stats::when($user_id !== -1, function($query) use ($user_id) {
                    return $query->where('user_id', $user_id);
                })
                ->get();
            } else
                $stats = Stats::find($request->id);
            return $stats;
        } catch(\Throwable $e) {
            Log::error('Get Stats : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $stats = new Stats();
            $stats->user_id = Auth::user()->id;
            $stats->translation_id = $request->translation_id;
            $stats->quizlist_id = $request->quizlist_id;
            $stats->answer_vocabulary = $request->answer_vocabulary;
            $stats->quiz_mode = $request->quiz_mode;
            $stats->answer_sentence = 0;
            $stats->owner_id = $request->owner_id;
            $stats->save();
            return $stats;
        } catch(\Throwable $e) {
            Log::error('Create Stats : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $stats = Stats::find($id);
            $stats->translation_id = $request->translation_id;
            $stats->answer_vocabulary = $request->answer_vocabulary;
            $stats->answer_sentence = $request->answer_sentence;
            $stats->save();
            return $stats;
        } catch(\Throwable $e) {
            Log::error('Update Stats : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function delete($id)
    {
        try {
            Stats::find($id)->delete();
            return response()->json(['status' => 'Success'], 200);
        } catch(\Throwable $e) {
            Log::error('Delete Stats : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function statsWithTransation(Request $request) {
        try {
            $stats = [];
            $user_id = $request->has('user_id') ? $request->user_id : NULL;
            $quizlist_id = $request->has('quizlist_id') ? $request->quizlist_id : NULL;
            $quiz_mode = $request->has('quiz_mode') ? $request->quiz_mode : NULL;
            $translation_id = $request->has('translation_id') ? $request->translation_id : NULL;
            $is_ranking = $request->has('is_ranking') ? $request->is_ranking : 0;
            $date_range = $request->has('date_range') ? $request->date_range : null;
            $includes = $request->has('includes') ? $request->includes : null;

            if ($is_ranking)
                $user_id = Auth::user()->id;

            $stats = Stats::when(($user_id && $user_id != 'all' && !$is_ranking ), function($query) use ($user_id) {
                return $query->where('user_id', $user_id);
            })
                ->when(($user_id && $is_ranking), function($query) use ($user_id) {
                    return $query->where('user_id', '!=', $user_id)->where('owner_id', $user_id);
                })
                ->when(($quizlist_id && $quizlist_id != 'all'), function($query) use ($quizlist_id) {
                    return $query->where('quizlist_id', $quizlist_id);
                })
                ->when(($quiz_mode && $quiz_mode != 'all'), function($query) use ($quiz_mode) {
                    return $query->where('quiz_mode', $quiz_mode);
                })
                ->when(($date_range), function($query) use ($date_range) {
                    return $query->whereBetween('created_at', [$date_range['start'], $date_range['end']]);
                })
                ->get();

            if ($includes) {
                foreach ($stats as $key => $value) {
                    if ($includes['user']) {
                        $user = User::where('id', $value->user_id)->select('id', 'nickname')->get()->first();
                        $t = $value;
                        if ($user) {
                            $t['user'] = $user;
                        } else $t['user'] = [];
                    }
                }
            }

            $translations = [];
            if ($translation_id == 'all') {
                $translationIds = [];
                foreach($stats as $key => $value) {
                    if(!in_array($value->translation_id, $translationIds)) {
                        $translationIds[count($translationIds)] = $value->translation_id;
                    }
                }
                $translations = Translation::whereIn('id', $translationIds)->get();
            } else {
                $translations = Translation::where('id', $translation_id)->get();
            }

            return response()->json(['status' =>  'Success', 'stats' => $stats, 'translations' => $translations ], 200);
        } catch(\Throwable $e) {
            Log::error('StatsWithTranslation : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function rankingData(Request $request) {
        try {
            $date_range = $request->has('date_range') ? $request->date_range : null;
            $stats = Stats::when(($date_range), function($query) use ($date_range) {
                return $query->whereBetween('created_at', [$date_range['start'], $date_range['end']]);
            })
            // ->where('owner_id', Auth::user()->id)
            // ->where('user_id', '!=',  Auth::user()->id)
            ->select('answer_vocabulary', 'user_id')
            ->get();

            // $userIds = [];
            // foreach($stats as $key => $value) {
            //     if(!in_array($value->user_id, $userIds)) {
            //         $userIds[count($userIds)] = $value->user_id;
            //     }
            // }

            $users = User::select('id', 'nickname')->get();
            return response()->json(['status' => 'Success', 'stats' => $stats, 'users' => $users], 200);

        } catch(\Throwable $e) {
            Log::error('RankingData : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
}
