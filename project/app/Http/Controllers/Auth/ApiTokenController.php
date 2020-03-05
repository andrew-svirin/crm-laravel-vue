<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiTokenController extends Controller
{

    /**
     * Login by credentials and response API token.
     * @param \App\Http\Requests\Auth\ApiTokenLogin $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function login(\App\Http\Requests\Auth\ApiTokenLogin $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];

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
    public function update()
    {
        $user = \Auth::user();
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
