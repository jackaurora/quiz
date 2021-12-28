<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Quizlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use JWTAuth;
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::where('email', $request->email)->get()->first();
        if (!$user) {
            return response()->json(['error' => 'User does not exist'], 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nickname' => 'required|string|between:1,100|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                "status" => false,
                "errors" => $validator->errors()
            ), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        // create user main list
        $quizlist = new Quizlist();
        $quizlist->user_id = $user->id;
        $quizlist->role = 0;
        $quizlist->name="main list";
        $quizlist->is_public = 0;
        $quizlist->save();

        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user','token'),201);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL(),
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        try {
            $nickname = $request->has('nickname') ? $request->nickname : null;
            $email = $request->has('email') ? $request->email : null;

            $user = User::find(auth()->user()->id);
            if ($user) {
                if ($nickname) $user->nickname = $nickname;
                if ($email) $user->email = $email;
                $user->save();
                return $user;
            }
        } catch(\Throwable $e) {
            Log::error('Update Userinfo : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            $old_password = $request->has('old_password') ? $request->old_password : null;
            $new_password = $request->has('new_password') ? $request->new_password : null;

            if (Hash::check($old_password, auth()->user()->password)) {
                $user = User::find(auth()->user()->id);
                if ($user) {
                    $user->password = bcrypt($new_password);
                    $user->save();
                    return $user;
                }
            } else {
                return response()->json(['error' => 'Old password is not correct'], 404);
            }
        } catch(\Throwable $e) {
            Log::error('Update Password : ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
}
