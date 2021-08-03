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

        if ($connection->auth()->attempt($request->email, $request->password))
        {
            echo "Username and password are correct!";
            $user = User::find('cn=Ariel Zannou');

            // Get immediate groups the user is apart of:
            $groups = $user->groups()->get();

            foreach ($groups as $group) {
                echo $group->getName();
            }
        }
    }
}
