<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends AuthController
{
    public function register(Request $request)
    {
        if($request->session()->exists('user_id'))
        {
            return redirect()->route('tasks.index')->with('error', 'you already registered!');
        }
        return view('users.register');
    }

    public function store(RegisterRequest $request)
    {
        $payload = collect($request->all());
        $payload["password"] = Hash::make($payload->get('password'));
        $user = User::create($payload->all());
        $this->logIn($user);
        return redirect()->route('tasks.index')->with('success', "You are register successfully");
    }
}
