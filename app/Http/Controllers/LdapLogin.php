<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LdapRecord\Container;
use LdapRecord\Models\ActiveDirectory\User;

class LdapLogin extends Controller
{
    public function login(Request $request){

        $credentials = [
            'samaccountname' => $request->username,
            'password' =>  $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $test = null;
        }
    }
}
