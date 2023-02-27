<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use App\Models\User;
use Illuminate\Http\Request;

class SessionsController extends AuthController
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
     */
    public function create(Request $request)
    {
        if($request->session()->exists('user_id'))
        {
            return redirect()->route('tasks.index')->with('error', 'You are already login!');
        }
        return view('sessions.create');
    }

    public function store(SessionRequest $request)
    {
        $user = User::where('email', $request->get('email'))->firstOrFail();
        if($this->auth($user, $request->get('password')))
        {
            $this->logIn($user);
            return redirect()->route('tasks.index')->with('success', "You are login successfully!");
        }
        return back()->with('error', 'Incorrect email or password');
    }

    public function destroy()
    {
        $this->logOut();
        return redirect()->route('sessions.login')->with('success', 'You are success logout!');
    }
}
