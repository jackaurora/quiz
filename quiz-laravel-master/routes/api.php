<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TranslationController;
use App\Http\Controllers\API\LanguageController;
use App\Http\Controllers\API\QuizlistController;
use App\Http\Controllers\API\StatsController;
use App\Http\Controllers\API\QuizlistTranslationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('quizlist/get', [QuizlistController::class, 'get']);
Route::get('quizlist/translation/{id}/{user_id}', [QuizlistController::class, 'getQuizlistTranslations']);
Route::get('quizlist/translationids/{id}/{user_id}', [QuizlistController::class, 'getQuizlistTranslationId']);
Route::get('translation/{id}/{user_id}', [TranslationController::class, 'get']);
Route::post('translation/question', [TranslationController::class, 'getQuestion']);
Route::post('translation/checkanswer/{id}', [TranslationController::class, 'checkAnswer']);
Route::get('translation/answer/{id}/{direction}/{user_id}', [TranslationController::class, 'getAnswer']);
Route::post('quizlist/filter', [QuizlistController::class, 'filterQuizlist']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('language/{id}', [LanguageController::class, 'get']);
    Route::post('translation/create', [TranslationController::class, 'create']);
    Route::post('translation/update', [TranslationController::class, 'update']);
    Route::post('translation/delete/{id}', [TranslationController::class, 'delete']);
    Route::post('translation/stats', [TranslationController::class, 'stats']);
    Route::post('quizlist/create', [QuizlistController::class, 'create']);
    Route::post('quizlist/update', [QuizlistController::class, 'update']);
    Route::post('quizlist/delete/{id}', [QuizlistController::class, 'delete']);
    Route::post('stats/get', [StatsController::class, 'get']);
    Route::post('stats/translation/filter', [StatsController::class, 'statsWithTransation']);
    Route::post('stats', [StatsController::class, 'create']);
    Route::post('stats/ranking', [StatsController::class, 'rankingData']);
    Route::post('quizlisttranslation', [QuizlistTranslationController::class, 'create']);
    Route::get('user' ,[AuthController::class, 'userProfile']);
    Route::post('user/update', [AuthController::class, 'update']);
    Route::post('user/updatepassword',[AuthController::class, 'updatePassword']);
});

Route::group([
    'middleware' => 'guest:api',
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
});

