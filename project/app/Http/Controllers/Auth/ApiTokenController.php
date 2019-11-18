<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiTokenController extends Controller
{

    /**
     * Login by credentials and response API token.
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];

        if (!auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        /* @var $user User */
        $user = User::where(['email' => $request->get('email')])->firstOrFail();
        $this->updateUserToken($user);
        return ['api_token' => $user->api_token];
    }

    /**
     * Update the authenticated user's API token.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function update(Request $request)
    {
        /* @var $user User */
        $user = $request->user();
        $this->updateUserToken($user);
        return ['api_token' => $user->api_token];
    }

    /**
     * Regenerate user's API token and store.
     * @param User $user
     */
    protected function updateUserToken(User $user)
    {
        $token = Str::random(60);
        /* @var $user User */
        $user->forceFill([
            'api_token' => $token,
        ])->save();
    }
}
