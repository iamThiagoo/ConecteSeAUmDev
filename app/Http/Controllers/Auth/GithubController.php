<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProfileUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    const PROVIDER = 'GITHUB';

    protected User $authUser;

    public function __invoke () : RedirectResponse
    {
        try {
            $user = Socialite::drive('github')->user();

            DB::transaction(function () use ($user) {
                $this->authUser = User::updateOrCreate([
                    'email' => $user->email,
                ], [
                    'name' => $user->name,
                    'password' => Hash::make(Str::random(25))
                ]);

                ProfileUser::updateOrCreate([
                    'user_id' => $this->authUser->id,
                ], [
                    'provider' => self::PROVIDER,
                    'provider_user_id' => $user->id,
                    'nickname' => $user->nickname,
                    'avatar' => $user->avatar,
                    'data' => json_encode($user->user)
                ]);
            }, 3);

            Auth::login($this->authUser);

            if (empty($this->authUser->interest))
                return redirect()->route('interests');

            if (empty($this->authUser->preference))
                return redirect()->route('preference');

            return redirect()->route('feed');
            
        } catch (\Exception $e) {
            DB::rollback();

            dd($e->getMessage());
        }
    }
}
