<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        // $user->views = $user->views + 1;
        // $user->save();

        return view('users.show', ['user' => $user]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        return redirect('/login');
    }
}