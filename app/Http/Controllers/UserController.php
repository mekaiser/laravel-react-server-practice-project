<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $req)
    {
        $user = new User;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));
        $user->save();
        return $user;
    }

    public function login(Request $req)
    {
        $user = User::where('email', $req->input('email'))->first();
        if (!$user || !Hash::check($req->input('password'), $user->password)) {
            return ["error" => "Email or password is not matched"];
        }
        return $user;
    }
}
