<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param User $user
     */
    protected function logIn(User $user): void
    {
        session()->put('user_id', $user->id);
    }

    /**
     * @param User $user
     * @param string $password
     * @return bool
     */
    protected function auth(User $user, string $password): bool
    {
        return Hash::check($password, $user->password);
    }

    protected function logOut()
    {
        session()->remove('user_id');
        session()->regenerate();
    }


}
