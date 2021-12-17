<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Poke;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user)
    {
        // If the profile isn't the user's profile
        if ($user->id != Auth::id())
        {
            $user->views = $user->views + 1;
            $user->save();
        }

        return view('users.show', ['user' => $user]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        return redirect('login');
    }
}