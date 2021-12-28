<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Quizlist;
use App\Models\QuizlistTranslation;
use App\Models\Translation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuizlistTranslationController extends Controller {

    public function create(Request $request)
    {
        try {
           $quizlistTranslation = new QuizlistTranslation();
           $quizlistTranslation->quizlist_id = $request->quizlist_id;
           $quizlistTranslation->translation_id = $request->translation_id;
           $quizlistTranslation->user_id = Auth::user()->id;
           $quizlistTranslation->save();
           return $quizlistTranslation;
        } catch(\Throwable $e) {
            Log::error('Create QuizlistTranslation: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
}
