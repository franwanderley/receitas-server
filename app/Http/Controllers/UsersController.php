<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function Login(Request $req){
        $user = User::where([
            'email' => $req->email,
            'password' => $req->password,
        ])->first();
        return json_encode($user);
    }

    public function Listing(){
        $user = User::all();
        return $user;
    }
    
    public function create(Request $req){
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->save();

        return json_encode($user);
    }
}
