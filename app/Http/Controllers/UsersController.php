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
        if($request->get('font_size') != null)
        {
            $user->font_size = $request->get('font_size')."px";
        }
        $user->save();
        return redirect('home');
    }
}
