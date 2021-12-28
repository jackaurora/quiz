<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Quizlist;
use App\Models\QuizlistTranslation;
use App\Models\Translation;
use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuizlistController extends Controller {

    public function get(Request $request)
    {
        try {
            $id = $request->has('id') ? $request->id : null;
            $user_id = $request->has('user_id') ? $request->user_id : -1;
            $is_public = $request->has('is_public') ? $request->is_public : 0;

            $auth_user_id = -1;
            if (Auth::check()) $auth_user_id = Auth::user()->id;

            // if specific id
            if ($id) {
                // get only user's quizlist
                if ($id == 'all') {
                    $quizList = Quizlist::where('user_id', Auth::user()->id)->get();
                    foreach ($quizList as $key => $value) {
                        $user = User::where('id', $value->user_id)
                            ->select('id', 'nickname')
                            ->get()
                            ->first();
                        $t = $value;
                        if ($user)
                            $t['user'] = $user;
                        else $t['user'] = [];

                        $quizTranslationCount = QuizlistTranslation::where('quizlist_id', $value->id)->count();
                        if ($quizTranslationCount)
                            $t['translation_count'] = $quizTranslationCount;
                        else $t['translation_count'] = 0;

                        $language_1 = Language::find($value->language_1);
                        $language_2 = Language::find($value->language_2);
                        $t['language_1'] = $language_1;
                        $t['language_2'] = $language_2;

                        $quizList[$key] = $t;
                    }
                    return $quizList;
                } else {
                    // get specific quizlist
                    $quizList = Quizlist::find($id);
                    $quizList['language_1'] = Language::find($quizList->language_1);
                    $quizList['language_2'] = Language::find($quizList->language_2);
                    $quizList['translation_count'] = QuizlistTranslation::where('quizlist_id', $quizList->id)->count();
                    $quizList['user'] = User::where('id', $quizList->user_id)
                    ->select('id', 'nickname')
                    ->get()
                    ->first();
                    return $quizList;
                }
            }

            // if user's list and public
            if ($user_id != -1 && $user_id != $auth_user_id)
                return response()->json(['error' => 'Bad Request'], 400);

            $quizList = Quizlist::when($user_id != -1 && $user_id == $auth_user_id, function($query) use ($user_id) {
                return $query->where('user_id', $user_id);
            })
                ->when($is_public, function($query) use ($is_public, $user_id, $auth_user_id) {
                    if ($user_id != -1 && $user_id == $auth_user_id)
                        return $query->orWhere('is_public', $is_public);
                    else
                        return $query->where('is_public', $is_public);
                })
                ->get();
            foreach ($quizList as $key => $value) {
                $user = User::where('id', $value->user_id)
                    ->select('id', 'nickname')
                    ->get()
                    ->first();
                $t = $value;
                if ($user)
                    $t['user'] = $user;
                else $t['user'] = [];

                $quizTranslationCount = QuizlistTranslation::where('quizlist_id', $value->id)->count();
                if ($quizTranslationCount)
                    $t['translation_count'] = $quizTranslationCount;
                else $t['translation_count'] = 0;

                $language_1 = Language::find($value->language_1);
                $language_2 = Language::find($value->language_2);
                $t['language_1'] = $language_1;
                $t['language_2'] = $language_2;

                $quizList[$key] = $t;
            }
            return $quizList;

        } catch(\Throwable $e) {
            Log::error('Get Quizlist : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $quizlist = new Quizlist();
            $quizlist->name = $request->name;
            $quizlist->user_id = Auth::user()->id;
            $quizlist->role = 1;
            $quizlist->is_public = $request->is_public;
            $quizlist->language_1 = $request->language_1;
            $quizlist->language_2 = $request->language_2;
            $quizlist->save();

            $quizlist['language_1'] = Language::find($request->language_1);
            $quizlist['language_2'] = Language::find($request->language_2);

            return $quizlist;
        } catch(\Throwable $e) {
            Log::error('Create Quizlist : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $quizlist = Quizlist::find($request->id);
            $quizlist->name = $request->name;
            $quizlist->user_id = Auth::user()->id;
            $quizlist->role = $request->role;
            $quizlist->is_public = $request->is_public;
            $quizlist->language_1 = $request->language_1;
            $quizlist->language_2 = $request->language_2;
            $quizlist->save();
            return $quizlist;
        } catch(\Throwable $e) {
            Log::error('Update Quizlist : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function delete(Request $request)
    {
        try {
            $quizlist = Quizlist::find($request->id);
            $quizlist->delete();
            QuizlistTranslation::where('quizlist_id', $request->id)->delete();
            return response()->json(['status' => 'Success'], 200);
        } catch(\Throwable $e) {
            Log::error('Delete Quizlist : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function getQuizlistTranslations($id, $user_id)
    {
        try {
            $auth_user_id = -1;
            if (Auth::check()) $auth_user_id = Auth::user()->id;

            if ($user_id != -1 && $auth_user_id != $user_id)
                return response()->json(['error' => 'Bad Request'], 400);

            $quizlistTranslations = QuizlistTranslation::where('quizlist_id', $id)->pluck('translation_id');

            if (count($quizlistTranslations) == 0)
                return $quizlistTranslations;

            $translations = Translation::whereIn('id', $quizlistTranslations)->get();
            // if ($user_id == -1 || $user_id != $auth_user_id) {
            //     foreach ($translations as $key => $value) {
            //         $t = $value;
            //         $t['vocabulary_2'] = '-';
            //         $translation[$key] = $t;
            //     }
            // }
            return $translations;
        } catch(\Throwable $e) {
            Log::error('Get Quizlist Translations: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function getQuizlistTranslationId($id, $user_id) {
        try {

            $quizlistTranslations = QuizlistTranslation::where('quizlist_id', $id)->pluck('translation_id');
            return $quizlistTranslations;
        } catch(\Throwable $e) {
            Log::error('Get Quizlist Translations: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function filterQuizlist(Request $request)
    {
        try {
            $user_id = $request->has('user_id') ? $request->user_id : -1;
            $list_type = $request->has('list_type') ? $request->list_type : 0; // 0: user + all public, 1: only user, 2: only another's public
            $pagination = $request->has('pagination') ? $request->pagination : NULL;

            $auth_user_id = -1;
            if (Auth::check()) $auth_user_id = Auth::user()->id;

            // if user's list and public
            if ($user_id != -1 && $user_id != $auth_user_id)
                return response()->json(['error' => 'Bad Request'], 400);

            $quizList = Quizlist::when($user_id != -1 && $user_id == $auth_user_id, function($query) use ($user_id) {
                return $query->where('user_id', $user_id);
            })
                ->when($list_type >=0 && $list_type <= 2, function($query) use ($list_type, $user_id, $auth_user_id) {

                    if ($user_id != -1 && $user_id == $auth_user_id) {
                        if ($list_type === 0) {
                            return $query->orWhere('is_public', 1);
                        } else {

                        }
                    }
                    else {
                        return $query->where('is_public', 1);
                    }
                })
                ->when($pagination, function($query) use ($pagination) {
                    return $query->offset($pagination['offset'])->limit($pagination['limit']);
                })
                ->get();
            foreach ($quizList as $key => $value) {
                $user = User::where('id', $value->user_id)
                    ->select('id', 'nickname')
                    ->get()
                    ->first();
                $t = $value;
                if ($user)
                    $t['user'] = $user;
                else $t['user'] = [];

                $quizTranslationCount = QuizlistTranslation::where('quizlist_id', $value->id)->count();
                if ($quizTranslationCount)
                    $t['translation_count'] = $quizTranslationCount;
                else $t['translation_count'] = 0;

                $language_1 = Language::find($value->language_1);
                $language_2 = Language::find($value->language_2);
                $t['language_1'] = $language_1;
                $t['language_2'] = $language_2;

                $quizList[$key] = $t;
            }
            return $quizList;

        } catch(\Throwable $e) {
            Log::error('Get Quizlist : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
}
