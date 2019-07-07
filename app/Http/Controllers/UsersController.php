<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function color(Request $request)
    {
        $user = User::find(Auth::id());
        $user->color = $request->get('color');
        $user->save();
        return redirect('home');
    }
}
