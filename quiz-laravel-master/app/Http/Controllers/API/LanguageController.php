<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LanguageController extends Controller
{
    public function get(Request $request, $id)
    {
        try {
            if ($id == 'all')
                $language = Language::all();
            else {
                $language = Language::find($id);
            }
            return $language;
        } catch(\Throwable $e) {
            Log::error('Get Language : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
}
