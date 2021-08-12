<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LdapRecord\Container;
use LdapRecord\Models\ActiveDirectory\User;

class LdapLogin extends Controller
{
    public function login(Request $request){
        
        $connection = Container::getDefaultConnection();
        $connection->connect();

        if ($connection->auth()->attempt($request->username, $request->password, $stayAuthenticated = true)) {
            // Successfully authenticated user.
            $query = $connection->query();

            $record = $query->findBy('mail', $request->username);

            print_r($record);
        } else {
            echo 'Username or password is incorrect.';
        }
    }
}
